@extends('mahasiswas.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <form action="{{ route('mahasiswas.index') }}" method="GET">
                <div class="float-left my-2 input-group w-50" style="width:300px">
                    @csrf
                    <input type="search" class="form-control mr-sm-2" name="src" value="{{ request('src') }}"
                        placeholder="Pencarian Berdasarkan Nama" aria-label="Example text with button addon"
                        aria-describedby="button-addon1">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Cari</button>
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
                <th>Nim</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>No. Handphone</th>
                <th>E-mail</th>
                <th>Tanggal Lahir</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($mahasiswas as $Mahasiswa)
                <tr>
                    <td>{{ $Mahasiswa->nim }}</td>
                    <td>{{ $Mahasiswa->nama }}</td>
                    <td>{{ $Mahasiswa->kelas }}</td>
                    <td>{{ $Mahasiswa->jurusan }}</td>
                    <td>{{ $Mahasiswa->no_handphone }}</td>
                    <td>{{ $Mahasiswa->email }}</td>
                    <td>{{ $Mahasiswa->tanggal_lahir }}</td>
                    <td>
                        <form action="{{ route('mahasiswas.destroy', $Mahasiswa->nim) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('mahasiswas.show', $Mahasiswa->nim) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('mahasiswas.edit', $Mahasiswa->nim) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $mahasiswas->links() }}
@endsection
