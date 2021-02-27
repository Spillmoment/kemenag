@extends('layouts.admin')

@section('title','Detail User')
@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-success font-weight-700">Detail Lembaga {{ $user->name }} </h1>

@if(session('status'))
@push('scripts')
<script>
    swal({
        title: "Success",
        text: "{{session('status')}}",
        icon: "success",
        button: false,
        timer: 3000
    });

</script>
@endpush
@endif

<div class="row">


    <div class="col-lg-8 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Table {{ $user->name }}</h6>
            </div>

            <table class="table table-hover table-striped">
                <thead>

                    <tr>
                        <th>Jenis Lembaga</th>
                        <th>
                            @if ($user->lembaga_id != null)
                            {{ $user->lembaga->name }}
                            @else
                            <span class="text-danger"> Lembaga belum diisi</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th> Nama Lembaga </th>
                        <th>{{ $user->name }} </th>
                    </tr>

                    <tr>
                        <th> Tanggal Pendaftar </th>
                        <th>{{ $user->created_at->format('d F Y') }} </th>
                    </tr>


                    <tr>
                        <th> Email </th>
                        <th>{{ $user->email }} </th>
                    </tr>

                    <tr>
                        <th>Alamat</th>
                        <th>
                            @if ($user->alamat != null)
                            {{ $user->alamat }}
                            @else
                            <span class="text-danger">Alamat Belum diisi</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Nomor Telepon</th>
                        <th>
                            @if ($user->no_telp != null)
                            {{ $user->no_telp }}
                            @else
                            <span class="text-danger">No Telp Belum diisi</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Nama Pimpinan</th>
                        <th>
                            @if ($user->nama_pimpinan != null)
                            {{ $user->nama_pimpinan }}
                            @else
                            <span class="text-danger">Nama Pimpinan Belum diisi</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Tahun Berdiri</th>
                        <th>
                            @if ($user->tahun_berdiri != null)
                            {{ $user->tahun_berdiri }}
                            @else
                            <span class="text-danger">Tahun Berdiri Belum diisi</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Susunan Pengurus</th>
                        <th>
                            @if ($user->susunan_pengurus != null)
                            <a href="/storage/susunanPengurus/{{ $user->susunan_pengurus }}" target="_blank">
                                {{ $user->susunan_pengurus }} </a>
                            @else
                            <span class="alert alert-warning font-weight-bold">File Belum diupload</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Nama Pendiri</th>
                        <th>
                            @if ($user->nama_pendiri != null)
                            {{ $user->nama_pendiri }}
                            @else
                            <span class="text-danger">Nama Pendiri Belum diisi</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Jumlah Guru</th>
                        <th>
                            @if ($user->jumlah_guru != null)
                            {{ $user->jumlah_guru }}
                            @else
                            <span class="text-danger">Jumlah Guru Belum diisi</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Jumlah Santri</th>
                        <th>
                            @if ($user->jumlah_santri != null)
                            {{ $user->jumlah_santri }}
                            @else
                            <span class="text-danger">Jumlah Santri Belum diisi</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Jadwal Kegiatan</th>
                        <th>
                            @if ($user->jadwal_kegiatan != null)
                            <a href="/storage/jadwalKegiatan/{{ $user->jadwal_kegiatan }}" target="_blank">
                                {{ $user->jadwal_kegiatan }} </a>
                            @else
                            <span class="alert alert-warning font-weight-bold">File Belum diupload</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Foto Kegiatan</th>
                        <th>
                            @if ($user->foto_kegiatan != null)
                            <a href="/storage/fotoKegiatan/{{ $user->foto_kegiatan }}" target="_blank">
                                {{ $user->foto_kegiatan }} </a>
                            @else
                            <span class="alert alert-warning font-weight-bold">File Belum diupload</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Surat Keterangan</th>
                        <th>
                            @if ($user->surat_id != null)
                            <a href="/storage/file/{{ $user->surat->file }}"> {{ $user->surat->file }} </a>
                            @else
                            <span class="alert alert-warning font-weight-bold">File Belum diupload</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Link Facebook</th>
                        <th>
                            @if ($user->link_fb != null)
                            <a href="{{ $user->link_fb }}" target="_blank"> {{ $user->link_fb }} </a>
                            @else
                            <span class="text-danger">Link Facebook belum diisi</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Link Website</th>
                        <th>
                            @if ($user->link_website != null)
                            <a href="{{ $user->link_website }}" target="_blank"> {{ $user->link_website }} </a>
                            @else
                            <span class="text-danger">Link Website belum diisi</span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Link Google Maps</th>
                        <th>
                            @if ($user->link_gmap != null)
                            <a href="{{ $user->link_gmap }}" target="_blank"> {{ $user->link_gmap }} </a>
                            @else
                            <span class="text-danger">Link Google Maps belum diisi</span>
                            @endif
                        </th>
                    </tr>


                    <tr>
                        <th>Status </th>
                        <th>
                            @if($user->status == 1)
                            <span class="btn btn-success btn-sm">
                                <h6 class="py-1">Sudah Dikonfirmasi</h6>
                            </span>
                            @else
                            <span class="btn btn-danger btn-sm">
                                <h6 class="py-1"> Belum Dikonfirmasi</h6>
                            </span>
                            @endif
                        </th>
                    </tr>
                </thead>
            </table>
            <div>
                <form action="{{ route('pendaftar.confirm', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if($user->status != '1')
                    <button class="btn btn-success btn-block" id="check" data-name="{{ $user->name }}">
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
        <h5 class="text-success my-2">Upload Surat Keterangan</h5>
        <hr>
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
        <h5 class="text-success my-2">Update Surat Keterangan</h5>
        <hr>
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
@push('scripts')
<script>
    $('button#check').on('click', function (e) {
        var name = $(this).data('name');
        e.preventDefault();
        swal({
                title: "Yakin!",
                text: "Konfirmasi Lembaga " + name + "?",
                icon: "warning",
                dangerMode: true,
                buttons: {
                    cancel: "Cancel",
                    confirm: "OK",
                },
            })
            .then((willDelete) => {
                if (willDelete) {
                    $(this).closest("form").submit();
                }
            });
    });
</script>
@endpush