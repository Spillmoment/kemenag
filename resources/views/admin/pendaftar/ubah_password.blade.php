@extends('layouts.admin')

@section('title','Form Ubah Password User')
@section('main-content')

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

    <div class="col-md-12">

        <div class="card shadow mb-4">

            <div class="col-md-6 offset-md-3 py-5">
                <span class="anchor" id="formChangePassword"></span>

                <!-- form card change password -->
                <div class="card card-outline-secondary">
                    <div class="card-header bg-success text-light">
                        <h3 class="mb-0">Ubah Password {{ $user->name }}</h3>
                    </div>
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('user.password.update', $user->id) }}"
                            autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="password_baru">Password Baru</label>
                                <input type="password" class="form-control" id="password_baru" name="password"
                                    required="">
                                <span class="form-text small text-muted">
                                    Kata sandi harus terdiri dari 8-20 karakter, dan <em> tidak </em> mengandung spasi.
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="password_konfirmasi">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="konfirmasi_password"
                                    name="password_konfirmasi" required="">
                                <span class="form-text small text-muted">
                                    Untuk mengonfirmasi, ketikkan kembali kata sandi baru.
                                </span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg float-right">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /form card change password -->
            </div>

        </div>

    </div>

</div>

@endsection