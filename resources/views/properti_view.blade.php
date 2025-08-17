@extends('layout.app')
@section('title', 'Edit Properti')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <p class="card-title">Data Properti</p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('properti_show', ['id_properti' => $properti['id_properti']]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_properti">ID Properti</label>
                <input type="text" class="form-control"
                       id="id_properti" name="id_properti"
                       value="{{ $properti['id_properti'] }}" readonly>
            </div>

            <div class="form-group">
                <label for="nama_properti">Nama Properti</label>
                <input type="text" class="form-control"
                       id="nama_properti" name="nama_properti"
                       value="{{ $properti['nama_properti'] }}" readonly>
            </div>

            <div class="form-group">
                <label for="harga_properti">Harga</label>
                <input type="text" class="form-control"
                       id="harga_properti" name="harga_properti"
                       value="Rp. {{ number_format($properti['harga_properti'], 0, ',', '.') }}" readonly>
            </div>

            <div class="form-group">
                <label for="luas_properti">Luas</label>
                <input type="text" class="form-control"
                       id="luas_properti" name="luas_properti"
                       value="{{ $properti['luas_properti'] }} m²" readonly>
            </div>

            <div class="form-group">
                <label for="tipe_properti">Tipe</label>
                <input type="text" class="form-control"
                       id="tipe_properti" name="tipe_properti" readonly
                       @if ($properti['tipe_properti'] == 1)
                            value="Office Space"
                        @elseif ($properti['tipe_properti'] == 2)
                            value="Meeting Room"
                        @endif>
            </div>

            <div class="form-group">
                <label for="status_properti">Status</label>
                <input type="text" class="form-control"
                       id="status_properti" name="status_properti" readonly
                       @if ($properti['status_properti'] == 1)
                            value="Tersedia"
                        @elseif ($properti['status_properti'] == 2)
                            value="Digunakan"
                        @endif>
            </div>

            <div class="form-group">
                <a href="{{ route('properti_list') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection