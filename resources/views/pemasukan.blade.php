@extends('layout.app')
@section('title', 'Data Pemasukan')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12">
                    <p class="card-title">Daftar Transaksi</p>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal/Waktu</th>
                    <th>Nama Klien</th>
                    <th>Properti</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemasukan as $i => $Pemasukan)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $Pemasukan['updated_at'] }}</td>
                        <td>{{ $Pemasukan->klien->nama_klien ?? '-' }}</td>
                        <td>{{ $Pemasukan->properti->nama_properti ?? '-' }}</td>
                        <td>@if ($Pemasukan['tipe_pembayaran'] == 1)
                            <span class="text-success font-weight-bold">Lunas</span>
                        @elseif ($Pemasukan['tipe_pembayaran'] == 2)
                            <span class="text-warning font-weight-bold">Cicilan</span>
                        @endif
                        </td>
                        <td>Rp. {{ number_format($Pemasukan['jlh_pembayaran'], 0, ',', '.') }}</td>
                        <td class="manage-row">
                            <a href="{{ route('pemasukan_show', $Pemasukan['id_pemasukan']) }}" class="badge badge-light">
                                <i class="fas fa-eye" style="color: #4A9099;"></i>
                            </a>

                            @if (in_array(Auth::user()->jabatan, [1, 2]))
                                <!-- Trigger modal -->
                                <a href="#" class="badge badge-light" data-toggle="modal" data-target="#modalDelete{{ $Pemasukan['id_pemasukan'] }}">
                                    <i class="fas fa-trash-alt" style="color: #FF0000;"></i>
                                </a>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="modalDelete{{ $Pemasukan['id_pemasukan'] }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $Pemasukan['id_pemasukan'] }}" aria-hidden="true">
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
                                            <form action="{{ route('pemasukan_destroy', $Pemasukan['id_pemasukan']) }}" method="POST">
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
                        <th>Tanggal/Waktu</th>
                        <th>Nama Klien</th>
                        <th>Properti</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
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

@push('scripts')
<script>
    $(document).ready(function () {
        $('#example1').DataTable({
            responsive: true,
            autoWidth: false,
            lengthChange: false
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush