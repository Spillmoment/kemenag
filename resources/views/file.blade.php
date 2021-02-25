@extends('layouts.admin')


@section('title','File User')
@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-success font-weight-700">File Lembaga {{ auth()->user()->name }}</h1>

@if(session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{ session('status') }}</strong>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">

    <div class="col-lg-4 order-lg-2">

        <div class="card shadow mb-4">
            <div class="card-profile-image mt-4">
                <figure class="rounded-circle avatar avatar font-weight-bold bg-success"
                    style="font-size: 60px; height: 180px; width: 180px;" data-initial="{{ Auth::user()->name[0] }}">
                </figure>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h5 class="font-weight-bold">{{ Auth::user()->name }}</h5>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

    <div class="col-lg-8 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Account {{ auth()->user()->name }}</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('files.update') }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card mb-2">
                        <div
                            class="card-header {{ $cek_file_user->susunan_pengurus != null ? 'bg-success text-white' : 'bg-warning text-dark' }}">
                            <strong>Susunan Pengurus
                                {{ $cek_file_user->susunan_pengurus != null ? '(File tersimpan)' : '(File masih kosong)' }}</strong>

                        </div>
                        <div class="card-body">
                            @if ($cek_file_user->susunan_pengurus != null)
                            <h6><strong>File Anda: <a
                                        href="/storage/susunanPengurus/{{ Auth::user()->susunan_pengurus }}"
                                        class="text-dark"
                                        target="_blank">{{ $cek_file_user->susunan_pengurus }}</a></strong>
                            </h6>
                            @endif
                            <div class="form-group focused">
                                <input type="file" id="susunan_pengurus" class="form-control-file"
                                    name="susunan_pengurus">
                                <small>Kosongkan jika tidak mengubah file pdf</small>

                            </div>
                        </div>
                    </div>


                    <div class="card mb-2">
                        <div
                            class="card-header {{ $cek_file_user->jadwal_kegiatan != null ? 'bg-success text-white' : 'bg-warning text-dark' }}">
                            <strong>Jadwal Kegiatan
                                {{ $cek_file_user->jadwal_kegiatan != null ? '(File tersimpan)' : '(File masih kosong)' }}</strong>
                        </div>
                        <div class="card-body">
                            @if ($cek_file_user->jadwal_kegiatan != null)
                            <h6><strong>File Anda: <a href="/storage/jadwalKegiatan/{{ Auth::user()->jadwal_kegiatan }}"
                                        class="text-dark"
                                        target="_blank">{{ $cek_file_user->jadwal_kegiatan }}</a></strong>
                            </h6>
                            @endif
                            <div class="form-group focused">
                                <input type="file" id="jadwal_kegiatan" class="form-control-file" name="jadwal_kegiatan"
                                    value="{{ $cek_file_user->jadwal_kegiatan }}">
                                <small>Kosongkan jika tidak mengubah file pdf</small>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-2">
                        <div
                            class="card-header {{ $cek_file_user->foto_kegiatan != null ? 'bg-success text-white' : 'bg-warning text-dark' }}">
                            <strong> Foto Kegiatan
                                {{ $cek_file_user->foto_kegiatan != null ? '(File tersimpan)' : '(File masih kosong)' }}</strong>
                        </div>
                        <div class="card-body">
                            @if ($cek_file_user->foto_kegiatan != null)
                            <h6><strong>File Anda: <a href="/storage/fotoKegiatan/{{ Auth::user()->foto_kegiatan }}"
                                        class="text-dark"
                                        target="_blank">{{ $cek_file_user->foto_kegiatan }}</a></strong>
                            </h6>
                            @endif
                            <div class="form-group focused">
                                <input type="file" id="foto_kegiatan" class="form-control-file" name="foto_kegiatan"
                                    value="{{ $cek_file_user->foto_kegiatan }}">
                                <small>Kosongkan jika tidak mengubah file pdf</small>

                            </div>
                        </div>
                    </div>


                    <div class="pl-lg-4">
                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col float-left">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>

@endsection