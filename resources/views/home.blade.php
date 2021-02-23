@extends('layouts.admin')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }} {{ Auth::user()->name }}</h1>

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

    <div class="jumbotron text-success font-weight-700">
        <div class="container">
            <h1 class="display-4 text-capitalize">Selamat datang di website kemenag</h1>

            @if (Auth::user()->status != '1')
            <div class="alert alert-warning font-weight-700" role="alert">
                <div style="font-size: 15px">
                    <strong>Silahkan menunggu verifikasi berkas dari admin, jika sudah ter-verifikasi maka akan dikirim
                        berkas lanjutan</strong>
                </div>
            </div>
            @else
            <div class="alert alert-success font-weight-700" role="alert">
                <div style="font-size: 15px">
                    <strong>selamat berkas anda telah diverifikasi oleh admin, silahkan unduh <a
                            href="/storage/file/{{ Auth::user()->surat->file }}" target="_blank">disini</a></strong>
                </div>
            </div>
            @endif
            <hr class="my-2">
            <p class="lead">
                <a class="btn btn-success btn-lg" href="{{ route('profile') }}" role="button">Lihat Profil</a>
            </p>
        </div>
    </div>

</div>


@endsection