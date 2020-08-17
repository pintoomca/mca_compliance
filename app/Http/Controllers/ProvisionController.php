<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Validator, DB, Hash;
class ProvisionController extends Controller
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
        return view('provision.index',['notice_data'=>$notice_data, 'total'=>$total,'counter'=>$counter,'provisionId'=>$provisionId, 'year'=>$year,'searchKey' => $request->input('searchKey')]);
    }
    public function report(Request $request)
    {
        $curr_year = ($request->input('year') != '') ? $request->input('year'):'2017';
        // Provision wise email sent
        $query = "select count(*) as _count,  provision_id from tble_provision_master_final_set
         group by provision_id";
        $comp_data = DB::select($query);

        $query = "SELECT COUNT(*) AS _count, provisionId, t3.roc_name, t3.roc_code,YearOfFilling FROM  tble_email_sent AS t2
        JOIN tble_roc_name_map AS t3 ON  t2.rocCode= t3.roc_code
        GROUP BY provisionId, t3.roc_name,t3.roc_code,YearOfFilling";
        $r_data = DB::select($query);
        $roc_data = [];
        $provision_id = '';
        foreach($r_data as $k=>$rdata)
        {
             if($rdata->provisionId != $provision_id)
             {
                $provision_id =$rdata->provisionId;
                $roc_data[$provision_id][] = ['_count'=>$rdata->_count,'roc_name'=>$rdata->roc_name, 'roc_code'=>$rdata->roc_code];
             }
             else{
                $roc_data[$provision_id][] = ['_count'=>$rdata->_count,'roc_name'=>$rdata->roc_name, 'roc_code'=>$rdata->roc_code];
             }
        }

        $query = "select count(*) as _count, YearOfFiling, provision_id from tble_provision_master_final_set
        group by YearOfFiling,provision_id";
        $y_data = DB::select($query);

        $year_data = [];
        $provision_id = '';
        foreach($y_data as $k=>$rdata)
        {
             if($rdata->provision_id != $provision_id)
             {
                $provision_id =$rdata->provision_id;
                $year_data[$provision_id][] = ['_count'=>$rdata->_count, 'YearOfFiling'=>$rdata->YearOfFiling];
             }
             else{
                $year_data[$provision_id][] = ['_count'=>$rdata->_count, 'YearOfFiling'=>$rdata->YearOfFiling];
             }
        }
        //Company Type(Private, Public)
        $query = "SELECT sum(_count) as count, COMPANY_CLASS, provision_id FROM cmp_prvoision_company_class
        group by provision_id, COMPANY_CLASS";
        $y_data = DB::select($query);

        // $comp_type_data = [];
        // $provision_id = '';
        // foreach($y_data as $k=>$rdata)
        // {
        //      if($rdata->provision_id != $provision_id)
        //      {
        //         $provision_id =$rdata->provision_id;
        //         $comp_type_data[$provision_id][] = ['_count'=>$rdata->_count, 'YearOfFiling'=>$rdata->YearOfFiling];
        //      }
        //      else{
        //         $comp_type_data[$provision_id][] = ['_count'=>$rdata->_count, 'YearOfFiling'=>$rdata->YearOfFiling];
        //      }
        // }

        $chart_data = [];
        foreach($comp_data as $k=>$row)
        {
            $chart_data[$k]['_count'] = $row->_count;
            $chart_data[$k]['provision_id'] = $row->provision_id;
            $chart_data[$k]['year_wise'] = (!empty($year_data[$row->provision_id]))?$year_data[$row->provision_id]:[];
            $chart_data[$k]['roc_wise'] = (!empty($roc_data[$row->provision_id]))?$roc_data[$row->provision_id]:[];
        }
        $data = ['chart_data'=>$chart_data];
        return view('provision.report', $data);
    }
}
