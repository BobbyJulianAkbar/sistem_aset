@extends('layout.app')
@section('title', 'Edit Properti')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <p class="card-title">Edit Properti</p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('properti_update', ['id_properti' => $properti['id_properti']]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_properti">Nama Properti</label>
                <input type="text" class="form-control {{ session('errors.nama_properti') ? 'is-invalid' : '' }}"
                       id="nama_properti" name="nama_properti"
                       value="{{ old('nama_properti', $properti['nama_properti']) }}" required>
                @if (session('errors.nama_properti'))
                    <span class="invalid-feedback">{{ session('errors.nama_properti') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="harga_properti">Harga</label>
                <input type="text" class="form-control {{ session('errors.harga_properti') ? 'is-invalid' : '' }}"
                       id="harga_properti" name="harga_properti"
                       value="{{ old('harga_properti', 'Rp. ' . number_format($properti['harga_properti'], 0, ',', '.')) }}" inputmode="numeric" required>
                @if (session('errors.harga_properti'))
                    <span class="invalid-feedback">{{ session('errors.harga_properti') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="luas_properti">Luas</label>
                <input type="text" class="form-control {{ session('errors.luas_properti') ? 'is-invalid' : '' }}"
                       id="luas_properti" name="luas_properti"
                       value="{{ old('luas_properti', $properti['luas_properti']) }}" inputmode="numeric" required>
                @if (session('errors.luas_properti'))
                    <span class="invalid-feedback">{{ session('errors.luas_properti') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="tipe_properti">Tipe</label>
                <select class="form-control {{ session('errors.tipe_properti') ? 'is-invalid' : '' }}"
                        id="tipe_properti" name="tipe_properti" required>
                    <option disabled selected>-- Pilih Tipe --</option>
                    <option value="1" {{ (old('tipe_properti', $properti['tipe_properti']) == 1) ? 'selected' : '' }}>Office Space</option>
                    <option value="2" {{ (old('tipe_properti', $properti['tipe_properti']) == 2) ? 'selected' : '' }}>Meeting Room</option>
                </select>
                @if (session('errors.tipe_properti'))
                    <span class="invalid-feedback">{{ session('errors.tipe_properti') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="status_properti">Status</label>
                <select class="form-control {{ session('errors.status_properti') ? 'is-invalid' : '' }}"
                        id="status_properti" name="status_properti" required>
                    <option disabled selected>-- Pilih Status --</option>
                    <option value="1" {{ (old('status_properti', $properti['status_properti']) == 1) ? 'selected' : '' }}>Aktif</option>
                    <option value="2" {{ (old('status_properti', $properti['status_properti']) == 2) ? 'selected' : '' }}>Maintenance</option>
                    <option value="3" {{ (old('status_properti', $properti['status_properti']) == 3) ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @if (session('errors.status_properti'))
                    <span class="invalid-feedback">{{ session('errors.status_properti') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('properti_list') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      const hargaInput = document.getElementById('harga_properti');
  
      hargaInput.addEventListener('input', function (e) {
        let value = this.value.replace(/[^0-9]/g, '');
        if (value) {
          this.value = formatRupiah(value);
        } else {
          this.value = '';
        }
      });
  
      function formatRupiah(angka) {
        let numberString = angka.replace(/[^,\d]/g, '').toString();
        let split = numberString.split(',');
        let sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        let ribuan = split[0].substr(sisa).match(/\d{3}/gi);
  
        if (ribuan) {
          let separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
  
        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp. ' + rupiah;
      }
    });
  </script>
@endsection