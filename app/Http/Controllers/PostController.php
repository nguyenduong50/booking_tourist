<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->get();
        return view('admin.post.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->can('create', Post::class)){
            return view('admin.post.create');
        }
        else{
            return redirect()->back()->with('error', "You do not have the right to create posts");
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->fill($request->all());
        $post->user_id = auth()->user()->id;

        //Save thumbnail
        $get_image = $request->thumbnail;

        if($get_image)
        {
            $path = 'img/post/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.Str::random(10).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $post->thumbnail = $new_image;
        }

        $post->save();
        return redirect('/admin/post')->with('status', 'Create post successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if(auth()->user()->can('update', $post)){
            return view('admin.post.edit', compact(['post']));
        }
        else{
            return redirect()->back()->with('error', "You do not have the right to edit other people's posts");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->all());

        //Update new Thumbnail 
        $get_image = $request->thumbnail;

        if($get_image)
        {
            //Delete old Image
            $path_unlink = 'img/post/'.$post->thumbnail;

            if(file_exists($path_unlink) && $path_unlink !== 'img/post/')
            {
                unlink($path_unlink);
            }
                
            //Add Image
            $path = 'img/post/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image . '-' . Str::random(10).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $post->thumbnail = $new_image;
        }

        //Authorize
        if(auth()->user()->can('update', $post)){
            $post->save();
            return redirect('/admin/post')->with('status', 'Update post succesfully');
        }
        else{
            return redirect('admin')->with('error', "You do not have the right to edit other people's posts");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if(auth()->user()->can('forceDelete', $post)){
            //Delete post thumbnail
            $path_unlink = 'img/post/'.$post->thumbnail;
    
            if(file_exists($path_unlink) && $path_unlink !== 'img/post/')
            {
                unlink($path_unlink);
            }
    
            $post->delete();
    
            return redirect('/admin/post')->with('status', 'Delete post successfully');
        }
        else{
            return redirect()->back()->with('error', "You do not have the right to delete other people's posts");
        }
    }
}
