@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <h4 class="header-title"><b>List Travel Package</b></h4>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Rate</th>
                                <th>Orginal price</th>
                                <th>Current price</th>
                                <th>Day</th>
                                <th>Night</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($travelPackages as $key => $travelPackage)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$travelPackage->name}}</td>
                                <td>{{$travelPackage->rate}}</td>
                                <td>{{number_format($travelPackage->original_price, 0, ',' , '.')}}</td>
                                <td>{{number_format($travelPackage->current_price, 0, ',' , '.')}}</td>
                                <td>{{$travelPackage->day}}</td>
                                <td>{{$travelPackage->night}}</td>
                                <td>
                                    <a class="btn btn-info btn-sm text-white" href="javascript:void()">View</a>
                                    <a class="btn btn-success btn-sm text-white" href="{{route('admin_travel_package.edit', $travelPackage->id)}}">Edit</a>
                                    <a 
                                        class="btn btn-danger btn-sm text-white"
                                        data-toggle="modal"
                                        data-target=".{{'bs-modal-'.$travelPackage->id}}"
                                        href="javascript:void()"
                                    >
                                        Delete
                                    </a>
                                    <div class="modal fade {{'bs-modal-'.$travelPackage->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content pb-3">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Delete Travel Package</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body d-flex flex-column">
                                                    <span>Are you delete this Travel Package?</span>
                                                    <span>Name: {{$travelPackage->name}}</span>
                                                </div>
                                                <div class="d-flex justify-content-end px-3">
                                                    <button class="btn btn-secondary btn-sm" type="button" class="close" data-dismiss="modal" aria-label="Close">Cancel</button>
                                                    <button 
                                                        class="btn btn-danger btn-sm" 
                                                        style="margin-left: 5px"
                                                        type="button"
                                                        onclick="document.getElementById('{{'form-delete-'.$travelPackage->id}}').submit()"
                                                    >
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{route('admin_travel_package.destroy', $travelPackage->id)}}" method="POST" id="{{'form-delete-'.$travelPackage->id}}" class="d-none">
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
