@extends('layout.app')
@section('title', 'Edit Klien')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <p class="card-title">Edit Klien</p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('klien_update', ['id_klien' => $klien['id_klien']]) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nama_klien">Nama Klien</label>
                <input type="text" class="form-control {{ session('errors.nama_klien') ? 'is-invalid' : '' }}"
                       id="nama_klien" name="nama_klien"
                       value="{{ old('nama_klien', $klien['nama_klien']) }}" required>
                @if (session('errors.nama_klien'))
                    <span class="invalid-feedback">{{ session('errors.nama_klien') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="no_hp_klien">No. Telepon Klien</label>
                <input type="text" class="form-control {{ session('errors.no_hp_klien') ? 'is-invalid' : '' }}"
                       id="no_hp_klien" name="no_hp_klien"
                       value="{{ old('no_hp_klien', $klien['no_hp_klien']) }}" required>
                @if (session('errors.no_hp_klien'))
                <span class="invalid-feedback">{{ session('errors.no_hp_klien') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="email_klien">Email Klien</label>
                <input type="text" class="form-control {{ session('errors.email_klien') ? 'is-invalid' : '' }}"
                       id="email_klien" name="email_klien"
                       value="{{ old('email_klien', $klien['email_klien']) }}" required>
                @if (session('errors.email_klien'))
                <span class="invalid-feedback">{{ session('errors.no_hp_klien') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('klien_list') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("form").addEventListener("submit", function () {
        const btn = this.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.innerHTML = "Processing...";
    });
});
</script>
@endsection