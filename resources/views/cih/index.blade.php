@extends('cih.cih_master')
@section('datatablesCss')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('cih')

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
            <div class="alert alert-success alert-dismissible fade show" role="alert">
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
            <div class="small-box ">
              <div class="inner">
                @if($attendance != null)
                <h3>{{$attendance->totalAttendance}}</h3>
                @else
                <h3>0</h3>
                @endif
                <p>Total Visits Today</p>
                <img src="{{asset('dist/img/Vector 5.png')}}" width='500px' alt="">
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box">
              <div class="inner">
                @if($newJoinerCount != null)
                <h3>{{$newJoinerCount}}</h3>
                @else
                <h3>0</h3>
                @endif
                <p>Total New Joiner</p>
                <img src="{{asset('dist/img/Vector 6.png')}}" width='500px' alt="">
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box">
              <div class="inner">
                <h3>{{$averagePopulation}}</h3>
                <p>Average Population</p>
                <img src="{{asset('dist/img/Vector 5.png')}}" width='500px' alt="">
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
                <h3 class="card-title">Members</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a class="btn btn-secondary" href="{{route('import-view')}}">Import/Export Members</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Home Address</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                 <tbody>
                   @foreach($members as $member)
                   <tr>
                     <td>{{$member->id}}</td>
                     <td>{{$member->family_name}}</td>
                     <td>{{$member->other_name}}</td>
                     <td>{{$member->home_address}}</td>
                     <td>{{$member->phone_number}}</td>
                     <td><a href="{{route('cih.view.member', $member->id)}}" class='btn btn-secondary'>View Details</a></td>
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
@endsection
