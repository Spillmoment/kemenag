@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-success font-weight-700">Daftar Pendaftar</h1>

@if(session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{ session('status') }}</strong>
</div>
@endif

<div class="row">


    <div class="col-lg-8 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Pendaftar</h6>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th> Nama Lembaga </th>
                        <th>{{ $user->name }} </th>
                    </tr>
                    <tr>
                        <th>Jenis Lembaga</th>
                        <th> {{ $user->lembaga->name }} </th>
                    </tr>
                    <tr>
                        <th>Status </th>
                        <th>{{ $user->status }} </th>
                    </tr>
                </thead>
            </table>
            <div>
                <form action="{{ route('pendaftar.confirm', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if($user->status != '1')
                    <button class="btn btn-success btn-block">
                        <i class="fas fa-check"></i>
                        Konfirmasi
                    </button>
                    @endif
                </form>
            </div>


        </div>

    </div>

    <div class="col-lg-4 order-lg-1">
        @if ($user->status == '1')
        @if ($user->surat_id == null)
        <form action="{{ route('surat.upload',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bukti" class="form-label">File</label>
                <input type="file" class="form-control-file" name="file" id="bukti" placeholder=""
                    aria-describedby="fileHelpId">
                <small id="fileHelpId" class="form-text text-muted {{ $errors->first('file') ? 
                    'is-invalid' : '' }}">Upload File Keterangan</small>
                <div class="invalid-feedback">
                    {{$errors->first('file')}}
                </div>
            </div>
            <div class="form-group">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="keterangan" name="keterangan" id="keterangan" placeholder="Masukkan keterangan"
                    required="required" class="form-control {{ $errors->first('keterangan') ? 'is-invalid' : '' }}"
                    value="{{ old('keterangan') }}">
                <div class="invalid-feedback">
                    {{$errors->first('keterangan')}}
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-block">Simpan</button>
        </form>
        @else
        <form action="{{ route('surat.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="bukti" class="form-label">File</label>
                <input type="file" class="form-control-file" name="file" id="bukti" placeholder=""
                    aria-describedby="fileHelpId">
                <small id="fileHelpId" class="form-text text-muted {{ $errors->first('file') ? 
                    'is-invalid' : '' }}">Upload File Keterangan</small>
                <div class="invalid-feedback">
                    {{$errors->first('file')}}
                </div>
            </div>
            <div class="form-group">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="keterangan" name="keterangan" id="keterangan" placeholder="Masukkan keterangan"
                    required="required" class="form-control {{ $errors->first('keterangan') ? 'is-invalid' : '' }}"
                    value="{{ old('keterangan') }}">
                <div class="invalid-feedback">
                    {{$errors->first('keterangan')}}
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-block">Update </button>
        </form>
        @endif
        @endif
    </div>

</div>

@endsection