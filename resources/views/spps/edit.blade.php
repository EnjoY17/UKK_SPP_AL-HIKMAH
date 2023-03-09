@extends('layouts.app')



@section('content')

    <div class="container">

        <div class="col-lg-5 margin-tb">

            <div class="pull-left">

                <h2>Edit spp</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('spps.index') }}"> Back</a>

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



    <form action="{{ route('spps.update',$spp->id) }}" method="POST">

        @csrf

        @method('PUT')



         <div class="row">

            <div class="col-xs-5 col-sm-5 col-md-5">

                <div class="form-group">

                    <strong>Tahun:</strong>

                    <input type="number" name="tahun" value="{{ $spp->tahun }}" class="form-control" placeholder="Tahun" required min="1">

                </div>

            </div>
{{--
            <div class="col-xs-5 col-sm-5 col-md-5">

                <div class="form-group">

                    <strong>Detail:</strong>

                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $spp->detail }}</textarea>

                </div>

            </div> --}}
            <div class="col-xs-5 col-sm-5 col-md-5">

                <div class="form-group">

                    <strong>Nominal:</strong>

                    <input type="number" name="nominal" value="{{ $spp->nominal }}" class="form-control" placeholder="Nominal" required min="1">

                </div>

            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 ">

              <button type="submit"  class="btn btn-primary">Submit</button>

            </div>

        </div>



    </form>
</div>

@endsection
