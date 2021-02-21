@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-success font-weight-700">Profile Lembaga {{ auth()->user()->nama_lembaga }}</h1>

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
                <figure class="rounded-circle avatar avatar font-weight-bold" style="font-size: 60px; height: 180px; width: 180px;" data-initial="{{ Auth::user()->nama_lembaga[0] }}"></figure>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h5 class="font-weight-bold">{{ Auth::user()->nama_lembaga }}</h5>
                            <p>Administrator</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card-profile-stats">
                            <span class="heading">22</span>
                            <span class="description">Friends</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-profile-stats">
                            <span class="heading">10</span>
                            <span class="description">Photos</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-profile-stats">
                            <span class="heading">89</span>
                            <span class="description">Comments</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-8 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Account {{ auth()->user()->nama_lembaga }}</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('profile.update') }}" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="_method" value="PUT">

                    <div class="pl-lg-4">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Nama Lembaga<span class="small text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" name="nama_lembaga" placeholder="Nama Lembaga" value="{{ old('nama_lembaga', Auth::user()->nama_lembaga) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="no_telp">No Telepon<span class="small text-danger">*</span></label>
                                    <input type="number" id="no_telp" class="form-control" name="no_telp" placeholder="No Telepon" value="{{ old('no_telp', Auth::user()->no_telp) }}">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Alamat Email<span class="small text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="example@example.com" value="{{ old('email', Auth::user()->email) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="nama_pimpinan">Nama Pimpinan<span class="small text-danger">*</span></label>
                                    <input type="text" id="nama_pimpinan" class="form-control" name="nama_pimpinan" placeholder="Nama Pimpinan" value="{{ old('nama_pimpinan', Auth::user()->nama_pimpinan) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="tahun_berdiri">Tahun Berdiri<span class="small text-danger">*</span></label>
                                    <input type="date" id="tahun_berdiri" class="form-control" name="tahun_berdiri" value="{{ old('tahun_berdiri', Auth::user()->tahun_berdiri) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="susunan_pengurus">Susunan Pengurus<span class="small text-danger">*</span></label>
                                    <input type="file" id="susunan_pengurus" class="form-control-file" name="susunan_pengurus">
                                    <small>Kosongkan jika tidak mengubah file pdf</small>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="nama_pendiri">Nama Pendiri<span class="small text-danger">*</span></label>
                                    <input type="text" id="nama_pendiri" class="form-control" name="nama_pendiri" placeholder="example@example.com" value="{{ old('nama_pendiri', Auth::user()->nama_pendiri) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="jadwal_kegiatan">Jadwal Kegiatan<span class="small text-danger">*</span></label>
                                    <input type="file" id="jadwal_kegiatan" class="form-control-file" name="jadwal_kegiatan">
                                    <small>Kosongkan jika tidak mengubah file pdf</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="jumlah_guru">Jumlah Guru<span class="small text-danger">*</span></label>
                                    <input type="number" id="jumlah_guru" class="form-control" name="jumlah_guru" placeholder="example@example.com" value="{{ old('jumlah_guru', Auth::user()->jumlah_guru) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="jumlah_santri">Jumlah Santri<span class="small text-danger">*</span></label>
                                    <input type="number" id="jumlah_santri" class="form-control" name="jumlah_santri" placeholder="example@example.com" value="{{ old('jumlah_santri', Auth::user()->jumlah_santri) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="tempat_kbm">Tempat KBM<span class="small text-danger">*</span></label>
                                    <input type="text" id="tempat_kbm" class="form-control" name="tempat_kbm" placeholder="example@example.com" value="{{ old('tempat_kbm', Auth::user()->tempat_kbm) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="foto_kegiatan">Foto Kegiatan<span class="small text-danger">*</span></label>
                                    <input type="file" id="foto_kegiatan" class="form-control-file" name="foto_kegiatan">
                                    <small>Kosongkan jika tidak mengubah file pdf</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="link_fb">Link Facebook<span class="small text-danger">*</span></label>
                                    <input type="text" id="link_fb" class="form-control" name="link_fb" placeholder="Link Facebook" value="{{ old('link_fb', Auth::user()->link_fb) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="link_website">Link Website<span class="small text-danger">*</span></label>
                                    <input type="text" id="link_website" class="form-control" name="link_website" placeholder="Link Website" value="{{ old('link_website', Auth::user()->link_website) }}">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="alamat">Alamat Lembaga<span class="small text-danger">*</span></label>
                                    <!-- <input type="text" id="alamat" class="form-control" name="alamat" placeholder="example@example.com" value="{{ old('alamat', Auth::user()->alamat) }}"> -->
                                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10">{{ Auth::user()->alamat }}</textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="current_password">Current password</label>
                                    <input type="password" id="current_password" class="form-control" name="current_password" placeholder="Current password">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="new_password">New password</label>
                                    <input type="password" id="new_password" class="form-control" name="new_password" placeholder="New password">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="confirm_password">Confirm password</label>
                                    <input type="password" id="confirm_password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                                </div>
                            </div>
                        </div>
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