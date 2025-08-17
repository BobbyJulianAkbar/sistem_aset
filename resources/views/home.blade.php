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
              <h3>100</h3>

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
              <h3>44</h3>

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
              <h3>56</h3>

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
          <h3 align="right">100</h3>
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
          <h3 align="right">Rp. 10000000</h3>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Sales
              </h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                  </li>
                </ul>
              </div>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart"
                     style="position: relative; height: 300px;">
                    <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                 </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                  <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->

          <section class="col-lg-6 connectedSortable">
          <!-- Calendar -->
          <div class="card bg-gradient-olive">
            <div class="card-header border-0">

              <h3 class="card-title">
                <i class="far fa-calendar-alt"></i>
                Calendar
              </h3>
            <!-- /.card-header -->
            <div class="card-body pt-0">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var calendarEl = document.getElementById('calendar');
  
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 400,
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek'
        }
      });
  
      calendar.render();
    });
  </script>
  <style>
    .fc .fc-col-header-cell-cushion {
      color: white !important;
    }
  
    .fc .fc-daygrid-day-number {
      color: white !important;
    }
  
    #calendar {
      background-color: transparent;
    }
  </style>
@endsection