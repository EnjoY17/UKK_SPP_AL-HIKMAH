@extends('layouts.app')



@section('content')

<div class="container">

    <div class="col-lg-5 margin-tb">

        <div class="pull-left">

            <h2>Add New Kelas</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('spps.index') }}"> Back</a>

        </div>

    </div>





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

<br>

<form action="{{ route('spps.store') }}" method="POST">

    @csrf



     <div class="row">

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Tahun:</strong>
                <input type="number" name="tahun" class="form-control" placeholder="tahun" required min="1">
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Nominal :</strong>
                <input type="number" name="nominal" class="form-control" placeholder="Nominal" required min="1">
            </div>
        </div>

        {{-- <div class="col-xs-5 col-sm-5 col-md-5">

            <div class="form-group">

                <strong>Detail:</strong>

                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>

            </div>

        </div> --}}

        <div class="col-xs-5 col-sm-5 col-md-5 ">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>



</form>
</div>
@endsection
