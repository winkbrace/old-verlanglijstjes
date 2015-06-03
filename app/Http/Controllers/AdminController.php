<?php namespace App\Http\Controllers;

use Illuminate\Http\Response;

class AdminController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the admin views that are available for
    | family members with login credentials
    |
    */

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }

}
