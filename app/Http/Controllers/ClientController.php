<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\TravelPackage;

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
}
