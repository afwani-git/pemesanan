@extends('layout.pendaftaran')

@section('content')
    <h1 class="text-center mt-4">
            Pilih Workshop
    </h1>
    <div class="row">
        @foreach ($workshops as $workshop )
        <div class="col-md-3">
            <div class="card mt-3">
                <div class="card-img">
                    <img src="/storage/{{ $workshop['gambar'] }}">
                </div>
                <div class="card-header">
                    <h3 style="margin: 0!important">{{ $workshop['name'] }}</h3>
                    <sub class="card-subtitle text-white">Rp {{ $workshop['harga'] }}</sub>
                </div> 
                <div class="card-body" style="height: '100%'">
                    <p>{{  Illuminate\Support\Str::length($workshop['deskripsi']) > 30 ? substr($workshop['deskripsi'], 0 ,30)."..." :$workshop['deskripsi'] }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="/daftar/{{ $workshop['id'] }}" class="btn btn-primary p-2">DAFTAR</a>
                </div>
            </div>
        </div>            
        @endforeach
    </div>
@endsection