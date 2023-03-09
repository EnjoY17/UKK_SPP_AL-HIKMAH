@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Kelas</h2>

        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('rombels.create') }}"> Create</a>
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
    <th>nama_kelas</th>
    <th>kompetensi_keahlian</th>
    <th width="200px">Action</th>
</tr>
</thead>
<tbody>
@foreach ($rombel as $a)

<tr>
    <td>{{ $a->nama_kelas }}</td>
    <td>{{ $a->kompetensi_keahlian }}</td>
    <td>
        <form action="{{ route('rombels.destroy',$a->id) }}" method="POST">
            {{-- <a class="btn btn-info" href="{{ route('rombels.show',$a->id) }}">Show</a> --}}
            <a class="btn btn-primary" href="{{ route('rombels.edit',$a->id) }}">Edit</a>
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


