<?php namespace App\Http\Controllers;

use Illuminate\Http\Response;

class GuestController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the view that is available for visitors that
    | are not logged in.
    |
    */

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('welcome');
    }

}
