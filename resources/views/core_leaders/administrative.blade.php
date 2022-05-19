@extends('core_leaders.core_leaders_master')
@section('datatablesCss')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
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
        <!-- Main row -->
        <div class="row">
        <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Welfare Secretary</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Family Name</th>
                    <th>Other Names</th>
                    <th>Phone</th>
                    <th>Team</th>
                    <th>Zone</th>
                    <th>Center</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($welfareSec as $welfareSec)
                  <tr>
                    <td>{{$welfareSec->id}}</td>
                    <td>{{$welfareSec->family_name}}</td>
                    <td>{{$welfareSec->other_name}}</td>
                    <td>{{$welfareSec->phone_number}}</td>
                    <td>{{$welfareSec->nam}}</td>
                    <td>{{$welfareSec->names}}</td>
                    <td>{{$welfareSec->name}}</td>
                    <td>
                      <a href="" class="btn btn-secondary">View Details</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>S/N</th>
                    <th>Family Name</th>
                    <th>Other Names</th>
                    <th>Phone</th>
                    <th>Team</th>
                    <th>Zone</th>
                    <th>Center</th>
                    <th>Action</th>
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
      <div class="cotainer-fluid mt-5">
          <div class="row">
        <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Prayer Secretary</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Family Name</th>
                    <th>Other Names</th>
                    <th>Phone</th>
                    <th>Team</th>
                    <th>Zone</th>
                    <th>Center</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($prayerSec as $prayerSec)
                  <tr>
                    <td>{{$prayerSec->id}}</td>
                    <td>{{$prayerSec->family_name}}</td>
                    <td>{{$prayerSec->other_name}}</td>
                    <td>{{$prayerSec->phone_number}}</td>
                    <td>{{$prayerSec->nam}}</td>
                    <td>{{$prayerSec->names}}</td>
                    <td>{{$prayerSec->name}}</td>
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
      </div>
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
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            
        });
    </script>
   
@endsection
