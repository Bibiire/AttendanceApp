@extends('zonal_coordinator.zonal_coordinator_master')
@section('datatablesCss')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <style>
        table{
            border: 1px solid #ffcc00;
            border-collapse: collapse;
            font-size: 15px;
        }
        th, td {
            border: 1px solid #ffcc00;
            border-right: none;
            border-collapse: collapse;
            font-size: 20px;
        }
  </style>
@endsection
@section('zonal_coordinator')
   
<!--/ content header -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" style="color:#000">Home</a></li>
              <li class="breadcrumb-item active" style="color:#000">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        @if (Session::has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session::get('error') }} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <div class="mx-3">
        <h2>Welcome Pastor {{ Auth::guard('zonal_coordinator')->user()->name }}</h2>
        <p>Here’s what is happening in your Center today.</p>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-9">
              <div>
                <table style="width: 100%; height: 10vh">
                  <tr>
                      <th class="p-3 h3" style="">Centers Highlights</th>
                      
                  </tr>
                  <tr>
                      <td class="p-3">
                          <h5 style="color: #b1b1b1">Total Attendance</h5>
                          <h1>{{$attendanceSum}}</h1>
                      </td>
                      <td class="p-3">
                          <h5 style="color: #b1b1b1">Total Center</h5>
                          <h1>{{$attendanceCount}}</h1>
                      </td>
                      <td class="p-3">
                          <h5 style="color: #b1b1b1">Average Attendance</h5>
                          <h1>{{$averageAttendance}}</h1>
                      </td>
                  </tr>
                </table>
              </div>

              <div class="charts mt-5">
                <div id="google-line-chart" style="width: 100%; height: 500px"></div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class='bg-secondary' style="width: 100%; height: 18vh"></div>
              <div class='mt-5' style="border:2px solid #c3c3c3; padding:10px; box-shadow: 5px 5px 5px #c3c3c3;background-color:#fff; height: 500px">
              
                <h2>Highest Attendance</h2>
              @foreach($attendanceOrder as $attendance)
              <div class="row mb-2">
              <h5 class="col-md-6">{{$attendance->name}}</h5>
              <h5 class="col-md-6 text-right">{{$attendance->totalAttendance}}</h5>
              </div>
              
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: {{$attendance->totalAttendance}}px" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">{{$attendance->totalAttendance}}</div>
              </div>
              @endforeach
              </div>
             
            </div>
            
        </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('datatableJs')
  <!-- DataTables  & Plugins -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
 
        function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Male', 'Female'],
 
                @php
                foreach($attendancess as $attendance) {
                    echo "['".$attendance->created_at."', ".$attendance->totalMale.",  $attendance->totalFemale,],";
                }
                @endphp
        ]);
 
        var options = {
          title: 'Total Attendance Weekly',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
 
          var chart = new google.visualization.LineChart(document.getElementById('google-line-chart'));
 
          chart.draw(data, options);
        }
    </script>
@endsection
