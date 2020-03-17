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
class DashboardController extends Controller
{
    public function index(Request $request)
    {

        // if(Session::get('emailID') =='' || Session::get('roleId') ==''){
        //     return Redirect::to('login')->with('error', 'Session expired, please login again.');
        // }
        // if(Session::get('roleId') =='1' || (Session::get('catID') =='12' && Session::get('depID') =='0'))
        // {
        //     $this->dashboardAdmin();
        // }
        // elseif(Session::get('roleId') =='2')
        // {
        //     $this->dashboard_DG_RD_INS();
        // }
        // elseif(Session::get('roleId') =='4' || (Session::get('catID') =='50' && Session::get('depID') =='2'))
        // {
        //     $this->dashboardRoC();
        // }
        return $this->dashboardAdmin();
      
    }
    public function dashboardAdmin()
    {
        //Get company count Inspector-wise
        $comp_data = DB::table('tble_email_sent')
        ->join('tble_inspector_details', 'tble_email_sent.rocCode', '=', 'tble_inspector_details.rocCode')
        ->join('master_users', 'tble_inspector_details.userID', '=', 'master_users.uID')
        ->select(DB::raw('count(*) as _count, tble_email_sent.uID, master_users.firstName, tble_inspector_details.firstName as fName'))
        ->whereRaw('tble_inspector_details.deptID=2 and tble_inspector_details.catID=50 and master_users.uID IN (383,384,385,386,387, 388, 389)')
        ->groupBy('tble_email_sent.uID')
        ->groupBy('master_users.firstName')
        ->groupBy('tble_inspector_details.firstName')
        ->get();
        $inspector_names = [];
        $comp_count = [];
        foreach($comp_data as $rec)
        {
            $inspector_names[] = $rec->firstName." ( ".$rec->fName." )";
            $comp_count[] =  $rec->_count;
        }
        $data = ['inspector_names'=>$inspector_names,'inspector_comp_count'=>json_encode($comp_count)];

       //Get company count provision-wise
       $comp_data = DB::table('tble_provision_master_final_set')
       ->select(DB::raw('count(*) as _count,  provision_id, YearOfFiling'))
       ->groupBy('provision_id')
       ->groupBy('YearOfFiling')
       ->get();
       $provision_names = [];
       $comp_count = [];
       $provision_year = [];
       foreach($comp_data as $rec)
       {
           $provision_names[] = "Provision ".$rec->provision_id;
           $comp_count["Provision ".$rec->provision_id][] =  $rec->_count;
           $provision_year[] = $rec->YearOfFiling;
       }
       $data['provision_wise_data'] = ['_names'=>$provision_names,'_count'=>$comp_count,'_years'=>array_unique($provision_year)];

       // Provision wise email sent
       $comp_data = DB::table('tble_email_sent')
       ->select(DB::raw('count(distinct CIN) as _count,  provisionId, YearOfFilling'))
       ->groupBy('provisionId')
       ->groupBy('YearOfFilling')
       ->get();
       $provision_names = [];
       $email_sent_count = [];
       $email_year = [];
       foreach($comp_data as $rec)
       {
           $provision_names[] = "Provision ".$rec->provisionId;
           $email_sent_count["Provision ".$rec->provisionId][] =  $rec->_count;
           $email_year[] = $rec->YearOfFilling;
       }
       $data['provision_wise_email'] = ['_names'=>$provision_names, '_count'=>$email_sent_count,'_years'=>array_unique($email_year)];

       //ROC wise email sent

        $comp_data = DB::table('tble_email_sent')
       ->select(DB::raw('count(distinct CIN) as _count,  roc_code, roc_name, YearOfFilling'))
       ->join('tble_roc_name_map', 'tble_email_sent.rocCode', '=', 'tble_roc_name_map.roc_code')
       ->groupBy('roc_code')
       ->groupBy('roc_name')
       ->groupBy('YearOfFilling')
       ->get();
       $roc_names = [];
       $email_sent_count = [];
       $email_year = [];
       foreach($comp_data as $rec)
       {
           $roc_names[] = $rec->roc_name;
           $email_sent_count[] =  $rec->_count;
           $email_year[] = $rec->YearOfFilling;
       }
       $data['roc_wise_email'] = ['_names'=>$roc_names, '_count'=>$email_sent_count,'_years'=>array_unique($email_year)];

       //Notice status report

       $comp_data = DB::table('tble_provision_master_final_set')
       ->select(DB::raw('count(*) as _count, provision_id, YearOfFiling, tble_provision_meta_data.status, tble_provision_meta_data.action'))
       ->join('tble_provision_meta_data', 'tble_provision_master_final_set.status', '=', 'tble_provision_meta_data.status')
       ->groupBy('provision_id')
       ->groupBy('YearOfFiling')
       ->groupBy('tble_provision_meta_data.status')
       ->groupBy('tble_provision_meta_data.action')
       ->get();
       $notice_status = [];
       foreach($comp_data as $rec)
       {
           $notice_status[$rec->action][] =  ['provision'=>"Provision ".$rec->provision_id, '_count'=>$rec->_count];
       }
       $data['notice_status'] = $notice_status;

       //Master company categorisation on the basis of company class(Public, private, others)
        $comp_data = DB::table('master_companies_distinct_all')
       ->select(DB::raw('count(*) as _count, COMPANY_CLASS'))
       ->groupBy('COMPANY_CLASS')
       ->orderBy('COMPANY_CLASS','DESC')
       ->get();
       $company_class_data = [];
       foreach($comp_data as $rec)
       {

           $company_class_data[] =  ['name'=>($rec->COMPANY_CLASS !='' && $rec->COMPANY_CLASS !=' ')?$rec->COMPANY_CLASS:'Others', 'y'=>$rec->_count];
       }
       $data['company_class_data'] = $company_class_data;

        // master and compliance company data comparison
        $comp_data = DB::select("SELECT count(*) as _count1,_count2, master_companies_distinct_all.COMPANY_CLASS FROM cms_dev_18_02_2020.master_companies_distinct_all 
        join (SELECT count(*) as _count2, COMPANY_CLASS FROM cms_dev_18_02_2020.tble_provision_master_final_set
        join master_companies_distinct_all on master_companies_distinct_all.cin=tble_provision_master_final_set.cin 
        group by COMPANY_CLASS) as tble2 on tble2.COMPANY_CLASS =  master_companies_distinct_all.COMPANY_CLASS
        group by master_companies_distinct_all.COMPANY_CLASS");

        $total_company = [];
        $total_compliance_company =[];
        $comp_class = [];
        $total_sum = 0;
        $compliance_sum = 0;
        foreach($comp_data as $rec)
        {
            $total_company[] = $rec->_count1;
            $total_compliance_company[] =$rec->_count2;
            $total_sum += 0+(int)$rec->_count1;
            $compliance_sum += 0+(int)$rec->_count2;
            $comp_class[] = $rec->COMPANY_CLASS;
        }
        $data['master_compliance_comparison'] = ['total_company'=>$total_company, 'comp_class'=>$comp_class,
        'total_compliance_company'=>$total_compliance_company, 'total_sum'=>$total_sum,'compliance_sum'=>$compliance_sum];
        // echo "<pre>";
        // print_r($master_compliance_comparison);
        // die();
        return view('dashboard.dashboard',$data); 
    }
    public function dashboard_DG_RD_INS()
    {
        return view('dashboard1.dashboard'); 
    }
    public function dashboardRoC()
    {
        return view('dashboard4.dashboard'); 
    }
}