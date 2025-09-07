@extends('layout.app')
@section('title', 'Home')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-4 col-8">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
              <h3>{{ $jumlahProperti }}</h3>

              <p>Jumlah Properti</p>
            </div>
            <div class="icon">
              <i class="ion ion-home"></i>
            </div>
            <a href="properti" class="small-box-footer">Lihat Properti <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-8">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
              <h3>{{ $totalKlien }}</h3>

              <p>Total Klien</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="klien" class="small-box-footer">Lihat Klien <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-8">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
              <h3>{{ $propertiTersedia }}</h3>

              <p>Properti Tersedia</p>
            </div>
            <div class="icon">
              <i class="ion ion-bookmark"></i>
            </div>
            <a href="transaksi" class="small-box-footer">Lakukan Transaksi <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="card bg-olive">
        <div class="card-header">
          <h3 class="card-title">Kumulatif Transaksi</h3>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <h3 align="right">{{ $kumulatifTransaksi }}</h3>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="card bg-olive">
        <div class="card-header">
          <h3 class="card-title">Kumulatif Pendapatan</h3>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <h3 align="right">Rp. {{ number_format($kumulatifPendapatan, 0, ',', '.') }}</h3>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <div class="card">
    <div class="card-header">
              <div class="row">
                  <div class="col-lg-12">
                      <p class="card-title">Daftar Cicilan</p>
                  </div>
              </div>
          </div>
    <div class="card-body">
          <table id="example1" class="table table-bordered table-striped text-center">
              <thead>
                  <tr>
                      <th>No</th>
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
                          <td>{{ $Pemasukan->klien->nama_klien ?? '-' }}</td>
                          <td>{{ $Pemasukan->properti->nama_properti ?? '-' }}</td>
                          <td>@if ($Pemasukan['tipe_pembayaran'] == 1)
                              <span class="text-success font-weight-bold">Lunas</span>
                          @elseif ($Pemasukan['tipe_pembayaran'] == 2)
                              <span class="text-warning font-weight-bold">Cicilan</span>
                          @endif
                          </td>
                          <td>Rp. {{ number_format($Pemasukan['jlh_pembayaran'], 0, ',', '.') }}</td>
                      </tr>
                  @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <th>No</th>
                      <th>Nama Klien</th>
                      <th>Properti</th>
                      <th>Status</th>
                      <th>Pembayaran</th>
                      <th>Aksi</th>
                  </tr>
              </tfoot>
          </table>
    </div>
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