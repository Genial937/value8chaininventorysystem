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
                    <a href="{{ route('sales.index') }}" class="btn add-btn"><i class="fa fa-eye"></i>
                        View Sales</a>
                </div>
                @endrole
            </div>
        </div>
        <!-- /Page Header -->
        <div class="card shadow">
            <div class="card-header">
                <h2 class="card-title">Add Sales</h2>
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
                <form action="{{ route('sales.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Product</label>
                                <select name="product_id" id="products" class="form-control"
                                    onchange="getPrice(this.value)">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="spinner-border text-danger" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <span class="input-group-text" id="basic-addon1">Kes.</span>

                                    </div>
                                    <input type="number" name="price" step="any" id="price-input" class="form-control"
                                        placeholder="Price" readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="number" id="quantity" name="quantity" class="form-control"
                                    onkeyup="updateTotal()" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Total Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Kes.</span>
                                    </div>
                                    <input type="number" id="total" name="total_price" step="any" class="form-control"
                                        placeholder="Total price" readonly required>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <div class="form-group">
                                    <a href="{{ route('sales.index') }}" class="btn btn-danger">Cancel</a>
                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>

    </div>
    <style>
        .spinner-border {
            display: none;
        }

    </style>
@endsection
