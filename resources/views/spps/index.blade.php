@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1 class="display-4">SPP</h1>

        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('spps.create') }}"><i class="bi bi-plus-square"></i> Tambah SPP</a>
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
    <th width="200px">Action</th>
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
            <a class="btn btn-warning" href="{{ route('spps.edit',$a->id) }}"><i class="bi bi-pencil-square"></i>EDIT</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin anda ingin menghapus?')"><i class="bi bi-trash3">DELETE</i>
            </button>
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


