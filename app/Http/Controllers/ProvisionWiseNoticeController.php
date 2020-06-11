<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Validator, DB, Hash;
class ProvisionWiseNoticeController extends Controller
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
        $year  = $request->input('year');
        $provisionId  = str_replace("Provision ","",$request->input('provisionId'));

        $params = ['year'=>$year, 'provisionId'=>$provisionId];
        if($request->input('searchKey') !='')
        {
            $search_key = " AND (company_name LIKE '%".$request->input('searchKey')."%' OR cin = '".$request->input('searchKey')."')";
            $params['searchKey'] = $request->input('searchKey');
        }
        $perPage = 10;
        $currentPage = $request->input('page') ?: 1;
        $counter = (isset($currentPage) && $currentPage> 1) ? ($currentPage-1)*$perPage+1:1;
        $slice_init = ($currentPage == 1) ? 0 : (($currentPage*$perPage)-$perPage);

       $query = "SELECT distinct cin, company_name, YearOfFilling
       FROM tble_email_sent
       where provisionId= '".$provisionId."' and YearOfFilling=$year $search_key LIMIT $slice_init, $perPage";

       $pagedData = DB::select($query);

       $query = "SELECT count(distinct cin) as _count
       FROM tble_email_sent
       where provisionId= '".$provisionId."' and YearOfFilling=".$year.$search_key;
       $count_data = DB::select($query);
       $total = $count_data[0]->_count;

       $notice_data = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, $total, $perPage, $currentPage);

       $notice_data->setPath(url('provision_wise_notice/list'))->appends($params);

        // $query = DB::getQueryLog();

        // echo "<pre>";
        // print_r($query);
        // die;
        return view('provision_wise_notice.index',['notice_data'=>$notice_data, 'total'=>$total,'counter'=>$counter,'provisionId'=>$provisionId, 'year'=>$year,'searchKey' => $request->input('searchKey')]);
    }
}
