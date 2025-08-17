@extends('layout.app')
@section('title', 'Klien')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <p class="card-title">Tambah Klien</p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('klien_store') }}">
            @csrf

            <div class="form-group">
                <label for="nama_klien">Nama Klien</label>
                <input type="text" class="form-control {{ session('errors.nama_klien') ? 'is-invalid' : '' }}"
                       id="nama_klien" name="nama_klien" placeholder="Masukkan Nama Klien"
                       value="{{ old('nama_klien') }}" required autocomplete="nama_klien">
                @if (session('errors.nama_klien'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.nama_klien') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="no_hp_klien">No. Telepon Klien</label>
                <input type="text" class="form-control {{ session('errors.no_hp_klien') ? 'is-invalid' : '' }}"
                       id="no_hp_klien" name="no_hp_klien" placeholder="01234567890"
                       value="{{ old('no_hp_klien') }}" required autocomplete="no_hp_klien">
                @if (session('errors.no_hp_klien'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.no_hp_klien') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="email_klien">Email Klien (Opsional)</label>
                <input type="text" class="form-control {{ session('errors.email_klien') ? 'is-invalid' : '' }}"
                       id="email_klien" name="email_klien" placeholder="example@example.com"
                       value="{{ old('email_klien') }}" autocomplete="email_klien">
                @if (session('errors.email_klien'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.email_klien') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success mb-2">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection