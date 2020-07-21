<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
//use App\Home;
use Validator, DB, Hash;
use App\User;
use JWTAuth;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
    }

    public function index2()
    {
        return view('layout.home2');
    }

    public function index3()
    {
        return view('layout.home3');
    }

    public function index4()
    {
        return view('layout.home4');
    }

    public function index5()
    {
        return view('layout.home5');
    }

}
