@extends('mahasiswas.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Mahasiswa
                </div>
                <div class="card-body">
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
                    <form method="post" action="{{ route('mahasiswas.store') }}" id="myForm">
                        @csrf
                        <div class="form-group">
                            <label for="nim">Nim</label>
                            <input type="text" name="nim" class="form-control" id="nim" aria-describedby="Nim">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" aria-describedby="Nama">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" class="form-control" id="kelas" aria-describedby="password">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" id="jurusan" aria-describedby="Jurusan">
                        </div>
                        <div class="form-group">
                            <label for="no_handphone">No_Handphone</label>
                            <input type="text" name="no_handphone" class="form-control" id="no_handphone" aria-describedby="No_Handphone">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <br>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="E-mail">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <br>
                            <input type="date" name="tanggal_lahir" class="formcontrol" id="tanggal_lahir" aria-describedby="Tanggal_lahir">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
