@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Booking</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">{{$page_child ?? ''}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Home page</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-xl-3">
                <div class="card widget-box-three">
                    <div class="card-body">
                        <div class="float-right mt-2">
                            <i class="mdi mdi-account-convert display-3 m-0"></i>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-uppercase font-weight-medium text-truncate mb-2">User</p>
                            <h2 class="mb-0"><span data-plugin="counterup">{{$countUser}}</span></h2>
                            <p class="text-muted mt-2 m-0">
                                <span class="font-weight-medium">Last Updated:</span> 
                                {{$datetime_now->day}}/{{$datetime_now->month}}/{{$datetime_now->year}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-lg-6 col-xl-3">
                <div class="card widget-box-three">
                    <div class="card-body">
                        <div class="float-right mt-2">
                        <i class="mdi mdi-chart-areaspline display-3 m-0"></i>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-uppercase font-weight-medium text-truncate mb-2">Travel Package</p>
                            <h2 class="mb-0"><span data-plugin="counterup">{{$countTravelPackage}}</span></h2>
                            <p class="text-muted mt-2 m-0">
                                <span class="font-weight-medium">Last Updated:</span> 
                                {{$datetime_now->day}}/{{$datetime_now->month}}/{{$datetime_now->year}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-lg-6 col-xl-3">
                <div class="card widget-box-three">
                    <div class="card-body">
                        <div class="float-right mt-2">
                            <i class="mdi mdi-layers display-3 m-0"></i>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-uppercase font-weight-medium text-truncate mb-2">Transaction</p>
                            <h2 class="mb-0"><span data-plugin="counterup">{{$countTransaction}}</span></h2>
                            <p class="text-muted mt-2 m-0">
                                <span class="font-weight-medium">Last Updated:</span> 
                                {{$datetime_now->day}}/{{$datetime_now->month}}/{{$datetime_now->year}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-lg-6 col-xl-3">
                <div class="card widget-box-three">
                    <div class="card-body">
                        <div class="float-right mt-2">
                            <i class="mdi mdi-av-timer display-3 m-0"></i>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-uppercase font-weight-medium text-truncate mb-2">Post</p>
                            <h2 class="mb-0"><span data-plugin="counterup">{{$countPost}}</span></h2>
                            <p class="text-muted mt-2 m-0">
                                <span class="font-weight-medium">Last Updated:</span> 
                                {{$datetime_now->day}}/{{$datetime_now->month}}/{{$datetime_now->year}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="card-box">
                    <h4 class="header-title mb-4">Recent Users</h4>

                    <div class="table-responsive">
                        <table class="table table-hover table-centered m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Verify</th>
                                    <th>Create at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentUser as $user)
                                <tr>
                                    <th>
                                        <img src="{{asset('img/user/avatar-default.png')}}" alt="user" class="avatar-sm rounded-circle" />
                                    </th>
                                    <td>
                                        <h5 class="m-0 font-15">{{$user->name}}</h5>
                                        <p class="m-0 text-muted"><small>{{$user->Role->name}}</small></p>
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->email_verified_at)
                                            <span class="text-success">Verified</span>
                                        @else
                                            <span class="text-danger">Not verify</span>
                                        @endif
                                    </td>
                                    <td>{{$user->created_at->day}}/{{$user->created_at->month}}/{{$user->created_at->year}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-xl-6">
                <div class="card-box">
                    <h4 class="header-title mb-4">Recent Transactions</h4>

                    <div class="table-responsive">
                        <table class="table table-hover table-centered m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Phone</th>
                                    <th>Travel Package</th>
                                    <th>Date Start</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentTransaction as $key => $transaction)
                                <tr>
                                    <th>
                                        <span class="avatar-sm-box bg-success">{{$key + 1}}</span>
                                    </th>
                                    <td>
                                        <h5 class="m-0 font-15">{{$transaction->User->name}}</h5>
                                        <p class="m-0 text-muted"><small>{{$transaction->User->email}}</small></p>
                                    </td>
                                    <td>{{$transaction->phone_number}}</td>
                                    <td>{{$transaction->Travel_Package->name}}</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d', $transaction->date_start)->format('d/m/Y')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>
@endsection
