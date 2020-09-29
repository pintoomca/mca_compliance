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
        $inspector ='';
        DB::enableQueryLog();
        $perPage = 20;
        $currentPage = $request->input('page') ?: 1;
        $counter = (isset($currentPage) && $currentPage> 1) ? ($currentPage-1)*$perPage+1:1;
        $slice_init = ($currentPage == 1) ? 0 : (($currentPage*$perPage)-$perPage);

        $year  = $request->input('year');
        $status  = $request->input('status');
        if($request->input('inspector') != '')
        {
            $inspector  = $params['inspector'] = $request->input('inspector');
            $str1 = explode("(",str_replace(")","",$inspector));
            $fName = trim($str1[1]);
            $search_key .="and tble_inspector_details.firstName ='$fName'";
        }
        if($request->input('roc') != '')
        {
            $roc  = $params['roc'] = $request->input('roc');
            $search_key .="and tble_inspector_details.rocName ='$roc'";
        }
        if($request->input('provision_id') != '')
        {
            $provision_id  = $params['provision_id'] = $request->input('provision_id');
            $search_key .="and provision_id ='$provision_id'";
        }
        $params['year'] = $request->input('year');
        $params['status'] = $request->input('status');
        if($request->input('action')!='')
        {
            $meta_data = DB::table('tble_provision_meta_data')->where('action', $request->input('action'))->first();
            $params['status'] = $meta_data->status;
            $status = $meta_data->status;
        }
        if($request->input('status') != '')
        {
            $status  = $params['status'] = $request->input('status');
        }
        if($request->input('searchKey') !='')
        {
            $search_key .= " AND (company_name LIKE '%".$request->input('searchKey')."%' OR cin = '".$request->input('searchKey')."')";
            $params['searchKey'] = $request->input('searchKey');
        }
        $swhere = '';

        if($status !='')
        {
            $search_key .="and (tble_provision_master_final_set.status='$status')";
            $query = "SELECT distinct tble_email_sent.cin, company_name,  YearOfFilling
            FROM tble_email_sent
            join tble_inspector_details on  tble_email_sent.rocCode= tble_inspector_details.rocCode
            join master_users on  tble_inspector_details.userID= master_users.uID
            join tble_provision_master_final_set ON tble_email_sent.cin=tble_provision_master_final_set.CIN
            inner join tble_provision_meta_data ON tble_provision_master_final_set.status=tble_provision_meta_data.status
            where tble_inspector_details.deptID=2 and tble_inspector_details.catID=50
             and YearOfFilling='$year'
            $search_key LIMIT $slice_init, $perPage";
            $pagedData = DB::select($query);


            $query = "SELECT count(distinct tble_email_sent.cin) as _count
            FROM tble_email_sent
            join tble_inspector_details on  tble_email_sent.rocCode= tble_inspector_details.rocCode
            join master_users on  tble_inspector_details.userID= master_users.uID
            inner join tble_provision_master_final_set ON tble_email_sent.cin=tble_provision_master_final_set.CIN
            inner join tble_provision_meta_data ON tble_provision_master_final_set.status=tble_provision_meta_data.status
            where tble_inspector_details.deptID=2 and tble_inspector_details.catID=50
            and YearOfFilling='$year'
             $search_key";

            $count_data = DB::select($query);
        }
        else{
            $query = "SELECT tble_email_sent.cin, company_name,  YearOfFilling
            FROM tble_email_sent
            join tble_inspector_details on  tble_email_sent.rocCode= tble_inspector_details.rocCode
            join master_users on  tble_inspector_details.userID= master_users.uID
            join tble_provision_master_final_set ON tble_email_sent.cin=tble_provision_master_final_set.CIN
            inner join tble_provision_meta_data ON tble_provision_master_final_set.status=tble_provision_meta_data.status
            where tble_inspector_details.deptID=2 and tble_inspector_details.catID=50
             and YearOfFilling=$year
            $search_key group by tble_email_sent.cin, company_name,  YearOfFilling LIMIT $slice_init, $perPage";
            $pagedData = DB::select($query);


            $query = "SELECT count(distinct tble_email_sent.cin) as _count
            FROM tble_email_sent
            join tble_inspector_details on  tble_email_sent.rocCode= tble_inspector_details.rocCode
            join master_users on  tble_inspector_details.userID= master_users.uID
            inner join tble_provision_master_final_set ON tble_email_sent.cin=tble_provision_master_final_set.CIN
            inner join tble_provision_meta_data ON tble_provision_master_final_set.status=tble_provision_meta_data.status
            where tble_inspector_details.deptID=2 and tble_inspector_details.catID=50
             and YearOfFilling=$year
            $swhere  $search_key";
            $count_data = DB::select($query);
        }
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
        // $curr_year = ($request->input('year') != '') ? $request->input('year'):'2017';
        $query = "SELECT Region, firstName,  SUM(c1) as c1, SUM(c2) as c2, SUM(c3) as c3,SUM(c4) as c4,SUM(c5) as c5
        from cmp_notice_status
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

        // Inspectory wise email sent and reply
        $query = "SELECT count(distinct tes.CIN) as _count_sent, count(distinct er.CIN) as _count_reply,mu.uID, mu.firstName, tid.firstName as fName,
        YearOfFilling
        from master_users as mu
        inner join tble_inspector_details as tid on mu.uID = tid.userID
        inner join tble_email_sent as tes on tes.rocCode = tid.rocCode
        left join email_reply as er on er.cin = tes.cin
        where tid.deptID=2 and tid.catID=50 and mu.uID IN (383,384,385,386,387, 388, 389)
        group by YearOfFilling,mu.uID, mu.firstName, tid.firstName";
        $comp_data_sr = DB::select($query);

        // Buble chart data for inspector with roc
        $query = "select firstName, Region,rocName, SUM(c1+c2+c3+c4+c5) as _count from cmp_notice_status group by
        firstName,Region, rocName";
        $_data= DB::select($query);
        $ins_roc_data =[];
       foreach($_data as $row)
       {
         $ins_roc_data[$row->firstName.'('.$row->Region.')'][] = ['name' => $row->rocName, 'value' => $row->_count];
       }

        $data = ['ins_roc_data'=>$ins_roc_data,'inspector_names'=>$inspector_names, 'meta_name'=>$meta_name,'year' =>'', 'comp_data'=>$comp_data,'comp_data_sr'=>$comp_data_sr];
        return view('inspector.report', $data);
    }

    public function reportStep3(Request $request)
    {
        $inspector  = $request->input('inspector');
        $year  = $request->input('year');
        $type  = $request->input('type');
        $str1 = explode("(",str_replace(")","",$inspector));
        $fName = trim($str1[1]);
        // Inspectory wise email sent OR reply
        if($type == 'sent')
        {
            /*Roc Wise counts*/
            $query = "SELECT count(distinct tes.CIN) as _count,
            tid.rocName
            from master_users as mu
            inner join tble_inspector_details as tid on mu.uID = tid.userID
            inner join tble_email_sent as tes on tes.rocCode = tid.rocCode
            where tid.deptID=2 and tid.catID=50 and mu.uID IN (383,384,385,386,387, 388, 389)
            and tid.firstName ='$fName' and `YearOfFilling` = $year
            group by tid.rocName";
            $roc_data = DB::select($query);

            /*Provision Wise counts*/
            $query = "SELECT count(distinct tes.CIN) as _count,
            provisionId as provision_id
            from master_users as mu
            inner join tble_inspector_details as tid on mu.uID = tid.userID
            inner join tble_email_sent as tes on tes.rocCode = tid.rocCode
            where tid.deptID=2 and tid.catID=50 and mu.uID IN (383,384,385,386,387, 388, 389)
            and tid.firstName ='$fName' and `YearOfFilling` = $year
            group by provisionId";

            $provision_data = DB::select($query);
            $roc_names =[];
            $roc_counts = [];
            foreach($roc_data as $row)
            {
                $roc_names[] = $row->rocName;
                $roc_counts[] = $row->_count;
            }

            $provision_ids =[];
            $provision_counts =[];
            foreach($provision_data as $row)
            {
                $provision_ids[] = $row->provision_id;
                $provision_counts[] = $row->_count;
            }
            /*Roc Wise counts*/
            $query = "SELECT rocName, SUM(c1) as c1, SUM(c2) as c2, SUM(c3) as c3, SUM(c4) as c4, SUM(c5) as c5
            from cmp_notice_status
            where  Region ='$fName' and YearOfFilling = $year
            group by rocName";
            $rocData = DB::select($query);

            /*Provision Wise counts*/
            $query = "SELECT
            provisionId as provision_id, SUM(c1) as c1, SUM(c2) as c2, SUM(c3) as c3, SUM(c4) as c4, SUM(c5) as c5
            from cmp_notice_status
            where Region ='$fName' and `YearOfFilling` = $year
            group by provision_id";
            $provisionData = DB::select($query);
            return view('inspector.report-step3-sent', ['inspector'=>$inspector, 'year'=>$year,'roc_data'=>['_name'=>$roc_names,'_count'=>$roc_counts],'provision_data'=>['_provision'=>$provision_ids,'_count'=>$provision_counts],'rocData'=>$rocData,'provisionData'=>$provisionData]);
        }
        else {
            $query = "SELECT count(distinct er.CIN) as _count,
            tes.uID, mu.firstName, tid.firstName as fName,
            YearOfFilling
            from master_users as mu
            inner join tble_inspectorDetails as tid on mu.uID = tid.userID
            inner join tble_email_sent as tes on tes.rocCode = tid.rocCode
            Inner join email_reply as er on er.cin = tes.cin
            where tid.deptID=2 and tid.catID=50 and mu.uID IN (383,384,385,386,387, 388, 389)
            and `YearOfFilling` = $year
            group by YearOfFilling,tes.uID, mu.firstName, tid.firstName";
            $comp_data = DB::select($query);

            return view('inspector.report-step3', ['inspector'=>$inspector, 'year'=>$year,'roc_data'=>$roc_data,'provision_data'=>$provision_data]);
        }

    }

    public function reportStep1(Request $request)
    {
        $inspector  = $request->input('inspector');
        $status  = $request->input('status');
        $str1 = explode("(",str_replace(")","",$inspector));
        $fName = trim($str1[1]);
        if($request->input('action')!='')
        {
            $meta_data = DB::table('tble_provision_meta_data')->where('action', $request->input('action'))->first();
            $status = $meta_data->status;
        }
        $status +=1;

        $select ='';
        $ys =  (int)date('Y')-5;
        $ye =  (int)date('Y');
        for ($x = $ys; $x <= $ye; $x++) {
            $select .=", SUM(CASE WHEN YearOfFilling = '$x' THEN c$status END) '$x'";
        }
        $query = "SELECT rocName $select
        from cmp_notice_status
        where  Region ='$fName'
        group by rocName";

        $rocData = DB::select($query);

        $query = "SELECT provisionId as provision_id
        $select
        from cmp_notice_status
        where  Region ='$fName'
        group by provision_id";
        $provisionData = DB::select($query);
        $status  = $request->input('status');
        return view('inspector.report-step1', ['inspector'=>$request->input('inspector'),'rocData'=>$rocData, 'status'=>$status, 'year'=>'','provisionData'=>$provisionData]);
    }
}
