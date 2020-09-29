<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
//use App\Home;
use Validator, DB, Hash;
class NoticeController extends Controller
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

        $year  = ($request->input('year') ) ?  $request->input('year'):'2107';
        $provision_id  = $request->input('provision_id');
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
            $params['provision_id'] = $request->input('provision_id');
            $search_key .="and provisionId ='$provision_id'";
        }
        $params['year'] = $year;

        if($request->input('searchKey') !='')
        {
            $search_key .= " AND (company_name LIKE '%".$request->input('searchKey')."%' OR cin LIKE '%".$request->input('searchKey')."%')";
            $params['searchKey'] = $request->input('searchKey');
        }

            $query = "SELECT tble_email_sent.cin, company_name,  YearOfFilling,Alert
            FROM tble_email_sent
            join tble_inspector_details on  tble_email_sent.rocCode= tble_inspector_details.rocCode
            join master_users on  tble_inspector_details.userID= master_users.uID
            where tble_inspector_details.deptID=2 and tble_inspector_details.catID=50
            and YearOfFilling=$year
            $search_key group by tble_email_sent.cin, company_name,  YearOfFilling,Alert LIMIT $slice_init, $perPage";

            $pagedData = DB::select($query);


             $query = "SELECT count(distinct tble_email_sent.cin) as _count
            FROM tble_email_sent
            join tble_inspector_details on  tble_email_sent.rocCode= tble_inspector_details.rocCode
            join master_users on  tble_inspector_details.userID= master_users.uID
            where tble_inspector_details.deptID=2 and tble_inspector_details.catID=50
            and YearOfFilling=$year
            $search_key";

            $count_data = DB::select($query);




         $total = $count_data[0]->_count;
         $notice_data = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, $total, $perPage, $currentPage);
        $notice_data->setPath(url('notice/list'))->appends($params);

        // $query = DB::getQueryLog();

        // echo "<pre>";
        // print_r($query);
        // die;
        return view('notice.index',['notice_data'=>$notice_data, 'provision_id' => $provision_id, 'year' => $year,'total'=>$total, 'counter'=>$counter,'searchKey' => $request->input('searchKey')]);



        // $notice_data =  DB::table('tble_provision_master_final_set')
        // ->select('*')
        // ->select(DB::raw('provision_id, YearOfFiling, tble_provision_meta_data.status, tble_provision_meta_data.action'))
        // ->join('tble_provision_meta_data', 'tble_provision_master_final_set.status', '=', 'tble_provision_meta_data.status')
        // ->whereRaw("provision_id ='$provision_id' && tble_provision_meta_data.status='$status' && YearOfFiling ='$year'")
        // ->paginate(10);

        // return view('notice.index',['notice_data'=>$notice_data, 'provision_id' => $provision_id,'status' => $status, 'year' => $year]);
    }
    public function report()
    {
        return view('notice.report',['notice_data'=>$notice_data, 'provision_id' => $provision_id,'status' => $status, 'year' => $year,'total'=>$total, 'counter'=>$counter,'searchKey' => $request->input('searchKey')]);

    }
}
