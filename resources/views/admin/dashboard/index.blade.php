@extends('layouts.admin')


@section('title','Dashboard Admin')
@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-success">{{ __('Dashboard Admin') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendaftar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['users'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
                <div class="mt-3 font-weight-900 text-primary"> <a href="{{ route('pendaftar.baru') }}">
                        Selengkapnya </a><i class=" fas fa-arrow-right"></i>
                </div>
            </div>

        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">TPA/TPQ</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['tpa'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
                <div class="mt-3 font-weight-900 text-success"> <a href="{{ route('pendaftar.tpa') }}"
                        class="text-success">
                        Selengkapnya </a><i class=" fas fa-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Madin</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $widget['madin'] }}</div>
                            </div>

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
                <div class="mt-3 font-weight-900 text-warning"> <a href="{{ route('pendaftar.madin') }}"
                        class="text-warning">
                        Selengkapnya </a><i class=" fas fa-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Majelis Taklim</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $widget['majlis'] }}</div>
                            </div>

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
                <div class="mt-3 font-weight-900 text-info"> <a href="{{ route('pendaftar.majlis') }}"
                        class="text-info">
                        Selengkapnya </a><i class=" fas fa-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection