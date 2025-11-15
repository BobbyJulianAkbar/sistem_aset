@extends('layout.app')
@section('title', 'Data Properti')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <p class="card-title">List Properti</p>
                <a class="btn btn-success float-right" href="{{ url('properti/new') }}">Tambah</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Properti</th>
                    <th>Tipe</th>
                    <th>Luas</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properti as $i => $Property)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $Property['nama_properti'] }}</td>
                    <td>@if ($Property['tipe_properti'] == 1)
                            Office Space
                        @elseif ($Property['tipe_properti'] == 2)
                            Meeting Room
                        @endif
                    </td>
                    <td>{{ $Property['luas_properti'] }} m²</td>
                    <td>Rp. {{ number_format($Property['harga_properti'], 0, ',', '.') }}</td>
                    <td>@if ($Property['status_properti'] == 1)
                            <span class="text-success font-weight-bold">Tersedia</span>
                        @elseif ($Property['status_properti'] == 2)
                            <span class="text-danger font-weight-bold">Digunakan</span>
                        @elseif ($Property['status_properti'] == 3)
                            <span class="text-secondary font-weight-bold">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        @if($Property->properti_picture)
                            <img src="{{ asset('storage/' . $Property->properti_picture) }}" 
                                alt="Foto {{ $Property->nama_properti }}" 
                                width="80" class="rounded shadow">
                        @else
                            -
                        @endif
                    </td>
                    <td class="manage-row">
                        <a href="{{ route('properti_show', $Property['id_properti']) }}" class="badge badge-light">
                            <i class="fas fa-eye" style="color: #4A9099;"></i>
                        </a>
                        <a href="{{ route('properti_edit', $Property['id_properti']) }}" class="badge badge-light">
                            <i class="fas fa-edit" style="color: #4A9099;"></i>
                        </a>

                        <!-- Trigger modal -->
                        <a href="#" class="badge badge-light" data-toggle="modal" data-target="#modalDelete{{ $Property['id_properti'] }}">
                            <i class="fas fa-trash-alt" style="color: #FF0000;"></i>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id="modalDelete{{ $Property['id_properti'] }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $Property['id_properti'] }}" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin untuk menghapus data?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('properti_destroy', $Property['id_properti']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Properti</th>
                    <th>Tipe</th>
                    <th>Luas</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("form").forEach(form => {
        form.addEventListener("submit", function () {
            const btn = this.querySelector('button[type="submit"]');
            if (btn) {
                btn.disabled = true;
                btn.innerHTML = "Deleting...";
            }
        });
    });
});
</script>
@endsection

@push('styles')
<style>
    div.dataTables_wrapper div.dt-buttons {
        float: left;
        margin-bottom: 10px;
    }

    div.dataTables_wrapper .dataTables_filter {
        float: right;
        text-align: right;
    }

    .table td, .table th {
        vertical-align: middle;
    }
</style>
@endpush
