@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="display-4">Aktivitas Pembayaran</h2>


            </div>
        </div>
        <br>
        <div class="card-body">
        <table id="example" class="table table-bordered table-striped border-dark">
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
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf'
            ]
            });
        });
    </script>
@endsection
