@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Welcome {{ auth()->user()->first_name }}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
            @role('superAdmin|inventoryAdmin')
            @if (count($stock_alert))
                @foreach ($stock_alert as $item)
                    <div class="alert alert-danger">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <p>{{ $item->product_name }} is below alert quantity!</p>
                    </div>
                @endforeach
            @endif
            @endrole
            @role('superAdmin|inventoryAdmin|storeAdmin')
            @if (count($store_alert))
                @foreach ($store_alert as $item)
                    <div class="alert alert-danger">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <p>{{ $item->product_name }} is below alert quantity!</p>
                    </div>
                @endforeach
            @endif
            @endrole
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $products }}</h3>
                        <span>Products</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $sales }}</h3>
                        <span>Sales</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                    <div class="dash-widget-info">
                        <h3 style="font-size: 1.2em">Kes. {{ $revenue }}</h3>
                        <span>Total Revenue</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $users }}</h3>
                        <span>Users</span>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="card-title">Recent Sales</h3>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </thead>
                        <tbody>
                            @php($count = 1)
                            @foreach ($saless as $sale)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $sale->products->product_name }}</td>
                                <td>Kes. {{ $sale->price }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td>Kes. {{ $sale->total_price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @role('superAdmin')
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </thead>
                        <tbody>
                          @php($count = 1)
                           @foreach ($user_list as $user)
                           <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                        </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endrole
    </div>







</div>
<!-- /Page Content -->

@endsection
