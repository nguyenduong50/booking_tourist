<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Str;
use Carbon\Carbon;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Jobs\SendMailCreateUserJob;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->get();
        return view('admin.user.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('id', 'ASC')->get();
        return view('admin.user.create', compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->remember_token = Str::random(20);

        //Add new Image 
        $get_image = $request->avatar;

        if($get_image)
        {
            //Delete old Image
            $path_unlink = 'img/user/'.$user->avatar;
            
            if(file_exists($path_unlink) && $path_unlink !== 'img/user/')
            {
                unlink($path_unlink);
            }
                
            //Add Image
            $path = 'img/user/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.Str::random(10).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $user->avatar = $new_image;
        }

        $user->save();

        // Send mail
        SendMailCreateUserJob::dispatch($user->id);

        return redirect('/admin/user')->with('status', 'Create new user successfully');
    }

    public function verify()
    {
        $status = 'Kich hoat thanh cong';

        if(!isset($_GET['token']) || !isset($_GET['email'])){  
            $status = 'Link kích hoạt không đúng';
            return view('admin.user.verify', compact(['status']));      
        }

        $user = User::where('email', $_GET['email'])->first();
        // $now = Carbon::now();
        // $token_expiry_at = Carbon::create($user->token_created_at)->addMinute(5);

        if(!$user){
            $status = 'Người dùng không tồn tại';  
            return view('admin.user.verify', compact(['status']));       
        }

        if($user->email_verified_at){
            $status = 'Tài khoản đã kích hoạt'; 
            return view('admin.user.verify', compact(['status']));        
        }

        if($user->remember_token !== $_GET['token']){
            $status = 'Mã kích hoạt không đúng';    
            return view('admin.user.verify', compact(['status']));     
        }

        $user->remember_token = null;
        $user->email_verified_at = Carbon::now();
        $user->save();

        return view('admin.user.verify', compact(['status']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('id', 'ASC')->get();
        return view('admin.user.edit', compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->except('password'));

        //Confirm password
        if($request->password && $request->password !== $request->password_confirmation)
        {
            return redirect()->back()->with('error', 'Confirm passwords do not match');
        }

        //Hash password
        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }

        //Update new Image 
        $get_image = $request->avatar;

        if($get_image)
        {
            //Delete old Image
            $path_unlink = 'img/user/'.$user->avatar;

            if(file_exists($path_unlink) && $path_unlink !== 'img/user/')
            {
                unlink($path_unlink);
            }
             
            //Add Image
            $path = 'img/user/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image . '-' . Str::random(10).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $user->avatar = $new_image;
        }

        $user->save();

        return redirect('/admin/user')->with('status', 'Update user successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        //Delete avatar
        $path_unlink = 'img/user/'.$user->avatar;

        if(file_exists($path_unlink) && $path_unlink !== 'img/user/')
        {
            unlink($path_unlink);
        }

        $user->delete();
        return redirect('/admin/user')->with('status', 'Delete User successfully');
    }
}
