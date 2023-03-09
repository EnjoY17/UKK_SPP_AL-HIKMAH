@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Aktivitas Pembayaran</h2>


            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('history.export_excel') }}">Excel</a>
            </div>
        </div>
        <br>
        <table id="example" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Petugas</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Nama Kelas</th>
                    <th>Bulan Bayar</th>
                    <th>Tahun Bayar</th>
                    <th>Nominal</th>
                    <th>Tanggal Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $a)
                    <tr>
                        <td>{{ $a->name }}</td>
                        <td>{{ $a->nisn }}</td>
                        <td>{{ $a->nis }}</td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->id_kelas }}</td>
                        <td>{{ $a->bulan_dibayar }}</td>
                        <td>{{ $a->tahun_dibayar }}</td>
                        <td>{{ $a->nominal }}</td>
                        <td>{{ $a->tgl_bayar }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
