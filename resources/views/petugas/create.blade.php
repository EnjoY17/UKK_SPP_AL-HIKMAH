@extends('layouts.app')



@section('content')

    <div class="container">

        <div class="col-lg-5 margin-tb">

            <div class="pull-left">

                <h2 class="display-4">Add New Petugas</h2>

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



        <form action="{{ route('petugas.store') }}" method="POST">

            @csrf



            <div class="row">

                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                        <strong>name:</strong>
                        <input type="text" name="name" class="form-control" autocomplete="off" placeholder="name"
                            required>
                    </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                        <strong>email:</strong>
                        <input type="email" name="email" class="form-control" autocomplete="off" placeholder="email"
                            required>
                    </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" autocomplete="off" class="form-control"
                            placeholder="password" required>
                    </div>
                </div>


                <div class="col-xs-5 col-sm-5 col-md-5 ">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </div>



        </form>
    </div>
@endsection
