@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Spp</h2>

        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('spps.create') }}"> Create</a>
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
    <th>Tahun</th>
    <th>Nominal</th>
    <th width="280px">Action</th>
</tr>
</thead>
<tbody>
    @foreach ($spps as $a)
<tr>
    <td>{{ $a->tahun }}</td>
    <td>{{ $a->nominal }}</td>
    <td>
        <form action="{{ route('spps.destroy',$a->id) }}" method="POST">
            {{-- <a class="btn btn-info" href="{{ route('spps.show',$a->id) }}">Show</a> --}}
            <a class="btn btn-primary" href="{{ route('spps.edit',$a->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin anda ingin menghapus?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>

</table>
</div>

<script>
    $(document).ready(function() {
       $('#example').DataTable();
   } );
</script>
@endsection


