<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class AuthController extends Controller
{

    public function register(Request $request)
    {
        return view('user.register'); 
    }
    /**
     * API Register
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerSubmit(Request $request)
    {
        $credentials = $request->only('firstName','lastName','middleName', 'email', 'password','catID','depID','locID','roleId','reporting_user_id');
        
        $rules = [
            'firstName' => 'required|max:255',
            'lastName' => 'max:255',
            'middleName' => 'max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6|max:20',
            'catID' => 'max:255',
            'depID' => 'max:255',
            'locID' => 'max:255',
            'roleId' => 'required|max:255',
            'reporting_user_id' => 'max:255',
            

            
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return Redirect::to('/register')
                ->withErrors($validator)->withInput();
        }
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $middleName = $request->middleName;
        $email = $request->email;
        $name = str_replace("  "," ","$request->firstName $request->lastName $request->middleName");
        $password = $request->password;
        $cate_id = $request->cate_id;
        $depID = $request->depID;
        $locID = $request->locID;
        $roleId = $request->roleId;
        $reporting_user_id = $request->reporting_user_id;
        
        
        $user = User::create(['name'=> $name,'firstName' => $firstName,'lastName' => $lastName,'middleName' => $middleName, 'email' => $email, 'password' => Hash::make($password),'cate_id' => $cate_id,'depID' => $depID,'locID' => $locID,'roleId' => $roleId,'reporting_user_id' => $reporting_user_id]);
        $verification_code = str_random(30); //Generate verification code
        DB::table('user_verifications')->insert(['user_id'=>$user->id,'token'=>$verification_code]);
        $subject = "Please verify your email address.";
        // Mail::send('email.verify', ['name' => $name, 'verification_code' => $verification_code],
        //     function($mail) use ($email, $name, $subject){
        //         $mail->from(getenv('FROM_EMAIL_ADDRESS'), "From User/Company Name Goes Here");
        //         $mail->to($email, $name);
        //         $mail->subject($subject);
        //     });
        
        return Redirect::to('login')->with('success', 'Thanks for signing up! Please check your email to complete your registration.');
    }
    /**
     * API Verify User
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyUser($verification_code)
    {
        $check = DB::table('user_verifications')->where('token',$verification_code)->first();
        if(!is_null($check)){
            $user = User::find($check->user_id);
            if($user->is_verified == 1){
                return response()->json([
                    'success'=> true,
                    'message'=> 'Account already verified..'
                ]);
            }
            $user->update(['is_verified' => 1]);
            DB::table('user_verifications')->where('token',$verification_code)->delete();
            return response()->json([
                'success'=> true,
                'message'=> 'You have successfully verified your email address.'
            ]);
        }
        return response()->json(['success'=> false, 'error'=> "Verification code is invalid."]);
    }
    public function login(Request $request)
    {
        if(Session::get('email') !=''){
            return Redirect::to('dashboard')->with('success', 'Successfully Login!');
        }
        return view('user.login'); 
    }
    /**
     * API Login, on success return JWT Auth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginSubmit(Request $request)
    {
        $credentials = $request->only('emailID', 'password_temp');
        $remember = ($request->remember) ? true : false;
        $rules = [
            'emailID' => 'required|email',
            'password_temp' => 'required',
        ];

        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return Redirect::to('/login')
                ->withErrors($validator)->withInput();
        }
        
        //$credentials['is_verified'] = 1;
        try {
            // attempt to verify the credentials and create a token for the user
            $data = DB::table('master_users')->where(['emailID'=>$request->emailID, 'password_temp'=>$request->password_temp])->first();

            if (empty($data)) {
                return Redirect::to('login')->with('error', 'We cant find an account with this credentials. Please make sure you entered the right information and you have verified your email address.');
            }
        } catch (Exception $e) {
            // something went wrong whilst attempting to encode the token
           return Redirect::to('login')->with('error', 'Failed to login, please try again.');
        }
        // all good so return the data
        Session::put('emailID', $data->emailID);
        Session::put('firstName', $data->firstName);
        Session::put('middleName', $data->middleName);
        Session::put('lastName', $data->lastName);
        Session::put('catID', $data->catID);
        Session::put('roleId', $data->roleId);
        Session::put('depID', $data->depID);
        Session::put('locID', $data->locID);

        Session::put('catName', $data->catName);
        Session::put('roleId', $data->roleId);
        Session::put('designation_name', $data->designation_name);
        Session::put('department_name', $data->department_name);
        Session::put('location_name', $data->location_name);
        Session::put('reportingUserID', $data->reportingUserID);
         return Redirect::to('dashboard')->with('success', 'Successfully Login!');
    }
    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function logout(Request $request) {

        Session::flush();
        Session::forget(['firstName','middleName','lastName','emailID','catID','roleId','depID','locID','reportingUserID']);

        $request->session()->regenerateToken();

        return Redirect::to('login')->with('success', 'Logout you have been logged out.');
    }
     /**
     * API Recover Password
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recover(Request $request)
    {
        return view('user.forget-pass'); 
    }
    public function recoverSubmit(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {

            return Redirect::to('recover')->with('error', 'Your email address was not found.');
        }
        // try {
        //     Password::sendResetLink($request->only('email'), function (Message $message) {
        //         $message->subject('Your Password Reset Link');
        //     });
        // } catch (\Exception $e) {
        //     //Return with error
        //     $error_message = $e->getMessage();
        //     return Redirect::to('recover')->with('error', $error_message);
        // }
        return Redirect::to('recover')->with('success', 'A reset email has been sent! Please check your email.');
    }

}
