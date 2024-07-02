@extends('layouts.admin') @section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <h4 class="header-title pb-2 border-bottom"><b>Edit User</b></h4>

                    <form action="{{route('admin_user.update', $user->id)}}" method="POST" class="form-horizontal mt-4" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name" autocomplete="off" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" name="email" autocomplete="off" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Role</label>
                                    <div class="col-md-2">
                                        <select class="selectpicker show-tick" data-style="btn-success" name="role_id">
                                            @foreach($roles as $role)
                                                @if($user->role_id === $role->id)
                                                    <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                @else
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    @if($user->avatar)
                                        <img src="{{asset('img/user/'.$user->avatar)}}" id="image-avatar" width="200px" height="200px" />
                                    @else
                                        <img src="{{asset('img/user/avatar-default.png')}}" id="image-avatar" width="200px" height="200px" />
                                    @endif

                                    <input type="file" name="avatar" class="form-control d-none" id="input-avatar" />
                                    <label id="label-avatar" class="btn btn-info waves-effect width-md waves-light mt-2" for="input-avatar">Upload</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-12 control-label">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-12 control-label">Password confirmation</label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary waves-effect width-md waves-light" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Process Image -->
<script>
    let inputAvatar = document.getElementById("input-avatar");
    let imageAvatar = document.getElementById("image-avatar");

    inputAvatar.addEventListener('change', function(){
        imageAvatar.src = window.URL.createObjectURL(inputAvatar.files[0]);
    })
</script>
@endsection
