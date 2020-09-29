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
        return $this->dashboardAdmin($request);

    }
    public function dashboardAdmin($request)
    {
        $curr_year = ($request->input('year') != '') ? $request->input('year'):'2017';
        //DB::enableQueryLog();
        //Get company count Inspector-wise
        // $query = "select group_concat(_count) as cnt, group_concat(action) as action, group_concat(status) as status, firstName, fName,
        // YearOfFilling from cmp_inspector_status_report
        // where `YearOfFilling` = $curr_year group by firstName, fName";


        $query = "SELECT Region, firstName,  SUM(c1) as c1, SUM(c2) as c2, SUM(c3) as c3,SUM(c4) as c4,SUM(c5) as c5
        from cmp_notice_status
        where  YearOfFilling = '$curr_year'
        group by Region,firstName";
        $comp_data = DB::select($query);
        $inspector_names = [];
        $comp_count = [];
        $meta_name = [];
        foreach($comp_data as $rec)
        {
            $inspector_names[] = $rec->firstName." ( ".$rec->Region." )";
            $meta_name['No Action'][] = $rec->c1;
            $meta_name['Notice Sent'][] = $rec->c2;
            $meta_name['Drop Charges'][] = $rec->c3;
            $meta_name['Subject to Prosecution'][] = $rec->c4;
            $meta_name['Further Examination Required.'][] = $rec->c5;
        }
        // echo "<pre>";
        // print_r($meta_name);
        // die;
        $data = ['inspector_names'=>$inspector_names, 'meta_name'=>$meta_name,'year' =>$curr_year ];
       //ROC wise email sent
        $comp_data = DB::table('tble_email_sent')
       ->select(DB::raw('count(distinct CIN) as _count,  roc_code, roc_name'))
       ->join('tble_roc_name_map', 'tble_email_sent.rocCode', '=', 'tble_roc_name_map.roc_code')
       ->groupBy('roc_code')
       ->groupBy('roc_name')
       ->get();
       $roc_names = [];
       $email_sent_count = [];
       foreach($comp_data as $rec)
       {
           $roc_names[] = $rec->roc_name;
           $email_sent_count[] =  $rec->_count;
       }
       $data['roc_wise_email'] = ['_names'=>$roc_names, '_count'=>$email_sent_count,'year'=>$curr_year];

       //Provision Wise Notice status report
        $query = "SELECT provisionId as provision_id, SUM(c1) as c1, SUM(c2) as c2, SUM(c3) as c3,SUM(c4) as c4,SUM(c5) as c5
        from cmp_notice_status
        where  YearOfFilling = '$curr_year'
        group by provision_id";
        $data['notice_status'] = DB::select($query);

       //Master company categorisation on the basis of company class(Public, private, others)
        $comp_data = DB::table('master_companies_distinct_all')
       ->select(DB::raw('count(*) as _count, COMPANY_CLASS'))
       ->groupBy('COMPANY_CLASS')
       ->orderBy('COMPANY_CLASS','DESC')
       ->get();
       $company_class_data = [];
       foreach($comp_data as $rec)
       {
           $company_class_data[] =  ['year'=>$curr_year, 'name'=>($rec->COMPANY_CLASS !='' && $rec->COMPANY_CLASS !=' ')?$rec->COMPANY_CLASS:'Others', 'y'=>$rec->_count];
       }
       $data['company_class_data'] = $company_class_data;

        // master and Non compliance company data comparison
        $comp_data = DB::select("SELECT count(*) as _count1,_count2, master_companies_distinct_all.COMPANY_CLASS
        FROM master_companies_distinct_all
        join (SELECT count(*) as _count2, COMPANY_CLASS FROM tble_provision_master_final_set
        join master_companies_distinct_all on master_companies_distinct_all.cin=tble_provision_master_final_set.cin
        group by COMPANY_CLASS) as tble2 on tble2.COMPANY_CLASS =  master_companies_distinct_all.COMPANY_CLASS
        group by master_companies_distinct_all.COMPANY_CLASS");

        $total_company = [];
        $total_non_compliance_company =[];
        $total_compliance_company =[];
        $comp_class = [];
        $total_sum = 0;
        $non_compliance_sum = 0;
        $compliance_sum = 0;
        foreach($comp_data as $rec)
        {
            $total_company[] = $rec->_count1;
            $total_non_compliance_company[] =$rec->_count2;
            $total_compliance_company[] =(int)$rec->_count1-(int)$rec->_count2;
            $total_sum += 0+(int)$rec->_count1;
            $non_compliance_sum += 0+(int)$rec->_count2;
            $compliance_sum += 0+(int)$rec->_count1-(int)$rec->_count2;
            $comp_class[] = $rec->COMPANY_CLASS;
        }
        //Get User List
        $query = "SELECT distinct rocName, Region, firstName from cmp_notice_status";
        $data['user_list'] = DB::select($query);

        //Report for Non Compliance, Notice Sent, Reply Recieved

        $query ="select provision_id, count(distinct tpm.CIN) as dcount, count(distinct tes.cin) as scount,  count(distinct er.cin) as rcount from  tble_provision_master_final_set tpm
        left Join tble_email_sent tes ON tpm.CIN=tes.cin and tes.provisionId=tpm.provision_id
        left Join email_reply er ON tpm.CIN=er.cin and er.provisionId=tpm.provision_id
        where tpm.YearOfFiling = '$curr_year'
        group by provision_id";
        $data['data_nsr'] = DB::select($query);

        //Overall Non compliance , Notice Sent, Reply Received
        $query ="select count(distinct tpm.CIN) as dcount, count(distinct tes.cin) as scount,  count(distinct er.cin) as rcount from  tble_provision_master_final_set tpm
        left Join tble_email_sent tes ON tpm.CIN=tes.cin and tes.provisionId=tpm.provision_id
        left Join email_reply er ON tpm.CIN=er.cin and er.provisionId=tpm.provision_id
        where tpm.YearOfFiling = '$curr_year'";
        $data['data_overnsr'] = DB::select($query);

        $data['master_compliance_comparison'] = ['total_company'=>$total_company,
        'comp_class'=>$comp_class,
        'total_non_compliance_company'=>$total_non_compliance_company,
        'total_compliance_company'=>$total_compliance_company,
        'total_sum'=>$total_sum,
        'compliance_sum'=>$compliance_sum,
        'non_compliance_sum'=>$non_compliance_sum];
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
