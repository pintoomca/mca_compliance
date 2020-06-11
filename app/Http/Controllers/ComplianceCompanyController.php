<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
//use App\Home;
use Validator, DB, Hash;
class ComplianceCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        DB::enableQueryLog();
        $cin  = $request->input('cin');
        $company_name  = $request->input('company_name');
        $year  = $request->input('year');
        $comp_data = DB::table('tble_provision_master_final_set')
        ->select(DB::raw('cin, Companyname, comp_email_addr, provision_id, YearOfFiling,Alert,address, cfi_number, tble_provision_meta_data.status, tble_provision_meta_data.action'))
        ->join('tble_provision_meta_data', 'tble_provision_master_final_set.status', '=', 'tble_provision_meta_data.status')
        ->whereRaw("cin = '$cin' OR Companyname= '$company_name'")
        ->first();

        $query = "SELECT tble_email_sent.id, tble_email_sent.emai_id_recepient, reff_num, subject, cfi_number,Alert,mailSentTime, firstName,lastName, roc_name, mail_data
        FROM tble_email_sent
        join tble_roc_name_map on  tble_email_sent.rocCode= tble_roc_name_map.roc_code
        Where (cin = '$cin' OR company_name= '$company_name') AND YearOfFilling = '$year'";
        $notice_data = DB::select($query);
        $query = DB::getQueryLog();
        return view('compliance_company.index',['comp_data'=>$comp_data, 'notice_data'=>$notice_data,]);
    }
    public function mailView(Request $request)
    {

        DB::enableQueryLog();
        $id  = $request->input('id');
        $query = "SELECT  mail_data
        FROM tble_email_sent
        Where id = '$id' LIMIT 1";
        $notice_data = DB::select($query);
        echo $notice_data[0]->mail_data;

    }
}
