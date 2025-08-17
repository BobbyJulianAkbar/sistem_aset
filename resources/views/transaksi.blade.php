@extends('layout.app')
@section('title', 'Transaksi')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <p class="card-title">Penyewaan</p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('transaksi_store') }}">
            @csrf

            <div class="form-group">
                <label for="id_klien">Nama Klien</label>
                <select name="id_klien" id="id_klien" class="form-control" required>
                <option value="">-- Pilih Klien --</option>
                    @foreach($klien as $k)
                      <option value="{{ $k->id_klien }}">{{ $k->nama_klien }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Properti Sewa</label>
                <select name="id_properti" id="id_properti" class="form-control">
                  <option value="">-- Pilih Properti --</option>
                  @foreach($properti as $p)
                    <option value="{{ $p->id_properti }}" data-harga="{{ $p->harga_properti }}">
                      {{ $p->nama_properti }}
                    </option>
                  @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>Harga Properti</label>
                <input type="text" id="harga_properti" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="tipe_pembayaran">Tipe Pembayaran</label>
                <select class="form-control {{ session('errors.tipe_pembayaran') ? 'is-invalid' : '' }}"
                        id="tipe_pembayaran" name="tipe_pembayaran" required>
                    <option value="" disabled {{ old('tipe_pembayaran') ? '' : 'selected' }}>-- Pilih Tipe --</option>
                    <option value="1" {{ old('tipe_pembayaran') == '1' ? 'selected' : '' }}>Bayar Lunas</option>
                    <option value="2" {{ old('tipe_pembayaran') == '2' ? 'selected' : '' }}>Cicilan</option>
                </select>
                @if (session('errors.tipe_pembayaran'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.tipe_pembayaran') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="jlh_pembayaran">Jumlah Pembayaran</label>
                <input type="text" class="form-control {{ session('errors.jlh_pembayaran') ? 'is-invalid' : '' }}"
                       id="jlh_pembayaran" name="jlh_pembayaran" placeholder="Rp."
                       value="{{ old('jlh_pembayaran') }}" inputmode="numeric" required autocomplete="off">
                @if (session('errors.jlh_pembayaran'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ session('errors.jlh_pembayaran') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success mb-2">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      const selectProperti = document.getElementById('id_properti');
      const hargaInput = document.getElementById('harga_properti');
  
      selectProperti.addEventListener('change', function() {
        const selectedOption = selectProperti.options[selectProperti.selectedIndex];
        const harga = selectedOption.getAttribute('data-harga') || '';
  
        hargaInput.value = harga ? formatRupiah(harga) : '';
      });
  
      function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR',
          minimumFractionDigits: 0
        }).format(angka);
      }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      const input = document.getElementById('jlh_pembayaran');
  
      input.addEventListener('input', function (e) {
        // Remove all non-digit characters
        let value = this.value.replace(/[^,\d]/g, '');
  
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