@extends('layout.app')
@section('title', 'Data Staff')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12">
                    <p class="card-title">Karyawan Perushaan</p>
                    <a class="btn btn-success float-right" href="{{ url('staff/new') }}">Tambah</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staff as $i => $Staff)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $Staff['name'] }}</td>
                    <td>@if ($Staff['jabatan'] == 1)
                            Manager
                        @elseif ($Staff['jabatan'] == 2)
                            Administrator
                        @elseif ($Staff['jabatan'] == 3)
                            Supervisor
                        @elseif ($Staff['jabatan'] == 4)
                            Staff
                        
                        @endif
                    </td>
                    <td>{{ $Staff['email'] }}</td>
                    <td>@if ($Staff['status_staff'] == 1)
                            <span class="text-success font-weight-bold">Aktif</span>
                        @elseif ($Staff['status_staff'] == 2)
                            <span class="text-danger font-weight-bold">Nonaktif</span>
                        @endif
                    </td>
                    <td class="manage-row">
                        <a href="{{ route('staff_show', $Staff['id']) }}" class="badge badge-light">
                            <i class="fas fa-eye" style="color: #4A9099;"></i>
                        </a>
                        <a href="{{ route('staff_edit', $Staff['id']) }}" class="badge badge-light">
                            <i class="fas fa-edit" style="color: #4A9099;"></i>
                        </a>

                        <!-- Trigger modal -->
                        <a href="#" class="badge badge-light" data-toggle="modal" data-target="#modalDelete{{ $Staff['id'] }}">
                            <i class="fas fa-trash-alt" style="color: #FF0000;"></i>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id="modalDelete{{ $Staff['id'] }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $Staff['id'] }}" aria-hidden="true">
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
                                        <form action="{{ route('staff_destroy', $Staff['id']) }}" method="POST">
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
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
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
</style>
@endpush