@extends('layouts.app')



@section('content')

    <div class="container">

        <div class="col-lg-5 margin-tb">

            <div class="pull-left">

                <h2>Edit siswa</h2>

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



    <form action="{{ route('siswas.update',$siswa->id) }}" method="POST">

        @csrf

        @method('PUT')



         <div class="row">

            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Nisn:</strong>
                    <input type="number" name="nisn" value="{{ $siswa->nisn }}" class="form-control" placeholder="Name" required min="1">
                </div>
            </div>

            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Nis:</strong>
                    <input type="number" name="nis" value="{{ $siswa->nis }}" class="form-control" placeholder="Name" required min="1">
                </div>
            </div>

            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control" placeholder="Name" required>
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>ID Kelas:</strong>
                    <select class="form-control" name="id_kelas" id="">
                        @foreach ($rombels as $a)
                        <option value="{{$a->id}}">{{$a->nama_kelas}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Alamat:</strong>
                    <textarea class="form-control" style="height:150px" name="alamat" placeholder="alamat" required>{{ $siswa->alamat }}</textarea>
                </div>
            </div>

            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>No Telp:</strong>
                    <input type="number" name="no_telp" value="{{ $siswa->no_telp }}" class="form-control" placeholder="No Telp">
                </div>
            </div>

            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>id_spp:</strong>
                    <select class="form-control" name="id_spp" id="">
                        @foreach ($spps as $a)
                        <option value="{{$a->id}}">{{$a->tahun}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-5 col-sm-5 col-md-5 ">

              <button type="submit"  class="btn btn-primary">Submit</button>

            </div>

        </div>



    </form>
</div>

@endsection
