@extends('layouts.admin')

@section('title','Detail User')
@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-success font-weight-700">Detail Pendaftar {{ $user->name }} </h1>

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


    <div class="col-lg-9 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Detail {{ $user->name }}</h6>
            </div>

            <table class="table table-hover table-striped">
                <thead>

                    <tr>
                        <th>Jenis Lembaga</th>
                        <th> {{ $user->lembaga->name ? $user->lembaga->name : 'belum diisi' }} </th>
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
                        <th>{{ $user->alamat ? $user->alamat : 'alamat belum diisi' }}</th>
                    </tr>

                    <tr>
                        <th>Nomor Telepon</th>
                        <th>{{ $user->no_telp ? $user->no_telp : 'no_telp belum diisi' }}</th>
                    </tr>

                    <tr>
                        <th>Nama Pimpinan</th>
                        <th>{{ $user->nama_pimpinan ? $user->nama_pimpinan : 'Nama Pimpinan belum diisi' }}</th>
                    </tr>

                    <tr>
                        <th>Tahun Berdiri</th>
                        <th>{{ $user->tahun_berdiri ? $user->tahun_berdiri : 'Tahun Berdiri belum diisi' }}
                        </th>
                    </tr>

                    <tr>
                        <th>Susunan Pengurus</th>
                        <th>
                            @if ($user->susunan_pengurus != null)
                            <a href="/storage/susunanPengurus/{{ $user->susunan_pengurus }}" target="_blank">
                                {{ $user->susunan_pengurus }} </a>
                            @else
                            Susunan Pengurus belum diupload
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Nama Pendiri</th>
                        <th>{{ $user->nama_pendiri ? $user->nama_pendiri : 'Nama Pendiri belum diisi' }}</th>
                    </tr>

                    <tr>
                        <th>Jumlah Guru</th>
                        <th>{{ $user->jumlah_guru ? $user->jumlah_guru : 'Jumlah Guru belum diisi' }}</th>
                    </tr>

                    <tr>
                        <th>Jumlah Siswa</th>
                        <th>{{ $user->jumlah_siswa ? $user->jumlah_siswa : 'Jumlah Siswa belum diisi' }}</th>
                    </tr>

                    <tr>
                        <th>Jadwal Kegiatan</th>
                        <th>
                            @if ($user->jadwal_kegiatan != null)
                            <a href="/storage/jadwalKegiatan/{{ $user->jadwal_kegiatan }}" target="_blank">
                                {{ $user->jadwal_kegiatan }} </a>
                            @else
                            Jadwal Kegiatan belum diupload
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
                            Jadwal Kegiatan belum diupload
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Surat Keterangan</th>
                        <th>
                            @if ($user->surat_id != null)
                            <a href="/storage/file/{{ $user->surat->file }}"> {{ $user->surat->file }} </a>
                            @else
                            Surat keterangan belum diupload
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Link Facebook</th>
                        <th>
                            @if ($user->link_fb != null)
                            <a href="{{ $user->link_fb }}" target="_blank"> {{ $user->link_fb }} </a>
                            @else
                            Link Facebook belum diisi
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Link Website</th>
                        <th>
                            @if ($user->link_website != null)
                            <a href="{{ $user->link_website }}" target="_blank"> {{ $user->link_website }} </a>
                            @else
                            Link Website belum diisi
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>Link Google Maps</th>
                        <th>
                            @if ($user->link_gmap != null)
                            <a href="{{ $user->link_gmap }}" target="_blank"> {{ $user->link_gmap }} </a>
                            @else
                            Link Google Maps belum diisi
                            @endif
                        </th>
                    </tr>


                    <tr>
                        <th>Status </th>
                        <th>
                            @if($user->status == 1)
                            <span class="badge badge-success">
                                Sudah Dikonfirmasi
                            </span>
                            @else
                            <span class="badge badge-danger">
                                Belum Dikonfirmasi
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

    <div class="col-lg-3 order-lg-1">
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
                text: "Konfirmasi Pendaftar  " + name + "?",
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