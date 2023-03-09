@extends('layouts.app')



@section('content')

<div class="container">

    <div class="col-lg-5 margin-tb">

        <div class="pull-left">

            <h2 class="display-4">Add New Siswa</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('siswas.index') }}"> Back</a>

        </div>

    </div>


<br>


@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif



<form action="{{ route('siswas.store') }}" method="POST">

    @csrf



     <div class="row">

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Nisn:</strong>
                <input type="number" name="nisn" class="form-control" placeholder="nisn" required min="1">
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Nis:</strong>
                <input type="number" name="nis" class="form-control" placeholder="Nis" required min="1">
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>id_kelas:</strong>
                {{-- <input type="text" name="id_kelas" class="form-control" placeholder="id_kelas"> --}}
                <select class="form-control" name="id_kelas" id="">
                    <option value="">-- select --</option>
                    @foreach ($rombels as $a)
                    <option value="{{$a->id}}">{{$a->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Alamat:</strong>
                <textarea class="form-control" style="height:150px" type="text" name="alamat" placeholder="Alamat" required></textarea>
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>No Telp:</strong>
                <input type="number" name="no_telp" class="form-control" placeholder="08xxxx" min="0">
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>ID Spp:</strong>
                <select class="form-control" name="id_spp" id="">
                    <option value="">-- select --</option>
                    @foreach ($spps as $a)
                        <option value="{{$a->id}}">{{$a->tahun}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-xs-5 col-sm-5 col-md-5 ">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>



</form>
</div>
@endsection
