@extends('layouts.app')


@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Permissions</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Permissions</li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_asset"><i class="fa fa-plus"></i> Add Permission</a>
        </div>
    </div>
</div>
<!-- /Page Header -->
</div>
@endsection
