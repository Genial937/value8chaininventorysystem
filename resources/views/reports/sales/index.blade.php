@extends('layouts.app')


@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Sales Report</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sales Report</li>
                    </ul>
                </div>
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
    </div>
@endsection
