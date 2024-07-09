<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\TravelPackage;
use App\Models\Transaction;

class ClientController extends Controller
{
    public function Home ()
    {
        $posts = Post::orderBy('id', 'ASC')->where('destination', '<>', '')->get();
        $feature_posts = Post::orderBy('id', 'ASC')->where('featured', 1)->get();
        return view('client.home', compact(['posts', 'feature_posts']));
    }

    public function Travel_Package ()
    {
        $travel_packages = TravelPackage::orderBy('id', 'ASC')->get();
        return view('client.travel_package', compact(['travel_packages']));
    }

    public function Booking_Page (Request $request)
    {
        $travel_package = TravelPackage::findOrFail($request->travel_package_id);

        if(!$travel_package)
        {
            return redirect()->back()->with('error', 'Không tồn tại gói du lịchlịch');
        }

        return view('client.booking', compact(['travel_package']));
    }

    public function Booking (Request $request)
    {
        $transaction = new Transaction;
        $transaction->fill($request->all());
        $transaction->save();

        //Send mail transaction to user
        
        return redirect('/');
    }

    public function Transaction ()
    {
        $user = auth()->user();
        $transactions = Transaction::where('user_id', $user->id)->get();
        
        return view('client.transaction', compact(['transactions']));
    }
}
