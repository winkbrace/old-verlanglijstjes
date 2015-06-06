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
        // redirects users to admin index when they are logged in
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $members = json_decode('[{"name":"Bas"}, {"name": "Lieselot"}]');

        return view('list')->with(compact('members'));
    }

    public function test()
    {
        return view('test');
    }

}
