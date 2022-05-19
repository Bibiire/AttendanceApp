@extends('zonal_coordinator.zonal_coordinator_master')
@section('datatablesCss')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('zonal_coordinator')

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
          <h2>Welcome Pastor {{ Auth::guard('zonal_coordinator')->user()->name }}</h2>
          <p>Here’s what is happening in your Center today.</p>
      </div>
      <div class="col-sm-3 mx-3">
        
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
      <div class="" >
        <div class="card-body pb-0" >
          <div class="row" >
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-center flex-column" style="width:100%; margin: 0 auto">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header h3 text-dark border-bottom-0">
                  {{$member->position}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{ $member->family_name}}  {{$member->other_name}}</b></h2>
                      <p class="  text-dark text-capitalize"><b>Gender: </b>  {{$member->gender}} </p>
                      <ul class="ml-4 mb-0 fa-ul text-dark">
                        <li class="small text-dark"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{$member->home_address}}</li>
                        <li class="small text-dark"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$member->phone_number}}</li>
                        <li class="small text-dark"><span class="fa-li"><i class="fas fa-lg fa-at"></i></span> email: {{$member->email}}</li>
                        <li class="small text-dark"><span class="fa-li"><i class="fas fa-lg fa-smile"></i></span> Age Band: {{$member->age_band}} </li>
                        <li class="small text-dark"><span class="fa-li"><i class="fas fa-globe"></i></span> State Of Origin: {{$member->stateOfOrigin}}</li>
                        <li class="small text-dark"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> Date Of Birth: {{$member->date_of_birth}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                        @if($member->gender == 'male')
                            <img src="{{asset('dist/img/avatar5.png')}}" alt="user-avatar" class="img-circle img-fluid">
                        @else
                            <img src="{{asset('dist/img/avatar3.png')}}" alt="user-avatar" class="img-circle img-fluid">
                        @endif
                    </div>
                  </div>
                </div>
            
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
@section('datatableJs')
 
@endsection
