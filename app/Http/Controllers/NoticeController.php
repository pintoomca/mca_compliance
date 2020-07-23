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

        $perPage = 10;
        $currentPage = $request->input('page') ?: 1;
        $counter = (isset($currentPage) && $currentPage> 1) ? ($currentPage-1)*$perPage+1:1;
        $slice_init = ($currentPage == 1) ? 0 : (($currentPage*$perPage)-$perPage);


        $search_key = '';
        DB::enableQueryLog();
        $provision_id = $request->input('provision_id');
        $year = $request->input('year');
        $status = $request->input('status');
        $params['provision_id'] = $request->input('provision_id');
        $params['year'] = $request->input('year');
        $params['status'] = $request->input('status');
        if($request->input('searchKey') !='')
        {
            $search_key = " AND (companyname LIKE '%".$request->input('searchKey')."%' OR cin = '".$request->input('searchKey')."')";
            $params['searchKey'] = $request->input('searchKey');
        }

       $query = "SELECT *
       FROM tble_provision_master_final_set
       JOIN tble_provision_meta_data ON tble_provision_master_final_set.status = tble_provision_meta_data.status
       where provision_id ='$provision_id' && tble_provision_meta_data.status='$status' && YearOfFiling ='$year' $search_key  LIMIT $slice_init, $perPage";
       $pagedData = DB::select($query);

       $query = "SELECT count(*) as _count
       FROM tble_provision_master_final_set
       JOIN tble_provision_meta_data ON tble_provision_master_final_set.status = tble_provision_meta_data.status
       where provision_id ='$provision_id' && tble_provision_meta_data.status='$status' && YearOfFiling ='$year' $search_key";
       $count_data = DB::select($query);
       $total = $count_data[0]->_count;
       $notice_data = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, $total, $perPage, $currentPage);
       $notice_data->setPath(url('notice/list'))->appends($params);

        // $query = DB::getQueryLog();

        // echo "<pre>";
        // print_r($query);
        // die;
        return view('notice.index',['notice_data'=>$notice_data, 'provision_id' => $provision_id,'status' => $status, 'year' => $year,'total'=>$total, 'counter'=>$counter,'searchKey' => $request->input('searchKey')]);



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
