@extends('layouts.app')



@section('content')

    <div class="container">

        <div class="col-lg-5 margin-tb">

            <div class="pull-left">

                <h2>Edit petuga</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('petugas.index') }}"> Back</a>

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



    <form action="{{ route('petugas.update',$petuga->id) }}" method="POST">

        @csrf

        @method('PUT')



         <div class="row">

            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>username:</strong>
                    <input type="text" name="username" value="{{ $petuga->username }}" class="form-control" placeholder="Name"  required>
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>password:</strong>
                    <input type="text" name="password" value="{{ $petuga->password }}" class="form-control" placeholder="Name"  required>
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>nama_petugas:</strong>
                    <input type="text" name="nama_petugas" value="{{ $petuga->nama_petugas }}" class="form-control" placeholder="Name"  required>
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Level:</strong>
                    <input type="text" name="level" value="{{ $petuga->level }}" disabled class="form-control" placeholder="Name"  required>
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 ">

              <button type="submit"  class="btn btn-primary">Submit</button>

            </div>

        </div>



    </form>
</div>

@endsection
