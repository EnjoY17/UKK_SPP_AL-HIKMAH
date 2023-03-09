@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pembayaran</h2>

            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pembayarans.create') }}"> Create</a>
            </div>
        </div>
        <br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table id="example" class="table table-bordered table-striped border-dark">
            <thead>
                <tr>
                    <th>ID Petugas</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Bayar</th>
                    <th>Tahun Bayar</th>
                    <th>ID SPP</th>
                    <th>Jumlah Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayarans as $a)
                    <tr>
                        <td>{{ $a->id_petugas }}</td>
                        <td>{{ $a->nisn }}</td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->tgl_bayar }}</td>
                        <td>{{ $a->bulan_dibayar }}</td>
                        <td>{{ $a->tahun_dibayar }}</td>
                        <td>{{ $a->id_spp }}</td>
                        <td>{{ $a->jumlah_bayar }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
