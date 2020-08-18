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
class InspectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search_key = '';
        DB::enableQueryLog();
        $inspector  = $request->input('inspector');
        $year  = $request->input('year');
        $status  = $request->input('status');
        $str1 = explode("(",str_replace(")","",$inspector));
        $fName = trim($str1[1]);
        $params['inspector'] = $request->input('inspector');
        $params['year'] = $request->input('year');
        $params['status'] = $request->input('status');
        if($request->input('searchKey') !='')
        {
            $search_key = " AND (company_name LIKE '%".$request->input('searchKey')."%' OR cin = '".$request->input('searchKey')."')";
            $params['searchKey'] = $request->input('searchKey');
        }
        $perPage = 10;
        $currentPage = $request->input('page') ?: 1;
        $counter = (isset($currentPage) && $currentPage> 1) ? ($currentPage-1)*$perPage+1:1;
        $slice_init = ($currentPage == 1) ? 0 : (($currentPage*$perPage)-$perPage);

       $query = "SELECT distinct tble_email_sent.cin, company_name,  YearOfFilling
       FROM tble_email_sent
       join tble_inspector_details on  tble_email_sent.rocCode= tble_inspector_details.rocCode
       join master_users on  tble_inspector_details.userID= master_users.uID
       join tble_provision_master_final_set ON tble_email_sent.cin=tble_provision_master_final_set.CIN
       inner join tble_provision_meta_data ON tble_provision_master_final_set.status=tble_provision_meta_data.status
       where tble_inspector_details.deptID=2 and tble_inspector_details.catID=50
       and tble_inspector_details.firstName ='$fName' and YearOfFilling=$year
       and (tble_provision_master_final_set.status='$status' OR tble_provision_master_final_set.status IN (select status from tble_provision_meta_data where action='$status')) $search_key  LIMIT $slice_init, $perPage";
       $pagedData = DB::select($query);


       echo $query = "SELECT count(distinct tble_email_sent.cin) as _count
       FROM tble_email_sent
       join tble_inspector_details on  tble_email_sent.rocCode= tble_inspector_details.rocCode
       join master_users on  tble_inspector_details.userID= master_users.uID
       inner join tble_provision_master_final_set ON tble_email_sent.cin=tble_provision_master_final_set.CIN
       inner join tble_provision_meta_data ON tble_provision_master_final_set.status=tble_provision_meta_data.status
       where tble_inspector_details.deptID=2 and tble_inspector_details.catID=50
       and tble_inspector_details.firstName ='$fName' and YearOfFilling=$year
       and (tble_provision_master_final_set.status='$status' OR tble_provision_master_final_set.status IN (select status from tble_provision_meta_data where action='$status')) $search_key";
       die;
       $count_data = DB::select($query);
       $total = $count_data[0]->_count;
       $notice_data = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, $total, $perPage, $currentPage);

       $notice_data->setPath(url('inspector_wise_notice/list'))->appends($params);

        // $query = DB::getQueryLog();

        // echo "<pre>";
        // print_r($query);
        // die;
        return view('inspector.index',['notice_data'=>$notice_data, 'total'=>$total,'counter'=>$counter,'year'=>$year, 'inspector'=>$inspector, 'searchKey' => $request->input('searchKey')]);
    }
    public function report(Request $request)
    {
        $curr_year = ($request->input('year') != '') ? $request->input('year'):'2017';
        $query = "select group_concat(_count) as cnt, group_concat(action) as action, group_concat(status) as status, firstName, fName,
        YearOfFilling from cmp_inspector_status_report
        where `YearOfFilling` = $curr_year group by firstName, fName";
        $comp_data = DB::select($query);

        $inspector_names = [];
        $comp_count = [];
        $meta_name = [];
        foreach($comp_data as $rec)
        {
            $inspector_names[] = $rec->firstName." ( ".$rec->fName." )";
            $notice_counts =explode(",",$rec->cnt);
            $meta_names =explode(",",$rec->action);
            $meta_name['No Action'][] = (isset($notice_counts[0]))?$notice_counts[0]:'0';
            $meta_name['Notice Sent'][] = (isset($notice_counts[1]))?$notice_counts[1]:'0';
            $meta_name['Drop Charges'][] = (isset($notice_counts[2]))?$notice_counts[2]:'0';
            $meta_name['Subject to Prosecution'][] = (isset($notice_counts[3]))?$notice_counts[3]:'0';
            $meta_name['Further Examination Required.'][] = (isset($notice_counts[4]))?$notice_counts[4]:'0';
        }
        $data = ['inspector_names'=>$inspector_names, 'meta_name'=>$meta_name,'year' =>$curr_year, 'comp_data'=>$comp_data];
        //echo "<pre>";print_r($data);die;
        return view('inspector.report', $data);
    }
}
