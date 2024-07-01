@extends('layouts.admin') @section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <h4 class="header-title"><b>List User</b></h4>

                    <!-- Alert Status -->
                    @if (session('status'))
                        <div class="alert bg-success alert-status"width="20%" role="alert">
                            <h5>{{ session('status') }}</h5>
                        </div>
                    @endif

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Avatar</th>
                                <th>Role</th>
                                <th>Verify</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $key => $user)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->avatar)
                                        <img src="{{asset('img/user/'.$user->avatar)}}" alt="avatar" width="35px" height="35px">
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
                                <td>
                                    <a class="btn btn-info btn-sm text-white" href="javascript:void()">View</a>
                                    <a class="btn btn-success btn-sm text-white" href="{{route('admin_user.edit', $user->id)}}">Edit</a>
                                    <a 
                                        class="btn btn-danger btn-sm text-white"
                                        data-toggle="modal"
                                        data-target=".bs-example-modal-sm"
                                        href="javascript:void()"
                                    >
                                        Delete
                                    </a>
                                </td>
                            </tr>    
                            @endforeach                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content pb-3">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Small modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column">
                <span>Are you delete this User?</span>
                <span>Name: {{$user->name}}</span>
                <span>Name: {{$user->email}}</span>
            </div>
            <div class="d-flex justify-content-end px-3">
                <button class="btn btn-secondary btn-sm" type="button" class="close" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button 
                    class="btn btn-danger btn-sm" 
                    style="margin-left: 5px"
                    onclick="submitDeleteUser()"
                >
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<form action="{{route('admin_user.destroy', $user->id)}}" method="POST" id="form-delete-user">
    @method('DELETE')
    @csrf
</form>

<script>
    const submitDeleteUser = () => {
        const formDeleteUser = document.getElementById('form-delete-user');
        formDeleteUser.submit();
    }
</script>
@endsection
