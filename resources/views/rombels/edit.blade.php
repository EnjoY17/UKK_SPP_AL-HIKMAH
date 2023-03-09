@extends('layouts.app')



@section('content')

    <div class="container">

        <div class="col-lg-5 margin-tb">

            <div class="pull-left">

                <h2>Edit rombel</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('rombels.index') }}"> Back</a>

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



    <form action="{{ route('rombels.update',$rombel->id) }}" method="POST">

        @csrf

        @method('PUT')



         <div class="row">

            <div class="col-xs-5 col-sm-5 col-md-5">

                <div class="form-group">

                    <strong>Nama Kelas:</strong>

                    <input type="text" name="nama_kelas" value="{{ $rombel->nama_kelas }}" class="form-control" placeholder="Nama Kelas" required>

                </div>

            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">

                <div class="form-group">

                    <strong>kompetensi_keahlian:</strong>

                    <input type="text" name="kompetensi_keahlian" value="{{ $rombel->kompetensi_keahlian }}" class="form-control" placeholder="Kompetensi Keahlian" required>

                </div>

            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 ">

              <button type="submit"  class="btn btn-primary">Submit</button>

            </div>

        </div>



    </form>
</div>

@endsection
