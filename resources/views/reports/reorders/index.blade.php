@extends('layouts.app')


@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Reorders Report</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Reorders Report</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="card shadow">
            <div class="card-header">
                <h2 class="card-title">Reorders</h2>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <p>{{ session('message') }}</p>
                    </div>
                @endif
                <table class="table table-sm">
                    <thead>
                        <th>Product</th>
                        <th>Initial Store Quantity</th>
                        <th>Added Store Quantity</th>
                        <th>Total Current Store Quantity</th>
                        <th>Status</th>

                    </thead>
                    <tbody>
                        @foreach ($reorders as $item)
                            <tr>
                                <td>{{ $item->products->product_name }}</td>
                                <td>{{ $item->current_stock }}</td>
                                <td>{{ $item->recharge_quantity }}</td>
                                <td>{{ $item->recharge_quantity + $item->current_stock }}</td>
                                <td>
                                    <a
                                        class="btn-sm btn text-white btn-{{ $item->status == '0' ? 'danger' : 'success' }}">{{ $item->status == '0' ? 'Pending' : 'Processed' }}</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
