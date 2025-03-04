<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
//use App\Home;
use Validator, DB, Hash;
class CompanySearchController extends Controller
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
        $str1 = explode("(",str_replace(")","",$inspector));
        $fName = trim($str1[1]);
        $params['inspector'] = $request->input('inspector');
        $params['year'] = $request->input('year');
        if($request->input('searchKey') !='')
        {
            $search_key = " AND (company_name LIKE '%".$request->input('searchKey')."%' OR cin = '".$request->input('searchKey')."')";
            $params['searchKey'] = $request->input('searchKey');
        }

       $query = "SELECT distinct cin, company_name,  YearOfFilling
       FROM tble_email_sent
       join tble_inspector_details on  tble_email_sent.rocCode= tble_inspector_details.rocCode
       join master_users on  tble_inspector_details.userID= master_users.uID
       where tble_inspector_details.deptID=2 and tble_inspector_details.catID=50
       and tble_inspector_details.firstName ='$fName' and YearOfFilling=$year".$search_key;
       $notice_data = DB::select($query);
       $notice_data = collect($notice_data);
       $perPage = 10;
       $currentPage = $request->input('page') ?: 1;
       $counter = (isset($currentPage) && $currentPage> 1) ? ($currentPage-1)*$perPage+1:1;
       $slice_init = ($currentPage == 1) ? 0 : (($currentPage*$perPage)-$perPage);
       $pagedData = $notice_data->slice($slice_init, $perPage)->all();
       $notice_data = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($notice_data), $perPage, $currentPage);

       $notice_data->setPath(url('inspector_wise_notice/list'))->appends($params);

        // $query = DB::getQueryLog();

        // echo "<pre>";
        // print_r($query);
        // die;
        return view('inspector_wise_notice.index',['notice_data'=>$notice_data, 'counter'=>$counter,'year'=>$year, 'inspector'=>$inspector, 'searchKey' => $request->input('searchKey')]);
    }
}
