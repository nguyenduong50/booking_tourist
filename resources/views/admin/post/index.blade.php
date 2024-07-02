@extends('layouts.admin') @section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <h4 class="header-title"><b>List Post</b></h4>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Feature</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($posts as $key => $post)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->User->name}}</td>
                                <td>
                                    @if($post->featured)
                                        <span class="text-success">Featured</span>
                                    @else
                                        Not feature
                                    @endif
                                </td>
                                <td>{{$post->updated_at}}</td>
                                <td>
                                    <a class="btn btn-info btn-sm text-white" href="javascript:void()">View</a>
                                    <a class="btn btn-success btn-sm text-white" href="{{route('admin_post.edit', $post->id)}}">Edit</a>
                                    <a 
                                        class="btn btn-danger btn-sm text-white"
                                        data-toggle="modal"
                                        data-target=".{{'bs-modal-'.$post->id}}"
                                        href="javascript:void()"
                                    >
                                        Delete
                                    </a>
                                    <div class="modal fade {{'bs-modal-'.$post->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content pb-3">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Delete Post</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body d-flex flex-column">
                                                    <span>Are you delete this Post?</span>
                                                    <span>Title: {{$post->title}}</span>
                                                </div>
                                                <div class="d-flex justify-content-end px-3">
                                                    <button class="btn btn-secondary btn-sm" type="button" class="close" data-dismiss="modal" aria-label="Close">Cancel</button>
                                                    <button 
                                                        class="btn btn-danger btn-sm" 
                                                        style="margin-left: 5px"
                                                        type="button"
                                                        onclick="document.getElementById('{{'form-delete-'.$post->id}}').submit()"
                                                    >
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{route('admin_post.destroy', $post->id)}}" method="POST" id="{{'form-delete-'.$post->id}}" class="d-none">
                                        @method('DELETE')
                                        @csrf
                                    </form>
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
@endsection
