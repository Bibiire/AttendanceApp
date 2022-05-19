@extends('admin.admin_master')
@section('datatablesCss')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('admin')
<!--/ content wrapper -->
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
    <!-- /.content-header -->
    @if (Session::has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session::get('error') }} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

    <div class="row">
      <div class="col-sm-8 mx-3">
          <h2>Welcome Pastor {{ Auth::guard('admin')->user()->name }}</h2>
          <p>Here’s your activity.</p>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box ">
              <div class="inner">
                <h3></h3>
                <p>Total Visits Today</p>
                <!-- <img src="{{asset('dist/img/Vector 5.png')}}" width='500px' alt=""> -->
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box">
              <div class="inner">
                <h3></h3>
                <p>Total New Joiner</p>
                <!-- <img src="{{asset('dist/img/Vector 6.png')}}" width='500px' alt=""> -->
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box">
              <div class="inner">
                <h3></h3>
                <p>Average Population</p>
                <!-- <img src="{{asset('dist/img/Vector 5.png')}}" width='500px' alt=""> -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-lg-4 col-md-12">
                
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Center</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- <a class="btn btn-secondary" href="{{route('import-view')}}">Import/Export Members</a> -->
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Location</th>
                        
                        <!-- <th>Action</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($centers as $center)
                    <tr>
                        <td>{{$center->id}}</td>
                        <td>{{$center->name}}</td>
                        <td>{{$center->location}}</td>
                        
                        
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                    <th>S/N</th>
                        <!-- <th>First Name</th> -->
                        <th>Name</th>
                        <th>Location</th>
                        <!-- <th>Action</th> -->
                    </tr>
                    </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Zone</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- <a class="btn btn-secondary" href="{{route('import-view')}}">Import/Export Members</a> -->
                    <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <!-- <th>Location</th> -->
                        
                        <!-- <th>Action</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($zones as $zone)
                    <tr>
                        <td>{{$zone->id}}</td>
                        <td>{{$zone->names}}</td>
                        <!-- <td>{{$zone->location}}</td> -->
                        
                        
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                    <th>S/N</th>
                        <!-- <th>First Name</th> -->
                        <th>Name</th>
                        <!-- <th>Location</th> -->
                        <!-- <th>Action</th> -->
                    </tr>
                    </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Team</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- <a class="btn btn-secondary" href="{{route('import-view')}}">Import/Export Members</a> -->
                    <table id="example3" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <!-- <th>Location</th> -->
                        
                        <!-- <th>Action</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                    <tr>
                        <td>{{$team->id}}</td>
                        <td>{{$team->nam}}</td>
                        <!-- <td>{{$zone->location}}</td> -->
                        
                        
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                    <th>S/N</th>
                        <!-- <th>First Name</th> -->
                        <th>Name</th>
                        <!-- <th>Location</th> -->
                        <!-- <th>Action</th> -->
                    </tr>
                    </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
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
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            
            $('#example3').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');

           
        });
    </script>
@endsection