@extends('cih.cih_master')
@section('datatablesCss')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('cih')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Special Request Stats</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <!-- <li><a href="{{route('cih.create.member')}}" class="btn btn-warning">Create New Joiner</a></li> -->
              <li class="breadcrumb-item"><a href="{{route('cih.dashboard')}}" style="color:#000">Dashboard</a></li>
              <li class="breadcrumb-item active" style="color:#000">Special Request Stats</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>  

    <!-- /.content-header -->
    @if (Session::has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session::get('error') }} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- <h8> Login Cih Pastor Name: {{ Auth::guard('cih')->user()->name }} </h8>
        <br>
        <h8> Login Cih Pastor Email: {{ Auth::guard('cih')->user()->email }} </h8> -->
    <div class="row">
      <div class="col-sm-8 mx-3">
          <h2>Welcome Pastor {{ Auth::guard('cih')->user()->full_name }}</h2>
          <p>Here’s what is happening in your Center today.</p>
      </div>
      <div class="col-sm-3 mx-3">
          <h2>{{$center->name}}</h2>
          <h4>{{$zone->name}}</h4>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
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
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="card" style="height: 405px">
              <div class="card-body">
                <div class="row mb-5">
                  <h3 class='col-md-8'>{{$center->name}}</h3>
                  <img src="{{asset('dist/img/location.png')}}" class='col-md-4' alt="">
                </div>
                <div class="row">
                  <div class="col-md-5 offset-2">
                    <h6><img src="{{asset('dist/img/settled.png')}}" class='mr-2' alt=""> Settled</h6>
                    @if($pendingCountPecent < $settledCountPecent)
                    <h6 class='mr-3 mt-3ol' style='margin-left:65px;'><i class="fas fa-arrow-up mr-3"></i> {{$settledCountPecent}}%</h6>
                    @elseif($pendingCountPecent > $settledCountPecent)
                    <h6 class='mr-3 mt-3' style='margin-left:65px;'><i class="fas fa-arrow-down mr-3"></i> {{$settledCountPecent}}%</h6>
                    @else
                    <h6 class='mr-5 mt-3' style='margin-left:65px;'>{{$settledCountPecent}}%</h6>
                    @endif
                  </div>
                  <div class="col-md-5">
                    <h6><img src="{{asset('dist/img/pending.png')}}" class='mr-2' alt="">Pending</h6>
                    @if($pendingCountPecent > $settledCountPecent)
                    <h6 class='mr-3' style='margin-left:65px;'><i class="fas fa-arrow-up mr-3"></i> {{$pendingCountPecent}}%</h6>
                    @elseif($pendingCountPecent < $settledCountPecent)
                    <h6 class='mr-3' style='margin-left:65px;'><i class="fas fa-arrow-down mr-3"></i> {{$pendingCountPecent}}%</h6>
                    @else
                    <h6 class='mr-5 ' style='margin-left:65px;'>{{$pendingCountPecent}}%</h6>
                    @endif
                  </div>
                  <div class="table mt-5">
                    <tbody>
                      <tr>
                      <td>
                        <h6>AVG MONTH <br> SPECIAL NEEDS</h6>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"> 55%</div>
                        </div>
                      </td>
                      </tr>
                    </tbody>
                  
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning"  style="height: 405px">
              <div class="inner">
                <h3></h3>

                <p></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
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
                    <td>{{ \Carbon\Carbon::parse($specialRequest->created_at)->format('j F Y') }}</td>
                    <td>
                    <a href="{{route('get.request', $specialRequest->id)}}" class="btn btn-secondary">View Details</a>
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
 
    
@endsection
