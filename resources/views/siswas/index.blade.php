@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>siswa</h2>

            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('siswas.create') }}"> Create</a>
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
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>ID Kelas</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>ID Spp</th>
                    <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $a)
                    <tr>
                        <td>{{ $a->nisn }}</td>
                        <td>{{ $a->nis }}</td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->id_kelas }}</td>
                        <td>{{ $a->alamat }}</td>
                        <td>{{ $a->no_telp }}</td>
                        <td>{{ $a->id_spp }}</td>
                        <td>
                            <form action="{{ route('siswas.destroy', $a->id) }}" method="POST">
                                {{-- <a class="btn btn-info" href="{{ route('siswas.show',$a->id) }}">Show</a> --}}
                                <a class="btn btn-primary" href="{{ route('siswas.edit', $a->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin anda ingin menghapus?')">Delete</button>
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
        });
    </script>
@endsection
