@extends('layouts.app')


@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Reorders</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Reorders</li>
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
                        @role('superAdmin|inventoryAdmin')
                        <th>Action</th>
                        @endrole
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
                                @role('superAdmin|inventoryAdmin')
                                <td>
                                    <a href="javascript:void(0)" data-toggle="modal"
                                        data-target="#update{{ $item->id }}" class="btn btn-sm btn-primary"><i
                                            class="fa fa-plus"></i> Update
                                        Stock</a>
                                </td>
                                @endrole

                                <div class="modal modal-fade" id="update{{ $item->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('reorders.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Update {{ $item->products->product_name }}
                                                        Stock</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Current Inventory Stock</label>
                                                                <input type="number" name="stock_quantity" id="current_inv"
                                                                    value="{{ $item->products->stock_quantity }}"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Added Inventory Stock</label>
                                                                <input type="number" name="stock_recharge_quantity"
                                                                    id="added_inventory" class="form-control"
                                                                    onkeyup="updateInventory()" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">New Inventory Stock</label>
                                                                <input type="number" name="new_stock_quantity" id="new_inv"
                                                                    readonly class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Current Store quantity</label>
                                                                <input type="number" name="store_quantity"
                                                                    id="current_store" value="{{ $item->current_stock }}"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Added Store quantity</label>
                                                                <input type="number" id="added_store"
                                                                    name="recharge_quantity" class="form-control"
                                                                    onkeyup="updateStore()" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">New Store quantity</label>
                                                                <input type="number" id="new_store" readonly
                                                                    name="new_store_quantity" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="#" data-dismiss="modal" class="btn btn-danger">Close</a>
                                                    <button type="submit" class="btn btn-success">Update</button>
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
    </div>
@endsection
