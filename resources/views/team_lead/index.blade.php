@extends('team_lead.team_lead_master')
@section('datatablesCss')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('team_lead')
   
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
    <div class="mx-3">
        <h2>Welcome Pastor {{ Auth::guard('team_lead')->user()->name }}</h2>
        <p>Here’s what is happening in your Center today.</p>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          @foreach($zonals as $zonal)
          @if($zonalChordCount == 1)
        <div class="col-lg-12">
            <!-- small box -->
            <div class="card" style="height: 405px">
              <div class="card-body">
                <div class="row mb-5">
                  <h3 class='col-md-8'>{{$zonal->names}}</h3>
                  <img src="{{asset('dist/img/location.png')}}" class='col-md-4' alt="">
                </div>
                
                <div class="mt-5 row">
                  <h3 class="col-md-6">Coordinator</h3>
                  <h3 class="col-md-6">Pastor {{$zonal->name}}</h3>
                </div>
                  
                  <div class="table mt-5">
                    <tbody>
                      <tr>
                      <td>
                        <h6>AVG MONTH <br> Attendance</h6>
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
          @elseif($zonalChordCount == 2)
          <div class="col-lg-6">
            <!-- small box -->
            <div class="card" style="height: 405px">
              <div class="card-body">
                <div class="row mb-5">
                  <h3 class='col-md-8'>{{$zonal->names}}</h3>
                  <img src="{{asset('dist/img/location.png')}}" class='col-md-4' alt="">
                </div>
                
                <div class="mt-5 row">
                  <h3 class="col-md-6">Coordinator</h3>
                  <h3 class="col-md-6">Pastor {{$zonal->name}}</h3>
                </div>
                  
                <div class="table mt-5">
                  <tbody>
                    <tr>
                    <td>
                      <h6>AVG MONTH <br> Attendance</h6>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: 55%"> 55%</div>
                      </div>
                    </td>
                    </tr>
                  </tbody>
                </div>
                
              </div>
          </div>
            @elseif($zonalChordCount == 3)
          <div class="col-lg-4">
            <!-- small box -->
            <div class="card" style="height: 405px">
              <div class="card-body">
                <div class="row mb-5">
                  <h3 class='col-md-8'>{{$zonal->names}}</h3>
                  <img src="{{asset('dist/img/location.png')}}" class='col-md-4' alt="">
                </div>
                
                <div class="mt-5 row">
                  <h3 class="col-md-6">Coordinator</h3>
                  <h3 class="col-md-6">Pastor {{$zonal->name}}</h3>
                </div>
                  
                <div class="table mt-5">
                  <tbody>
                    <tr>
                    <td>
                      <h6>AVG MONTH <br> Attendance</h6>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: 55%"> 55%</div>
                      </div>
                    </td>
                    </tr>
                  </tbody>
                </div>
                
              </div>
          </div>
            @elseif($zonalChordCount == 4)
          <div class="col-lg-3">
            <!-- small box -->
            <div class="card" style="height: 405px">
              <div class="card-body">
                <div class="row mb-5">
                  <h5 class='col-md-8'>{{$zonal->names}}</h5>
                  <img src="{{asset('dist/img/location.png')}}" class='col-md-4' alt="">
                </div>
                
                <div class="mt-5 row">
                  <h5 class="col-md-6">Coordinator</h5>
                  <h5 class="col-md-6">Pastor {{$zonal->name}}</h5>
                </div>
                  
                <div class="table mt-5">
                  <tbody>
                    <tr>
                    <td>
                      <h6>AVG MONTH <br> Attendance</h6>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: 55%"> 55%</div>
                      </div>
                    </td>
                    </tr>
                  </tbody>
                </div>
                
              </div>
          </div>
            @elseif($zonalChordCount == 5)
          <div class="col-lg-2">
            <!-- small box -->
            <div class="card" style="height: 405px">
              <div class="card-body">
                <div class="row mb-5">
                  <h6 class='col-md-8'>{{$zonal->names}}</h6>
                  <img src="{{asset('dist/img/location.png')}}" class='col-md-4' alt="">
                </div>
                
                <div class="mt-5 row">
                  <h6 class="col-md-6">Coordinator</h6>
                  <h6 class="col-md-6">Pastor {{$zonal->name}}</h6>
                </div>
                  
                <div class="table mt-5">
                  <tbody>
                    <tr>
                    <td>
                      <h6>AVG MONTH <br> Attendance</h6>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: 55%"> 55%</div>
                      </div>
                    </td>
                    </tr>
                  </tbody>
                </div>
                
              </div>
          </div>
            @endif
          </div>
          @endforeach
        </div>
        <div class="row">
            <div class="col-md-2 mr-5 ml-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Total Members</p>
                        <h3>{{$memberCount}}</h3>  
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-md-2 mr-5 ml-2">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>House Pastors</p>
                        <h3>{{$centerCount}}</h3>  
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-md-2 mr-5 ml-2">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Total Coordinators</p>
                        <h3>{{$zonalChordCount}}</h3>  
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-md-2 mr-5 ml-2">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Total Zones</p>
                        <h3>{{$zoneCount}}</h3>  
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-md-2 ml-2">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Total Centers</p>
                        <h3>{{$centerCount}}</h3>  
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
                <h3 class="card-title">Zonal Coordinators</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Home Address</th>
                    <th>Phone Number</th>
                    <th>Zone</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($zonalchords as $zonalChord)
                  <tr>
                    <td>{{$zonalChord->id}}</td>
                    <td>{{$zonalChord->name}}</td>
                    <td>{{$zonalChord->Address}}</td>
                    <td>{{$zonalChord->phone}}</td>
                    <td>Zone {{$zonalChord->zone_id}}</td>
                    <td>{{ \Carbon\Carbon::parse($zonalChord->created_at)->format('j F Y') }}</td>
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
    <!-- Page specific script -->
@endsection

