@extends('layout.app')
@section('title', 'Rincian Klien')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <p class="card-title">Data Klien</p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('klien_show', ['id_klien' => $klien['id_klien']]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_klien">ID Klien</label>
                <input type="text" class="form-control"
                       id="id_klien" name="id_klien"
                       value="{{ $klien['id_klien'] }}" readonly>
            </div>

            <div class="form-group">
                <label for="nama_klien">Nama Klien</label>
                <input type="text" class="form-control"
                       id="nama_klien" name="nama_klien"
                       value="{{ $klien['nama_klien'] }}" readonly>
            </div>

            <div class="form-group">
                <label for="no_hp_klien">No. Telepon Klien</label>
                <input type="text" class="form-control"
                       id="no_hp_klien" name="no_hp_klien"
                       value="{{ $klien['no_hp_klien'] }}" readonly>
            </div>

            <div class="form-group">
                <label for="email_klien">Email Klien</label>
                <input type="text" class="form-control"
                       id="email_klien" name="email_klien"
                       value="{{ $klien['email_klien'] }}" readonly>
            </div>

            <div class="form-group">
                <label for="created_at">Tanggal/Waktu Terdaftar</label>
                <input type="datetime-local" class="form-control"
                       id="created_at" name="created_at" readonly
                       value="{{ $klien['created_at'] ?? '-' }}">
            </div>

            <div class="form-group">
                <a href="{{ route('klien_list') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection