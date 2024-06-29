@extends('layouts.admin') @section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <h4 class="header-title"><b>List User</b></h4>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Avatar</th>
                                <th>Role</th>
                                <th>Verify</th>
                                <th>Created at</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->avatar)
                                        <img src="" alt="avatar" width="50px" height="50px">
                                    @else
                                        <img src="{{asset('img/user/avatar-default.png')}}" alt="avatar" width="35px" height="35px">
                                    @endif
                                </td>
                                <td>{{$user->Role->name}}</td>
                                <td>
                                    @if($user->email_verified_at) 
                                        <span class="text-success">Verified</span> 
                                    @else 
                                        <span class="text-danger">Not Verify</span> 
                                    @endif
                                </td>
                                <td>{{$user->created_at}}</td>
                            </tr>    
                            @endforeach                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
