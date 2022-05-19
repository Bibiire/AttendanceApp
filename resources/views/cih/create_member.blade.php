@extends('cih.cih_master')
@section('cih')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <!-- <li><a href="{{route('cih.create.member')}}" class="btn btn-warning">Create New Joiner</a></li> -->
              <li class="breadcrumb-item"><a href="{{route('cih.dashboard')}}" style="color:#000">New Joiner Form</a></li>
              <li class="breadcrumb-item active" style="color:#000">Report</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>  






    <section class="content">
        <!--middle content wrapper-->




        <!-- @if (Session::has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session::get('error') }} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <h8> Login Cih Pastor Name: {{ Auth::guard('cih')->user()->name }} </h8>
        <br>
        <h8> Login Cih Pastor Email: {{ Auth::guard('cih')->user()->email }} </h8> -->

        <div class="container-fluid">
            <h1 class="fw-bolder mb-5">New Joiner Application Form</h1>
            <h5 class="mb-5"><i>The information you provide in this form will be treated with confidentiality.</i></h5>
                <form action="{{ route('member.register.create') }}" method="post">
                    @csrf
                    <input type="hidden" name="center_id" value="{{ Auth::guard('cih')->user()->center_id }}">
                    <h5 class="fw-bolder mb-5">Personal Details:</h5>
                    <div class="form-row mb-5">
                       
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-row mb-5">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Date Of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="inputAddress">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Gender</label>
                            <select id="inputState" name="gender" class="form-control">
                                <option selected>Choose...</option>
                                <option value="male">Male</option>
                                <option vale="female">Female</option>

                            </select>
                        </div>

                    </div>
                    <div class="form-row mb-5">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Phone Nuumber</label>
                            <input type="tel" name="phone_number" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Marital Status</label>
                            <select name="marital_status" id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option value="married">Married</option>
                                <option value="single">Single</option>
                                <option value="divorced">Divorced</option>
                                <option value="widow">Widow</option>
                                <option value="widower">Widower</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row mb-5">
                        <div class="form-group col-md-6">
                        <label for="inputState">Position</label>
                            <select name="position" id="position" class="form-control">
                                <option selected>Choose...</option>
                                <option value="Host">Host/Hostess</option>
                                <option value="Prayer Secretary">Prayer Secretary</option>
                                <option value="Welfare Secretary">Welfare Secretary</option>
                                <option value="Member">Member</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">State of Origin</label>
                            <select name="state" id="inputState" class="form-control">
                                <option value="" selected="selected">- Select -</option>
                                <option value="Abuja FCT">Abuja FCT</option>
                                <option value="Abia">Abia</option>
                                <option value="Adamawa">Adamawa</option>
                                <option value="Akwa Ibom">Akwa Ibom</option>
                                <option value="Anambra">Anambra</option>
                                <option value="Bauchi">Bauchi</option>
                                <option value="Bayelsa">Bayelsa</option>
                                <option value="Benue">Benue</option>
                                <option value="Borno">Borno</option>
                                <option value="Cross River">Cross River</option>
                                <option value="Delta">Delta</option>
                                <option value="Ebonyi">Ebonyi</option>
                                <option value="Edo">Edo</option>
                                <option value="Ekiti">Ekiti</option>
                                <option value="Enugu">Enugu</option>
                                <option value="Gombe">Gombe</option>
                                <option value="Imo">Imo</option>
                                <option value="Jigawa">Jigawa</option>
                                <option value="Kaduna">Kaduna</option>
                                <option value="Kano">Kano</option>
                                <option value="Katsina">Katsina</option>
                                <option value="Kebbi">Kebbi</option>
                                <option value="Kogi">Kogi</option>
                                <option value="Kwara">Kwara</option>
                                <option value="Lagos">Lagos</option>
                                <option value="Nassarawa">Nassarawa</option>
                                <option value="Niger">Niger</option>
                                <option value="Ogun">Ogun</option>
                                <option value="Ondo">Ondo</option>
                                <option value="Osun">Osun</option>
                                <option value="Oyo">Oyo</option>
                                <option value="Plateau">Plateau</option>
                                <option value="Rivers">Rivers</option>
                                <option value="Sokoto">Sokoto</option>
                                <option value="Taraba">Taraba</option>
                                <option value="Yobe">Yobe</option>
                                <option value="Zamfara">Zamfara</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-5">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Home Address</label>
                            <textarea name="home_address" id="" cols="30" rows="10" class="form-control"></textarea>
                            {{-- <input type="text" class="form-control" id="inputCity"> --}}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Email Address</label>
                            <input type="email" name="email" class="form-control" id="inputPassword4">

                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary form-control">Create Member</button>
                </form>
            <!--/ counter_area -->
            <!-- table area -->

        </div>
        <!--/middle content wrapper-->
    </section>
    <!--/ content wrapper -->
@endsection
