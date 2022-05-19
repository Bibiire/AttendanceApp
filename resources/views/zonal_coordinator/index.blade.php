@extends('zonal_coordinator.zonal_coordinator_master')
@section('datatablesCss')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
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
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session::get('error') }} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
          <div class="mx-3 col-md-6">
            <h2>Welcome Pastor {{ Auth::guard('zonal_coordinator')->user()->name }}</h2>
            <p>Here’s what is happening in your Center today.</p>
          </div>
          <div class="mx-3 col-md-4">
            <h2 class='text-right'>{{ $zone->names}}</h2>
          </div>
        </div>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- /.col (LEFT) -->
          <div class="col-md-9">
            <!-- BAR CHART -->
            <div class="card card-light">
              <div class="card-header">
                <div class="card-tools">
                    <a class='btn btn-outline-warning active'>All</a>
                    <a class='btn btn-outline-warning'>Adult</a>
                    <a class='btn btn-outline-warning'>Youth</a>
                    <a class='btn btn-outline-warning'>Teen</a>
                    <a class='btn btn-outline-warning'>Children</a>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <div id="barchart_material" style="width: 100%; height: 300px; display:block "></div>
                </div>
                <div class="chart">
                  <div id="barchart_material1"  style="width: 100%; height: 300px; display:none "></div>
                </div>
                <div class="chart">
                  <div id="barchart_material2"  style="width: 100%; height: 300px; display:none "></div>
                </div>
                <div class="chart">
                  <div id="barchart_material3"  style="width: 100%; height: 300px; display:none "></div>
                </div>
                <div class="chart">
                  <div id="barchart_material4"  style="width: 100%; height: 300px; display:none "></div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            </div> 
            <!-- /.card -->

            

        
          <!-- /.col (RIGHT) -->
          <div class="col-md-3">
            <a class='btn btn-secondary' href="{{route('zonal_coordinator.feedback.create')}}"><i class="fas fa-plus-circle mr-2"></i> Monthly Report</a>
          </div> 
          
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Pending Needs</p>
                        <h3>{{$specialRequestsCount}}</h3>  
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
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Total Members</p>
                        <h3>{{$membersCount}}</h3>  
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Total New Joiner</p>
                        <h3>{{$newJoinerCount}}</h3>  
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Home Address</th>
                    <th>Phone Number</th>
                    <th>Center</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($cihs as $cih)
                  <tr>
                    <td>{{$cih->id}}</td>
                    <td>{{$cih->full_name}}</td>
                    <td>{{$cih->email}}</td>
                    <td>{{$cih->address}}</td>
                    <td>{{$cih->phone}}</td>
                    <td>{{$cih->name}}</td>
                    <td>
                      <a href="" class="btn btn-secondary">View Details</a>
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
    <script>
      function adult() {
        document.getElementById('barchart_material').style.display='none';
        document.getElementById('barchart_material1').style.display='block';
      }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Male', 'Female'],

            @php
              foreach($attendance as $attendances) {
                  echo "['.$attendances->created_at.', $attendances->totalMale, $attendances->totalFemale],";
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
    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Male', 'Female'],

            @php
              foreach($attendance as $attendances) {
                  echo "['.$attendances->created_at.', $attendances->maleAdult, $attendances->femaleAdult],";
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
        var chart = new google.charts.Bar(document.getElementById('barchart_material1'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Male', 'Female'],

            @php
              foreach($attendance as $attendances) {
                  echo "['.$attendances->created_at.', $attendances->maleYouth, $attendances->femaleYouth],";
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
        var chart = new google.charts.Bar(document.getElementById('barchart_material2'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart3() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Male', 'Female'],

            @php
              foreach($attendance as $attendances) {
                  echo "['.$attendances->created_at.', $attendances->maleTeen, $attendances->femaleTeen],";
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
        var chart = new google.charts.Bar(document.getElementById('barchart_material3'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart4);

      function drawChart4() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Male', 'Female'],

            @php
              foreach($attendance as $attendances) {
                  echo "['.$attendances->created_at.', $attendances->maleChild, $attendances->femaleChild],";
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
        var chart = new google.charts.Bar(document.getElementById('barchart_material4'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    

@endsection
