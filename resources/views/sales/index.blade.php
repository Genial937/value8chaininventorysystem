@extends('layouts.app')


@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Sales</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sales</li>
                    </ul>
                </div>
                @role('superAdmin|storeAdmin')
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('sales.create') }}" class="btn add-btn"><i
                            class="fa fa-plus"></i> Add Sales</a>
                </div>
                @endrole
            </div>
        </div>
        <!-- /Page Header -->
        <div class="card shadow">
            <div class="card-header">
                <h2 class="card-title">Sales List</h2>
            </div>
            <div class="card-body">
                <table class="table table-sm table-hover">
                    <thead>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </thead>
                    <tbody>
                        @php($count = 1)
                        @foreach ($sales as $sale)
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
        <div class="modal fade" id="add">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form action="">
                        <div class="modal-header">
                            <h2 class="modal-title">Add Product</h2>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                               <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control">
                                </div>
                               </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Product Price (Kes.)</label>
                                        <input type="number" steps="any" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Stock/Inventory Quantity</label>
                                        <input type="number" steps="any" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Store Quantity</label>
                                        <input type="number" steps="any" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Stock Alert Quantity</label>
                                        <input type="number" steps="any" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Store Alert Quantity</label>
                                        <input type="number" steps="any" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn btn-danger">Close</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
