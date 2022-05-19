@extends('core_leaders.core_leaders_master')
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
@section('core_leaders')
   
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
        <h2>Welcome Pastor {{ Auth::guard('core_leaders')->user()->name }}</h2>
        <p>Here’s what is happening in your Center today.</p>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
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
        </div>
        <div class="row">
          <!-- /.col (LEFT) -->
          <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title text-dark">Center Attendance</h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <div id="barchart_material" style="width: 100%; height: 300px;"></div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            

          </div>
          <!-- /.col (RIGHT) --> 
          
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Total Attendance</p>
                        <h3>{{$attendanceSum}}</h3>  
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Total Center Managing</p>
                        <h3>{{$cihCount}}</h3>  
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Total Members</p>
                        <h3>{{$membersCount}}</h3>  
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Total New Joiner</p>
                        <h3>44</h3>  
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
        </div>
        <!-- Main row -->
        <div class="row">
        <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">CIH Pastors</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Full Name</th>
                    <th>Last Name</th>
                    <th>Home Address</th>
                    <th>Phone Number</th>
                    <th>Team</th>
                    <th>Zone</th>
                    <th>Center</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($cihs as $cih)
                  <tr>
                    <td>{{$cih->id}}</td>
                    <td>{{$cih->full_name}}</td>
                    <td>{{$cih->location}}</td>
                    <td>{{$cih->name}}</td>
                    <td>{{$cih->phone}}</td>
                    <td>{{$cih->nam}}</td>
                    <td>{{$cih->names}}</td>
                    <td>{{$cih->name}}</td>
                    <td>
                      <a href="{{route('core_leaders.attendance', $cih->id)}}" class="btn btn-secondary">View Report</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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
    <!-- Page specific script -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Product Id', 'Male', 'Female'],

            @php
              foreach($attendance as $attendances) {
                  echo "['".$attendances->created_at->format('j F ')."', $attendances->totalMale, $attendances->totalFemale],";
              }
            @endphp
        ]);

        var options = {
          chart: {
            title: 'Center Attendance',
            subtitle: '',
          },
          bars: 'vertical'
        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
   
@endsection
