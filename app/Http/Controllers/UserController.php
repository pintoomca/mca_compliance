<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Department;
use App\Category;
use App\Location;
use Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{
    public function list(Request $request)
    {

        $userData = DB::table('users')
        ->join('departments', 'users.dept_id', '=', 'departments.dept_id')
        ->join('roles', 'users.role_id', '=', 'roles.role_id')
         ->join('locations', 'users.location_id', '=', 'locations.location_id')->paginate(1);
        return view('user.list',['userData'=>$userData]); 
    }
    public function add(Request $request)
    {
        $roles = Role::get();
        $departments = Department::get();
        $categories = Category::get();
        $locations = Location::get();
        $Users = User::get();
        return view('user.add',['locations'=>$locations,'departments'=>$departments,'categories'=>$categories,'roles'=>$roles ]); 
    }
    public function addSubmit(Request $request)
    {   
        $credentials = $request->only('fname','mname','lname', 'email', 'password','password_confirmation','cat_id','dept_id','location_id','role_id','reporting_user_id','status','is_verified');
        
        $rules = [
            'fname' => 'required|max:255',
            'mname' => 'max:255',
            'lname' => 'max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|between:8,255|confirmed',
            'password_confirmation' => 'required',
            'cat_id' => 'required',
            'dept_id' => 'required',
            'location_id' => 'required',
            'role_id' => 'required',
            'reporting_user_id' => 'required',

            'is_verified' => 'required',
            'status' => 'required'
            
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {   
            return Redirect::to('user/add')
                ->withErrors($validator)->withInput();
        }
        $fname = $request->input('fname');
        $mname = $request->input('mname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $name = str_replace("  "," ","$request->fname $request->mname $request->lname");
        $password = $request->input('password');
        $cat_id  = $request->input('cat_id');
        $dept_id  = $request->input('dept_id');
        $location_id = $request->input('location_id');
        $reporting_user_id = $request->input('reporting_user_id');
        $role_id = $request->input('role_id');

        $is_verified = $request->input('is_verified');
        $status = $request->input('status');
        $data=array('fname'=>$fname,"mname"=>$mname,"lname"=>$lname,"name"=>$name,"email"=>$email,'password' => Hash::make($password),'cat_id'=>$cat_id,
        'dept_id'=>$dept_id,'location_id'=>$location_id,'reporting_user_id'=>$reporting_user_id,
        'role_id'=>$role_id,'is_verified'=>$is_verified,'status'=>$status);

        $user = User::create($data);
        //echo "hi satya";die;
        //DB::table('users')->insert($data);
        return Redirect::to('user/list')->with('success', 'User account created successfully.');
    }
    public function edit(Request $request)
    {
        $userDetails = User::find($request->id);
       //echo "<pre>"; print_r($userDetails);die;
        $roles = Role::get();
        $departments = Department::get();
        $categories = Category::get();
        $locations = Location::get();
        $Users = User::get();
        return view('user.edit',['locations'=>$locations,'departments'=>$departments,'categories'=>$categories,'roles'=>$roles,'userDetails'=>$userDetails]); 
    }
    public function editSubmit(Request $request)
    {
        $credentials = $request->only('fname','mname','lname', 'email', 'password','password_confirmation','cat_id','dept_id','location_id','role_id','reporting_user_id','status','is_verified');
        
        $rules = [
            'fname' => 'required|max:255',
            'mname' => 'max:255',
            'lname' => 'max:255',
            //'email' => 'required|email|max:255|unique:users',
            'password' => (!empty($request->password))?'between:8,255|confirmed':'',
            'password_confirmation' => '',
            'cat_id' => 'required',
            'dept_id' => 'required',
            'location_id' => 'required',
            'role_id' => 'required',
            'reporting_user_id' => 'required',
            'is_verified' => 'required',
            'status' => 'required'
            
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {   
            return Redirect::to('user/edit/'.$request->id)
                ->withErrors($validator)->withInput();
        }
        $fname = $request->input('fname');
        $mname = $request->input('mname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $name = str_replace("  "," ","$request->fname $request->mname $request->lname");
        $password = $request->input('password');
        $cat_id  = $request->input('cat_id');
        $dept_id  = $request->input('dept_id');
        $location_id = $request->input('location_id');
        $reporting_user_id = $request->input('reporting_user_id');
        $role_id = $request->input('role_id');

        $is_verified = $request->input('is_verified');
        $status = $request->input('status');
        if(!empty($password)){
            $data=array('fname'=>$fname,"mname"=>$mname,"lname"=>$lname,"name"=>$name,"email"=>$email,'password' => Hash::make($password),'cat_id'=>$cat_id,
            'dept_id'=>$dept_id,'location_id'=>$location_id,'reporting_user_id'=>$reporting_user_id,
            'role_id'=>$role_id,'is_verified'=>$is_verified,'status'=>$status);
        }else{
            $data=array('fname'=>$fname,"mname"=>$mname,"lname"=>$lname,"name"=>$name,"email"=>$email,'cat_id'=>$cat_id,
            'dept_id'=>$dept_id,'location_id'=>$location_id,'reporting_user_id'=>$reporting_user_id,
            'role_id'=>$role_id,'is_verified'=>$is_verified,'status'=>$status);
        }
        

        $user = User::where('id', $request->id)
        ->update($data);
        //echo "hi satya";die;
        //DB::table('users')->insert($data);
        return Redirect::to('user/list')->with('success', 'User account updated successfully.');
    }
    public function delete(Request $request)
    {
 
        $userDetails = User::find($request->id);
        $userDetails->delete();
        return Redirect::to('user/list')->with('error', 'User deleted successfully.');
    }
    public function view(Request $request)
    {
        $userDetails = User::find($request->id);
       //echo "<pre>"; print_r($userDetails);die;
        $roles = Role::get();
        $departments = Department::get();
        $categories = Category::get();
        $locations = Location::get();
        $Users = User::get();
        return view('user.view',['locations'=>$locations,'departments'=>$departments,'categories'=>$categories,'roles'=>$roles,'userDetails'=>$userDetails]); 
       // return view('user.view'); 
    }
    public function changeStatus(Request $request)
    {
        $userDetails = User::find($request->id);
        if($userDetails->status == 1)
        {
            $user = User::where('id', $request->id)
            ->update(['status'=>2]);
        }
        else{
            $user = User::where('id', $request->id)
            ->update(['status'=>1]);
        }
        return Redirect::to('user/list')->with('success', 'User status updated successfully.');
    }
    
    public function loginAs(Request $request)
    {
        
    }
}