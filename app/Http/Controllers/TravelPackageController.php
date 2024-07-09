<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Str;
use App\Http\Requests\StoreTravelPackageRequest;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travelPackages = TravelPackage::orderBy('id', 'ASC')->get();
        return view('admin.travel_package.index', compact(['travelPackages']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->can('create', TravelPackage::class))
        {
            return view('admin.travel_package.create');
        }
        else
        {
            return redirect()->back()->with('error', 'You do not have the right create travel package');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTravelPackageRequest $request)
    {
        $travelPackage = new TravelPackage;
        $travelPackage->fill($request->all());

        //Save thumbnail
        $get_image = $request->thumbnail;

        if($get_image)
        {
            $path = 'img/travel_package/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.Str::random(10).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $travelPackage->thumbnail = $new_image;
        }

        $travelPackage->save();
        return redirect('/admin/travel_package')->with('status', 'Create Travel Package successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(TravelPackage $travelPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $travelPackage = TravelPackage::findOrFail($id);
        if(auth()->user()->can('update')){
            return view('admin.travel_package.edit', compact(['travelPackage']));
        }
        else{
            return redirect()->back()->with('error', "You do not have the right to edit travel package");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TravelPackage $travelPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $travelPackage = TravelPackage::findOrFail($id);
        if(auth()->user()->can('update')){

            $path_unlink = 'img/travel_package/'.$travelPackage->thumbnail;

            if(file_exists($path_unlink) && $path_unlink !== 'img/travel_package/')
            {
                unlink($path_unlink);
            }

            $travelPackage->delete();

            return redirect('/admin/travel_package')->with('status', "Delete successfully");
        }
        else{
            return redirect()->back()->with('error', "You do not have the right to delete travel package");
        }
    }
}
