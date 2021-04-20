@extends('layout.pendaftaran')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-block">
                <div class="card-img">
                    <img src="/storage/{{ $workshop['gambar'] }}">
                </div>
                <div class="card-header">
                    <h1 class="m-0">{{ $workshop['name'] }}</h1>
                    <h4 class="text-success">Rp {{ $workshop['harga'] }},-</h4>
                </div>
                <div class="jumbotron jumbotron-hr">
                    {{ $workshop['deskripsi'] }}
                </div>
                <div class="card-body">
                    <h5 class="text-center" style="font-weight: bolder;">Daftar</h5>
                    <form method="POST" action="/daftar">

                        @csrf
                        <input value={{ $workshop['id'] }} type="hidden" name="workshop">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" id="nama" type="text" name="nama">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input class="form-control" id="alamat" type="text" name="alamat">
                        </div>

                        <div class="form-group">
                            <label for="kota">Kota</label>
                            <input class="form-control" id="kota" type="text" name="kota">
                        </div>

                        <div class="form-group">
                            <label for="nama">Telp</label>
                            <input class="form-control" id="nama" type="text" name="telepon">
                        </div>

                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control" name="catatan"></textarea>
                        </div>
                        

                        <button type="submit" class="btn btn-success btn-block">
                            DAFTAR
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection