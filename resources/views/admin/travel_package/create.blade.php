@extends('layouts.admin') @section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <h4 class="header-title pb-2 border-bottom"><b>Create Travel Package</b></h4>

                    <form action="{{route('admin_travel_package.store')}}" method="POST" class="form-horizontal mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="row">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" id="" name="name">
                                </div>
                                <div class="row mt-3">
                                    <label for="">Rate</label>
                                    <input type="number" class="form-control" min="1" max="5" step="1" name="rate">
                                </div>
                                <div class="row mt-3">
                                    <label for="">Origin price</label>
                                    <input type="number" class="form-control" min="1000000" step="50000" name="original_price">
                                </div>
                                <div class="row mt-3">
                                    <label for="">Current price</label>
                                    <input type="number" class="form-control" min="1000000" step="50000" name="current_price">
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
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="">Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Ngam san ho">
                            </div>
                            <div class="col-md-3">
                                <label for="">Day</label>
                                <input type="number" min="1" max="5" class="form-control" name="day">
                            </div>
                            <div class="col-md-3">
                                <label for="">Night</label>
                                <input type="number" min="1" max="5" class="form-control" name="night">
                            </div>
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
