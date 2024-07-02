@extends('layouts.admin') @section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <h4 class="header-title pb-2 border-bottom"><b>Create Post</b></h4>

                    <form action="{{route('admin_post.store')}}" method="POST" class="form-horizontal mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="row">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" id="" name="title" placeholder="Title">
                                </div>
                                <div class="row mt-3">
                                    <label for="">Author</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
                                </div>
                                <div class="row mt-3">
                                    <label for="">Feature</label>
                                    <select name="featured" class="selectpicker" data-style="btn-primary">
                                        <option value="1">Feature</option>
                                        <option value="0" selected>No Feature</option>
                                    </select>
                                </div>
                                <div class="row mt-3">
                                    <label for="">Destination</label>
                                    <input type="text" class="form-control" id="" name="destination">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{asset('img/post/thumbnail-default.png')}}" id="image-thumbnail" width="90%" height="400px" />
                                    <input type="file" name="thumbnail" class="form-control d-none" id="input-thumbnail" />
                                    <label id="label-thumbnail" class="btn btn-info waves-effect width-md waves-light mt-2" for="input-thumbnail">Upload</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 d-flex flex-column">
                            <label for="">Content</label>
                            <textarea class="form-control" name="content" id="content-post"></textarea> 
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <a 
                                class="btn btn-secondary waves-effect width-md waves-light" 
                                href="{{route('admin_post.index')}}"
                                style="margin-right: 5px" 
                            >
                                Cancel
                            </a>
                            <button class="btn btn-primary waves-effect width-md waves-light" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Process Image -->
<script>
    let inputThumbnail = document.getElementById("input-thumbnail");
    let imageThumbnail = document.getElementById("image-thumbnail");

    inputThumbnail.addEventListener('change', function(){
        imageThumbnail.src = window.URL.createObjectURL(inputThumbnail.files[0]);
    })
</script>
@endsection
