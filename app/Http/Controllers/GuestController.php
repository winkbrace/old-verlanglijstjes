<?php namespace App\Http\Controllers;

use App\User;
use App\WishList;
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
        $members = User::all(['id', 'name', 'rank', 'order'])->sortBy('order');

        return view('list')->with(compact('members'));
    }

    /**
     * @param string $name username
     * @return Response
     */
    public function wishList($name)
    {
        /** @var WishList[] $items */
        $items = User::where('name', '=', $name)->firstOrFail()->wishListItems;

        return view('list')->with(compact('items'));
    }

}
