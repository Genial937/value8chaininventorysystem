@extends('layouts.app')


@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Documentation</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Documentation</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="card shadow">
            <div class="card-header">
                <h2 class="card-title">
                    Value Chain Inventory System Documentation
                </h2>
            </div>
            <div class="card-body">
                <h3 class="card-title">How it works (Brief Description)</h3>
                <p>Value Chain Factory Inventory System keeps tracks of products in an inventory. Products are added to the
                    database. And for each sale the product count takes effect and update products quantity based on the
                    quantity of sales. Once the quantity of products in a store goes below the alert level, a notification
                    is send triggering a reorder. Once the product has been refilled the status of reorder changes from
                    pending to processed</p>
                    <br>
                    <h3 class="card-title">Level of System Users</h3>
                    <h4>1. Super Admin</h4>
                    <ul>
                        <li>Has access to all pages,, he is the supreme user</li>
                        <li>Creates roles</li>
                        <li>Assigns roles to users while adding them</li>
                        <li>Can do all other processes</li>
                    </ul>
                    <h4>2. Inventory Admin</h4>
                    <ul>
                        <li>Add, Edit or delete products</li>
                        <li>Can see sales but cant add sale</li>
                        <li>Processes the preorders by updating stock quantities</li>
                    </ul>
                    <h4>3. Store Admin</h4>
                    <ul>
                        <li>Creates Sales</li>
                        <li>Can see products but cant add, edit or delete</li>
                        <li>Sees the preorders page with its contents but can't do any action</li>
                    </ul>
                    <br>
                     <h3 class="card-title">Technologies Used</h3>
                     <ul>
                        <li>HTML and CSS (Bootstrap 4)</li>
                        <li>Javascript</li>
                        <li>PHP Laravel Framework</li>
                        <li>Axios, Node Js Library for sending Ajax requests</li>
                        <li>Spatie Package for handling roles and permissions</li>
                        <li>MySQL Database</li>
                    </ul>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="card-title">User Logins</h3>
                    </div>
                    <div class="col-md-4">
                        <h5>Super Admin</h5>
                        <p>Email: johndoe@gmail.com <br>
                        Password: Password</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Inventory Admin</h5>
                        <p>Email: emily@gmail.com<br>
                        Password: Password</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Store Admin</h5>
                        <p>Email: odenyothadeus@gmail.com <br>
                        Password: Password</p>
                    </div>
                </div>
                <hr>
                <p>&copy;Thadeus Odenyo</p>
            </div>
        </div>
    </div>
@endsection
