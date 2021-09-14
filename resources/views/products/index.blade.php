@extends('layouts.app')


@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Products</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    @role('superAdmin|inventoryAdmin')
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i>
                        Add Product</a>
                    @endrole
                    @role('superAdmin|storeAdmin')
                    <a href="{{ route('sales.create') }}" class="btn add-btn"><i class="fa fa-plus"></i>
                        Add Sale</a>
                    @endrole
                </div>

            </div>
        </div>
        <!-- /Page Header -->
        <div class="card shadow">
            <div class="card-header">
                <h2 class="card-title">Products List</h2>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <p>{{ session('message') }}</p>
                    </div>
                @endif
                @if (session('danger'))
                    <div class="alert alert-danger">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <p>{{ session('danger') }}</p>
                    </div>
                @endif
                <table class="table table-sm table-hover">
                    <thead>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Inventory Quantity</th>
                        <th>Store Quantity</th>
                        <th>Inventory Alert Quantity</th>
                        <th>Store Alert Quantity</th>
                        @role('superAdmin|inventoryAdmin')
                        <th>Action</th>
                        @endrole
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td></td>
                                <td>{{ $product->product_name }}</td>
                                <td>Kes. {{ $product->price }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                                <td>{{ $product->store_quantity }}</td>
                                <td>{{ $product->stock_alert_quantity }}</td>
                                <td>{{ $product->store_alert_quantity }}</td>
                                <td>
                                    @role('superAdmin|inventoryAdmin')
                                    <a href="#" data-toggle="modal" data-target="#edit{{ $product->id }}"
                                        class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#delete{{ $product->id }}"
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                    @endrole
                                </td>
                                <div class="modal fade" id="edit{{ $product->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('products.update', $product->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Edit {{ $product->product_name }}</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Product Name</label>
                                                                <input type="text" name="product_name"
                                                                    class="form-control"
                                                                    value="{{ $product->product_name }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Product Price (Kes.)</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1">Kes.</span>
                                                                    </div>
                                                                    <input type="number" name="price" step="any"
                                                                        class="form-control"
                                                                        value="{{ $product->price }}" required>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="#" data-dismiss="modal" class="btn btn-danger">Close</a>
                                                    <button class="btn btn-success">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="delete{{ $product->id }}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-body text-center">
                                                    <p>Are you sure you want to delete
                                                        <b>{{ $product->product_name }}</b>
                                                    </p>
                                                    <a href="javascript:void(0)" data-dismiss="modal"
                                                        class="btn btn-success">Close</a>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="add">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h2 class="modal-title">Add Product</h2>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Product Name</label>
                                        <input type="text" name="product_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Product Price (Kes.)</label>
                                        <input type="number" name="price" steps="any" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Stock/Inventory Quantity</label>
                                        <input type="number" name="stock_quantity" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Store Quantity</label>
                                        <input type="number" name="store_quantity" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Stock Alert Quantity</label>
                                        <input type="number" name="stock_alert_quantity" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Store Alert Quantity</label>
                                        <input type="number" name="store_alert_quantity" class="form-control">
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
