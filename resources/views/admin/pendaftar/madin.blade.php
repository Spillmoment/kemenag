@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-success font-weight-700">Daftar Pendaftar Madin</h1>

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


    <div class="col-lg-8 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Pendaftar</h6>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Jenis Lembaga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{$user->name}}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->lembaga->name }}</td>

                        <td>
                            <a href="{{ route('pendaftar.detail', $user->id) }}" class="btn btn-success"> <i
                                    class="fas fa-eye    "></i> Detail</a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>


        </div>

    </div>

</div>

@endsection