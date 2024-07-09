@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <h4 class="header-title"><b>List Transaction</b></h4>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Travel Package</th>
                                <th>Tourist number</th>
                                <th>Date start</th>
                                <th>Phone number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($transactions as $key => $transaction)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$transaction->User->name}}</td>
                                <td>{{$transaction->Travel_Package->name}}</td>
                                <td>{{$transaction->tourists_number}} People</td>
                                <td>{{$transaction->date_start}}</td>
                                <td>{{$transaction->phone_number}}</td>
                                <td>
                                    @if($transaction->status === 'cancel')
                                        <span class="text-danger">{{$transaction->status}}</span>
                                    @else
                                        <span class="text-success">{{$transaction->status}}</span> 
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin_transaction_confirm', $transaction->id)}}" class="btn btn-success">Confirm</a>
                                    <a href="{{route('admin_transaction_cancel', $transaction->id)}}" class="btn btn-danger">Cancel</a>
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
