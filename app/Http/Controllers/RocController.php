<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
//use App\Home;
use Validator, DB, Hash;
class RocController extends Controller
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
        $roc  = $request->input('roc');
        $year  = $request->input('year');
        $provision_id  = $request->input('provision_id');
        $params = ['roc'=>$roc, 'year'=>$year, 'provision_id'=>$provision_id];
        if($request->input('searchKey') !='')
        {
            $search_key = " AND (company_name LIKE '%".$request->input('searchKey')."%' OR cin = '".$request->input('searchKey')."')";
            $params['searchKey'] = $request->input('searchKey');
        }
        $swhere = '';
        if($provision_id !='')
        {
            $swhere ="and (tble_email_sent.provisionId='$provision_id')";
        }
        $perPage = 10;
        $currentPage = $request->input('page') ?: 1;
        $counter = (isset($currentPage) && $currentPage> 1) ? ($currentPage-1)*$perPage+1:1;
        $slice_init = ($currentPage == 1) ? 0 : (($currentPage*$perPage)-$perPage);

       $query = "SELECT distinct cin, company_name, roc_name, YearOfFilling
       FROM tble_email_sent
       join tble_roc_name_map on  tble_email_sent.rocCode= tble_roc_name_map.roc_code
       where roc_name= '".$roc."' and YearOfFilling=$year $swhere $search_key  LIMIT $slice_init, $perPage";
       $pagedData = DB::select($query);

       $query = "SELECT count(distinct cin) as _count
       FROM tble_email_sent
       join tble_roc_name_map on  tble_email_sent.rocCode= tble_roc_name_map.roc_code
       where roc_name= '".$roc."' and YearOfFilling=$year $swhere ".$search_key;

       $count_data = DB::select($query);
        $total = $count_data[0]->_count;

       $notice_data = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, $total, $perPage, $currentPage);

       $notice_data->setPath(url('notice_roc/list'))->appends($params);

        // $query = DB::getQueryLog();

        // echo "<pre>";
        // print_r(count($notice_data));
        // die;
        return view('roc.index',['notice_data'=>$notice_data, 'counter'=>$counter, 'total'=>$total,'roc'=>$roc, 'year'=>$year, 'searchKey' => $request->input('searchKey')]);
    }
    public function report()
    {
        return view('roc.report',['notice_data'=>$notice_data, 'counter'=>$counter, 'total'=>$total,'roc'=>$roc, 'year'=>$year, 'searchKey' => $request->input('searchKey')]);

    }
}
