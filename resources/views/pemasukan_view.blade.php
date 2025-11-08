@extends('layout.app')
@section('title', 'Rincian Pemasukan')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <p class="card-title">Detail Pemasukan</p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="id_pemasukan">ID Pemasukan</label>
                <input type="text" class="form-control"
                       id="id_pemasukan" name="id_pemasukan" readonly
                       value="{{ $pemasukan['id_pemasukan'] }}">
            </div>

            <div class="form-group">
                <label for="nama_klien">Nama Klien</label>
                <input type="text" class="form-control"
                       id="nama_klien" name="nama_klien" readonly
                       value="{{ $pemasukan->klien->nama_klien ?? '-' }}">
            </div>

            <div class="form-group">
                <label for="nama_properti">Nama Properti</label>
                <input type="text" class="form-control"
                       id="nama_properti" name="nama_properti" readonly
                       value="{{ $pemasukan->properti->nama_properti ?? '-' }}">
            </div>

            <div class="form-group">
                <label for="tipe_pembayaran">Tipe Pembayaran</label>
                <input type="text" class="form-control"
                       id="tipe_pembayaran" name="tipe_pembayaran" readonly
                       @if ($pemasukan['tipe_pembayaran'] == 1)
                            value="Bayar Lunas"
                        @elseif ($pemasukan['tipe_pembayaran'] == 2)
                            value="Cicilan"
                        @endif>
            </div>
            
            <div class="form-group">
                <label for="created_at">Tanggal/Waktu Transaksi Awal</label>
                <input type="datetime-local" class="form-control"
                       id="created_at" name="created_at" readonly
                       value="{{ $pemasukan['created_at'] ?? '-' }}">
            </div>

            <div class="form-group">
                <label for="updated_at">Tanggal/Waktu Transaksi Terakhir</label>
                <input type="datetime-local" class="form-control"
                       id="updated_at" name="updated_at" readonly
                       value="{{ $pemasukan['updated_at'] ?? '-' }}">
            </div>

            <div class="form-group">
                <label for="jlh_pembayaran">Jumlah Pembayaran</label>
                <input type="text" class="form-control"
                       id="jlh_pembayaran" name="jlh_pembayaran" readonly
                       value="Rp. {{ number_format($pemasukan['jlh_pembayaran'], 0, ',', '.') }}">
            </div>

            <div class="form-group">
                <a href="{{ route('pemasukan_list') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection