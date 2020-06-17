<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Validator, DB, Hash;
use App\Company;
class CompanyController extends Controller
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
        $company_class  = $request->input('company_class');
        $year  = $request->input('year');
        $params['company_class'] = $request->input('company_class');
        $params['year'] = $request->input('year');
        if($request->input('sort') !='' && $request->input('direction') !='')
        {
            $search_key .= " order by ".$request->input('sort')."  ".$request->input('direction')." ";
            $params['sort'] = $request->input('sort');
            $params['direction'] = $request->input('direction');
        }
        if($request->input('LISTED_FLAG') !='')
        {
            $search_key .= " AND LISTED_FLAG LIKE '%".$request->input('LISTED_FLAG')."%'";
            $params['LISTED_FLAG'] = $request->input('LISTED_FLAG');
        }
        if($request->input('LISTED_FLAG') !='')
        {
            $search_key .= " AND LISTED_FLAG LIKE '%".$request->input('LISTED_FLAG')."%'";
            $params['LISTED_FLAG'] = $request->input('LISTED_FLAG');
        }
        if($request->input('COMPANY_STATUS') !='')
        {
            $search_key .= " AND COMPANY_STATUS LIKE '%".$request->input('COMPANY_STATUS')."%'";
            $params['COMPANY_STATUS'] = $request->input('COMPANY_STATUS');
        }
        if($request->input('COMPANY_CLASS') !='')
        {
            $search_key .= " AND COMPANY_CLASS LIKE '%".$request->input('COMPANY_CLASS')."%'";
            $params['COMPANY_CLASS'] = $request->input('COMPANY_CLASS');
        }
        if($request->input('COMPANY_SUBCAT') !='')
        {
            $search_key .= " AND COMPANY_SUBCAT LIKE '%".$request->input('COMPANY_SUBCAT')."%'";
            $params['COMPANY_SUBCAT'] = $request->input('COMPANY_SUBCAT');
        }
        if($request->input('compname') !='')
        {
            $search_key .= " AND (compname LIKE '%".$request->input('compname')."%' OR cin = '".$request->input('compname')."')";
            $params['compname'] = $request->input('compname');
        }
        if($request->input('searchKey') !='')
        {
            $search_key .= " AND (compname LIKE '%".$request->input('searchKey')."%' OR cin = '".$request->input('searchKey')."')";
            $params['searchKey'] = $request->input('searchKey');
        }

       $query = "SELECT CIN, compname, ADDR_LINE1,ADDR_LINE2
       FROM master_companies_distinct_all
       where COMPANY_CLASS like '%".$company_class."%' $search_key  LIMIT $slice_init, $perPage";

       $pagedData = Company::hydrate(DB::select($query)); ;

       $query = "SELECT count(*) as _count
       FROM master_companies_distinct_all
       where COMPANY_CLASS like '%".$company_class."%' $search_key";
       $count_data = DB::select($query);
       $total = $count_data[0]->_count;

       $notice_data = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, $total, $perPage, $currentPage);

       $notice_data->setPath(url('company/list'))->appends($params);

        // $query = DB::getQueryLog();

        // echo "<pre>";
        // print_r($query);
        // die;
        return view('company.index',['notice_data'=>$notice_data,'total'=>$total, 'counter'=>$counter,'searchKey' => $request->input('searchKey')]);
    }
    public function view(Request $request)
    {
        DB::enableQueryLog();
        $cin  = $request->input('cin');
        $year  = $request->input('year');

        $search_key = " AND (compname LIKE '%".$request->input('cin')."%' OR cin = '".$request->input('cin')."')";


       $query = "SELECT *
       FROM master_companies_distinct_all
       where 1 $search_key  LIMIT 1";
       $result = DB::select($query);
       $comp_data = $result[0];
        // $query = DB::getQueryLog();

        // echo "<pre>";
        // print_r($query);
        // die;
        return view('company.view',['comp_data'=>$comp_data]);
    }
}
