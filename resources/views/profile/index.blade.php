@extends('layouts.app')


@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img alt="" src="{{ asset('img/profiles/avatar-02.jpg') }}"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h3>

                                            <small class="text-muted">Phone: {{ auth()->user()->phone }}</small>
                                            <div class="staff-id">Email : {{ auth()->user()->email }}</div>
                                            <div class="small doj text-muted">Last login : {{ date('M d, Y, H:i:s', strtotime(auth()->user()->last_login)) }}</div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal"
                                    class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
