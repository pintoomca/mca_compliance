<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Validator, DB, Hash;
class ProvisionWiseCompanyController extends Controller
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
        $year  = $request->input('year');
        $provisionId  = str_replace("Provision ","",$request->input('provisionId'));
        $params = ['year'=>$year, 'provisionId'=>$provisionId];
        if($request->input('searchKey') !='')
        {
            $search_key = " AND (Companyname LIKE '%".$request->input('searchKey')."%' OR CIN = '".$request->input('searchKey')."')";
            $params['searchKey'] = $request->input('searchKey');
        }

       $query = "SELECT distinct CIN as cin, YearOfFiling as YearOfFilling,Companyname as company_name
       FROM tble_provision_master_final_set
       where provision_id= '".$provisionId."' and YearOfFiling=".$year.$search_key."  LIMIT $slice_init, $perPage";
       $pagedData = DB::select($query);

       $query = "SELECT count(*) as _count
       FROM tble_provision_master_final_set
       where provision_id= '".$provisionId."' and YearOfFiling=".$year.$search_key;
       $count_data = DB::select($query);
       $total = $count_data[0]->_count;
       $notice_data = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, $total, $perPage, $currentPage);
       $notice_data->setPath(url('provision_wise_company/list'))->appends($params);

        return view('provision_wise_company.index',['counter'=>$counter, 'total'=>$total,'notice_data'=>$notice_data, 'provisionId'=>$provisionId, 'year'=>$year,'searchKey' => $request->input('searchKey')]);
    }
}
