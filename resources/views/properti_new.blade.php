@extends('layout.app')
@section('title', 'Tambah Properti')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <p class="card-title">Tambah Properti</p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('properti_store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama_properti">Nama Properti</label>
                <input type="text" class="form-control {{ session('errors.nama_properti') ? 'is-invalid' : '' }}"
                       id="nama_properti" name="nama_properti" placeholder="Masukkan Nama Properti"
                       value="{{ old('nama_properti') }}" required autocomplete="nama_properti">
                @if (session('errors.nama_properti'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.nama_properti') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="harga_properti">Harga</label>
                <input type="text" class="form-control {{ session('errors.harga_properti') ? 'is-invalid' : '' }}"
                       id="harga_properti" name="harga_properti" placeholder="Rp."
                       value="{{ old('harga_properti') }}" inputmode="numeric" required autocomplete="harga_properti">
                @if (session('errors.harga_properti'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.harga_properti') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="luas_properti">Luas</label>
                <input type="text" class="form-control {{ session('errors.luas_properti') ? 'is-invalid' : '' }}"
                       id="luas_properti" name="luas_properti" placeholder="m²"
                       value="{{ old('luas_properti') }}" inputmode="numeric" required autocomplete="luas_properti">
                @if (session('errors.luas_properti'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.luas_properti') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="tipe_properti">Tipe</label>
                <select class="form-control {{ session('errors.tipe_properti') ? 'is-invalid' : '' }}"
                        id="tipe_properti" name="tipe_properti" required>
                    <option value="" disabled {{ old('tipe_properti') ? '' : 'selected' }}>-- Pilih Tipe --</option>
                    <option value="1" {{ old('tipe_properti') == '1' ? 'selected' : '' }}>Office Space</option>
                    <option value="2" {{ old('tipe_properti') == '2' ? 'selected' : '' }}>Meeting Room</option>
                </select>
                @if (session('errors.tipe_properti'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.tipe_properti') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="status_properti">Status</label>
                <select class="form-control {{ session('errors.status_properti') ? 'is-invalid' : '' }}"
                        id="status_properti" name="status_properti" required>
                    <option value="" disabled {{ old('status_properti') ? '' : 'selected' }}>-- Pilih Status --</option>
                    <option value="1" {{ old('status_properti') == '1' ? 'selected' : '' }}>Tersedia</option>
                    <option value="3" {{ old('status_properti') == '3' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @if (session('errors.status_properti'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.status_properti') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="properti_picture">Foto Profil</label>
                <input type="file" class="form-control {{ session('errors.properti_picture') ? 'is-invalid' : '' }}"
                       id="properti_picture" name="properti_picture" accept="image/*"
                       value="{{ old('properti_picture') }}">
                @if (session('errors.properti_picture'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.properti_picture') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('properti_list') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
<script>
    const hargaInput = document.getElementById('harga_properti');

    hargaInput.addEventListener('keyup', function(e) {
        let value = this.value.replace(/[^,\d]/g, '').toString();
        let split = value.split(',');
        let sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        this.value = rupiah ? 'Rp. ' + rupiah : '';
    });
    document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("form").addEventListener("submit", function () {
        const btn = this.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.innerHTML = "Processing...";
    });
});
</script>
@endsection