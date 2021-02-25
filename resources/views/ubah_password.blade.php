@extends('layouts.admin')

@section('main-content')

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

    <div class="col-md-12">

        <div class="card shadow mb-4">
                
              <div class="col-md-6 offset-md-3 py-5">
                <span class="anchor" id="formChangePassword"></span>

                <!-- form card change password -->
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Ubah Password</h3>
                    </div>
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('changepassword.update') }}" autocomplete="off">
                          @csrf
                          @method('PUT')  
                          <div class="form-group">
                                <label for="password_sekarang">Password Saat Ini</label>
                                <input type="password" class="form-control" id="password_sekarang" name="password_sekarang" class="password_sekarang" required="">
                            </div>
                            <div class="form-group">
                                <label for="password_baru">Password Baru</label>
                                <input type="password" class="form-control" id="password_baru" name="password_baru"  required="">
                                <span class="form-text small text-muted">
                                        The password must be 8-20 characters, and must <em>not</em> contain spaces.
                                    </span>
                            </div>
                            <div class="form-group">
                                <label for="password_konfirmasi">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_konfirmasi" name="password_konfirmasi" required="">
                                <span class="form-text small text-muted">
                                        To confirm, type the new password again.
                                    </span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
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