@extends('layouts.admin')


@section('title','Pendaftar Majelis')
@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-success font-weight-700">Daftar Pendaftar Majelis Taklim</h1>

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

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Table Majelis Taklim</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pendaftar</th>
                        <th>Nama Lembaga</th>
                        <th>Email</th>
                        <th>Lembaga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>



                    @foreach ($users as $regis)
                    <tr>
                        <td scope="row"> {{$loop->iteration}} </td>
                        <td>{{ $regis->created_at->format('d F Y') }}</td>
                        <td>{{ $regis->name }}</td>
                        <td>{{ $regis->email }}</td>
                        <td>{{ $regis->lembaga->name }}</td>
                        <td>
                            @if($regis->status == 1)
                            <span class="badge badge-success">
                                Sudah Dikonfirmasi
                            </span>
                            @else
                            <span class="badge badge-danger">
                                Belum Dikonfirmasi
                            </span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info text-white btn-sm" href="{{route('pendaftar.detail',
                           [$regis->id])}}"> <i class="fa fa-eye"></i></a>

                            <form class="d-inline" action="{{route('pendaftar.destroy', [$regis->id])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" id="deleteButton" data-name="{{ $regis->name }}"
                                    class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    $('button#deleteButton').on('click', function (e) {
        var name = $(this).data('name');
        e.preventDefault();
        swal({
                title: "Yakin!",
                text: "menghapus Pendaftar  " + name + "?",
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