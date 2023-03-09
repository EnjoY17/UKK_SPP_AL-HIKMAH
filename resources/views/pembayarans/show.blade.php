@extends('layouts.nav')



@section('content')


<div style="text-align: center">
    <h1>SMK WIKRAMA 1 GARUT</h1>
    <i>  Jalan Otto Iskandardinata kampung tanjung RT 003/RW 013, Pasawahan,</i>
    <p> <i> Kec. Tarogong Kaler, Kabupaten Garut, Jawa Barat 44151</i> </p>
</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center">{{ __('Bukti Pembayaran Spp') }}</div>

                    <div  onclick="print()" class="card-body">
                        @foreach ($viewBayar as $a)
                        <div class="row">
                            <div class="col">
                                <div class="col-md-8">
                                    <strong>NIS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong>
                                    {{$a->nis}}
                                </div>
                                <div class="col-md-8">
                                    <strong>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
                                    {{$a->nama}}
                                </div>
                                <div class="col-md-8">
                                    <strong>Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
                                    {{$a->nama_kelas}}
                                </div>
                                <div class="col-md-8">
                                    <strong>Bulan Bayar &nbsp;&nbsp;&nbsp;&nbsp;:</strong>
                                    {{$a->bulan_dibayar}}
                                </div>
                                <div class="col-md-8">
                                    <strong>Tahun Bayar &nbsp;&nbsp;&nbsp;:</strong>
                                    {{$a->tahun_dibayar}}
                                </div>
                                <div class="col-md-8">
                                    <strong>Nominal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong>
                                    {{$a->nominal}}
                                </div>
                                <div class="col-md-8">
                                    <strong>Tanggal Bayar :</strong>
                                    {{$a->tgl_bayar}}
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-md-8">
                                    <strong>ID Petugas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
                                    {{$a->id_petugas}}
                                </div>
                                <div class="col-md-8">
                                    <strong>Nama Petugas &nbsp;&nbsp; :</strong>
                                    {{$a->name}}
                                </div>

                            </div>
                          </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
<script>
    function.print(){
        window.print();
    }
</script>
