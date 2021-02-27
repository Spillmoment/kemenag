<!DOCTYPE html>
<html>

<head>
    <title>Formulir Pendaftar {{ $user->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }
    </style>
    <center>
        <h5>Formulir Pendaftaran Lembaga {{ $user->name }}</h4>
        </h5>
    </center>

    <table class="table table-hover table-bordered table-striped" id="simpananTable">
        <thead>

            <tr>
                <th>Jenis Lembaga</th>
                <th>
                    @if ($user->lembaga_id != null)
                    {{ $user->lembaga->name }}
                    @else
                    <span style="color: red"> Lembaga belum diisi</span>
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
                    <span style="color: red">Alamat Belum diisi</span>
                    @endif
                </th>
            </tr>

            <tr>
                <th>Nomor Telepon</th>
                <th>
                    @if ($user->no_telp != null)
                    {{ $user->no_telp }}
                    @else
                    <span style="color: red">No Telp Belum diisi</span>
                    @endif
                </th>
            </tr>

            <tr>
                <th>Nama Pimpinan</th>
                <th>
                    @if ($user->nama_pimpinan != null)
                    {{ $user->nama_pimpinan }}
                    @else
                    <span style="color: red">Nama Pimpinan Belum diisi</span>
                    @endif
                </th>
            </tr>

            <tr>
                <th>Tahun Berdiri</th>
                <th>
                    @php
                    $data = date('d F Y', strtotime($user->tahun_berdiri));
                    @endphp
                    @if ($user->tahun_berdiri != null)
                    {{ $data }}
                    @else
                    <span style="color: red">Tahun Berdiri Belum diisi</span>
                    @endif
                </th>
            </tr>

            <tr>
                <th>Nama Pendiri</th>
                <th>
                    @if ($user->nama_pendiri != null)
                    {{ $user->nama_pendiri }}
                    @else
                    <span style="color: red">Nama Pendiri Belum diisi</span>
                    @endif
                </th>
            </tr>

            <tr>
                <th>Jumlah Guru</th>
                <th>
                    @if ($user->jumlah_guru != null)
                    {{ $user->jumlah_guru }}
                    @else
                    <span style="color: red">Jumlah Guru Belum diisi</span>
                    @endif
                </th>
            </tr>

            <tr>
                <th>Jumlah Santri</th>
                <th>
                    @if ($user->jumlah_santri != null)
                    {{ $user->jumlah_santri }}
                    @else
                    <span style="color: red">Jumlah Santri Belum diisi</span>
                    @endif
                </th>
            </tr>

            <tr>
                <th>Link Facebook</th>
                <th>
                    @if ($user->link_fb != null)
                    <a href="{{ $user->link_fb }}" target="_blank"> {{ $user->link_fb }} </a>
                    @else
                    <span style="color: red">Link Facebook belum diisi</span>
                    @endif
                </th>
            </tr>

            <tr>
                <th>Link Website</th>
                <th>
                    @if ($user->link_website != null)
                    <a href="{{ $user->link_website }}" target="_blank"> {{ $user->link_website }} </a>
                    @else
                    <span style="color: red">Link Website belum diisi</span>
                    @endif
                </th>
            </tr>

            <tr>
                <th>Link Google Maps</th>
                <th>
                    @if ($user->link_gmap != null)
                    <a href="{{ $user->link_gmap }}" target="_blank"> {{ $user->link_gmap }} </a>
                    @else
                    <span style="color: red">Link Google Maps belum diisi</span>
                    @endif
                </th>
            </tr>


            <tr>
                <th>Status </th>
                <th>
                    @if($user->status == 1)
                    <span style="color: lime;">
                        <h6>Sudah Dikonfirmasi</h6>
                    </span>
                    @else
                    <span style="color: red">
                        <h6> Belum Dikonfirmasi</h6>
                    </span>
                    @endif
                </th>
            </tr>
        </thead>

    </table>

</body>

</html>