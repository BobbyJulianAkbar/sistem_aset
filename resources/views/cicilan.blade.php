@extends('layout.app')
@section('title', 'Cicilan')

@section('content')
<div class="card">
    <div class="card-header">
        <p class="card-title">Bayar Cicilan</p>
    </div>
    <div class="card-body">
        {{-- Step 1: Pilih Klien & Properti --}}
        <form id="cicilanForm" action="" method="POST">
            @csrf

            <div class="form-group">
                <label for="id_pemasukan">Pilih Klien & Properti</label>
                <select name="id_pemasukan" id="id_pemasukan" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    @foreach($pemasukan as $p)
                        @php
                            $totalPaid = $p->cicilan->sum('jumlah_cicilan');
                            $remaining = $p->properti->harga_properti - $totalPaid;
                        @endphp
                        <option value="{{ $p->id_pemasukan }}"
                                data-klien="{{ $p->klien->nama_klien }}"
                                data-properti="{{ $p->properti->nama_properti }}"
                                data-remaining="{{ $remaining }}">
                            {{ $p->klien->nama_klien }} - {{ $p->properti->nama_properti }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Step 2: Show info --}}
            <div class="form-group">
                <label>Nama Klien</label>
                <input type="text" id="nama_klien" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label>Properti</label>
                <input type="text" id="nama_properti" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label>Sisa Pembayaran</label>
                <input type="text" id="remaining_price" class="form-control" readonly>
            </div>

            {{-- Step 3: Input amount to pay --}}
            <div class="form-group">
                <label for="jumlah_cicilan">Jumlah Pembayaran</label>
                <input type="text" name="jumlah_cicilan" id="jumlah_cicilan" 
                       class="form-control" placeholder="Rp." required autocomplete="off">
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>

{{-- Scripts --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectPemasukan = document.getElementById('id_pemasukan');
    const namaKlien = document.getElementById('nama_klien');
    const namaProperti = document.getElementById('nama_properti');
    const remainingInput = document.getElementById('remaining_price');
    const form = document.getElementById('cicilanForm');

    selectPemasukan.addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        if (!selected.value) return;

        namaKlien.value = selected.getAttribute('data-klien');
        namaProperti.value = selected.getAttribute('data-properti');
        const remaining = selected.getAttribute('data-remaining') || 0;
        remainingInput.value = formatRupiah(remaining);

        // Update form action dynamically
        form.action = "/cicilan/" + selected.value;
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
@endsection
