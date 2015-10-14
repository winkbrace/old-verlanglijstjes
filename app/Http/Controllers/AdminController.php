<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response;

class AdminController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Admin Controller
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
        $members = User::all(['id', 'name', 'rank', 'order'])->sortBy('order');

        return view('home')->with(compact('members'));
    }

}
