@extends('core_leaders.core_leaders_master')
@section('datatablesCss')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('core_leaders')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <!-- <li><a href="{{route('cih.create.member')}}" class="btn btn-warning">Create New Joiner</a></li> -->
              <li class="breadcrumb-item"><a href="{{route('cih.dashboard')}}" style="color:#000">Dashboard</a></li>
              <!-- <li class="breadcrumb-item active" style="color:#000"></li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if (Session::has('error'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
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
          <div class="col-lg-10 col-6">
            <!-- small box -->
            <div id="google-line-chart" style="width: 100%; height: 530px"></div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
          <div class="">
            <!-- Bar chart -->
            <!-- /.card -->

            <!-- Donut chart -->
            <div class="card card-outline">
              <div class="card-header bg-light">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Progress
                </h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <div class="card-body">
                <div id="donut-chart" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->
          </div>
          <div class="small-box bg-secondary">
              <div class="inner">
                <h3 class='text-dark'>42</h3>

                <p class='text-dark'>New Babies</p>
              </div>
              <div class="icon">
                <i class="fas fa-baby"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
        <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Special Request</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Need</th>
                    <th>Amount</th>
                    <th>Team</th>
                    <th>Zone</th>
                    <th>Center</th>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($specialRequests as $specialRequest)
                  <tr>
                    <td>{{$specialRequest->id}}</td>
                    <td>{{$specialRequest->fname}}</td>
                    <td>{{$specialRequest->lname}}</td>
                    <td>{{$specialRequest->need}}</td>
                    <td>{{$specialRequest->totalSum}}</td>
                    <td>{{$specialRequest->nam}}</td>
                    <td>{{$specialRequest->names}}</td>
                    <td>{{$specialRequest->name}}</td>
                    <td>{{ \Carbon\Carbon::parse($specialRequest->created_at)->format('j F Y') }}</td>
                    <td>
                    <a href="{{route('special.request', $specialRequest->id)}}" class="btn btn-secondary">View Details</a>
                    </td>
                    @if($specialRequest->status == 2)
                    <td><a href="" class="btn btn-success">Settled</a></td>
                    @elseif($specialRequest->status == 3)
                    <td><a href="" class="btn btn-danger">Rejected</a></td>
                    @elseif($specialRequest->status == 1)
                    <td><a href="" class="btn btn-warning">pending</a></td>
                    @endif
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
    <!-- FLOT CHARTS -->
    <script src="{{asset('plugins/flot/jquery.flot.js')}}"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="{{asset('plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="{{asset('plugins/flot/plugins/jquery.flot.pie.js')}}"></script>
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
  $(function () {
    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
      {
        label: 'pending',
        data : {{$pendingCount}},
        color: '#FFDD00'
      },
      {
        label: 'Settled',
        data : {{$settledCount}},
        color: '#ADFF02'
      },
      {
        label: 'Rejected',
        data : {{$rejectCount}},
        color: '#FF006D'
      }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
    })
    /*
     * END DONUT CHART
     */

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
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
                    echo "['".$attendance->created_at->format('j F ')."', ".$attendance->totalMale.",  $attendance->totalFemale,],";
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