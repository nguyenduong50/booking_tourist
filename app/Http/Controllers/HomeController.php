<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TravelPackage;
use App\Models\Transaction;
use App\Models\Post;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datetime_now = Carbon::now();
        $countUser = User::count();
        $countTravelPackage = TravelPackage::count();
        $countTransaction = Transaction::count();
        $countPost = Post::count();

        $recentUser = User::take(5)->get();
        $recentTransaction = Transaction::take(5)->get();

        return view('admin.home', compact([
            'datetime_now', 
            'countUser',
            'countTravelPackage',
            'countTransaction',
            'countPost',
            'recentUser',
            'recentTransaction'
        ]));
    }
}
