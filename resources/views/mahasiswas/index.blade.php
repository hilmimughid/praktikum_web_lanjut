@extends('mahasiswas.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
        <form action="{{ route('mahasiswas.index') }}" method="GET">
            <div class="float-left my-2 input-group" style="width:300px">
                @csrf
                <input type="search" class="form-control mr-sm-2" name="search" value="{{ request('search') }}"
                    placeholder="Nama" aria-label="Example text with button addon"
                    aria-describedby="button-addon1">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Search</button>
            </div>
        </form>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('mahasiswas.create') }}"> Input Mahasiswa</a>
        </div>
    </div>
</div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($mahasiswa as $Mahasiswa)
        <tr>
            <td>{{ $Mahasiswa->nim }}</td>
            <td>{{ $Mahasiswa->nama }}</td>
            <td><img width="100px" src="{{asset('storage/'.$Mahasiswa->image)}}"></td>
            <td>{{ $Mahasiswa->kelas->nama_kelas }}</td>
            <td>{{ $Mahasiswa->jurusan }}</td>
            <td>
                <form action="{{ route('mahasiswas.destroy', $Mahasiswa->nim) }}" method="POST" style="width: 300px">
                    <a class="btn btn-info" href="{{ route('mahasiswas.show', $Mahasiswa->nim) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('mahasiswas.edit', $Mahasiswa->nim) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a class="btn btn-warning" href="{{ route('mahasiswas.nilai', $Mahasiswa->nim) }}">Nilai</a>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
@endsection
