@extends('team_lead.team_lead_master')
@section('datatablesCss')
<link rel="stylesheet" href="{{asset('plugins/fullcalendar/main.css')}}">
@endsection
@section('team_lead')
<!--/ content wrapper -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Report</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <!-- <li><a href="{{route('cih.create.member')}}" class="btn btn-warning">Create New Joiner</a></li> -->
          <li class="breadcrumb-item"><a href="{{route('cih.dashboard')}}" style="color:#000">Dashboard</a></li>
          <li class="breadcrumb-item active" style="color:#000">Report</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <div class="row">
      <div class="col-sm-8 mx-3">
          <h2>Welcome Pastor {{ Auth::guard('team_lead')->user()->name }}</h2>
          <p>Here’s what is happening in your Center today.</p>
      </div>
      <div class="col-sm-3 mx-3">
          
      </div>


    </div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- general form elements disabled -->
      <div class="card card-warning col-8">
        <div class="card-header row" style="background-color: #fff !important;">
          <h1 class="card-title col-sm-8">Attendance and Activity Reporting</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form >
              <fieldset disabled>

              
            <div class="row">
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="activity" value="Power Week" {{ $attendance->activity == 'Power Week' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Power Week <br> (First Saturday)</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="activity" value="Edification Saturday" {{ $attendance->activity == 'Edification Saturday' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Edification Saturday <br> (Second Saturday)</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="activity" value="Share | Caring & Communication" {{ $attendance->activity == 'Share | Caring & Communication' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Share | Caring & Communication <br> (Third Saturday)</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="activity" value="Outreach" {{ $attendance->activity == 'Outreach' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Outreach <br> (Forth Saturday)</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="activity" value="Empowerment Saturday" {{ $attendance->activity == 'Empowerment Saturday' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Empowerment Saturday <br> (Fifth Saturday)</label>
                </div>
              </div>
            </div>
            <hr>
            <div>
              <h6>Female Attendance</h6>
              <div class="form-group form-inline ">
                <label for="">Adult</label>
                <input type="number" class="form-control mx-4" name="femaleAdult" value='{{$attendance->femaleAdult}}' id="femaleAdult" style="width:100px">
                <label for="">Youth</label>
                <input type="number" class="form-control mx-4" name="femaleYouth" value='{{$attendance->femaleYouth}}' id="femaleYouth" style="width:100px">
                <label for="">Teenager</label>
                <input type="number" class="form-control mx-4" name="femaleTeen" value='{{$attendance->femaleTeen}}' id="femaleTeen" style="width:100px">
                <label for="">Children</label>
                <input type="number" class="form-control mx-4" name="femaleChild" value='{{$attendance->femaleChild}}' id="femaleChild" style="width:100px">
              </div>
            </div>
            <div>
              <h6>Male Attendance</h6>
              <div class="form-group form-inline ">
                <label for="">Adult</label>
                <input type="number" class="form-control mx-4" name="maleAdult" value='{{$attendance->femaleAdult}}' id="maleAdult" style="width:100px">
                <label for="">Youth</label>
                <input type="number" class="form-control mx-4" name="maleYouth" value='{{$attendance->femaleAdult}}' id="maleYouth" style="width:100px">
                <label for="">Teenager</label>
                <input type="number" class="form-control mx-4" name="maleTeen" value='{{$attendance->femaleAdult}}' id="maleTeen" style="width:100px">
                <label for="">Children</label>
                <input type="number" class="form-control mx-4" name="maleChild" value='{{$attendance->femaleAdult}}' id="maleChild" style="width:100px">
              </div>
            </div>
            <div class="row">
              <h6 class="col-md-4">Did your zone Coordinator visit you?</h6>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="visit" value="Yes" {{ $attendance->visit == 'Yes' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Yes</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="visit" value="No" {{ $attendance->activity == 'No' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">No</label>
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleCheck1">Meeting Started At:</label>
                  <input type="text" name="startTime" value='{{$attendance->startTime}}'  class="form-control" id="exampleCheck1">

                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleCheck1">Meeting Ended At:</label>
                  <input type="text" name="endTime" value='{{$attendance->endTime}}' class="form-control" id="exampleCheck1">
                </div>
              </div>
            </div>
            <div class="row">
              <h6 class="col-md-4">Was your gathering Covid-19 Compliant?</h6>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="covid" value="Yes" {{ $attendance->covid == 'Yes' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" >
                  <label class="form-check-label" for="exampleCheck1">Yes</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="covid" value="No" {{ $attendance->covid == 'No' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" >
                  <label class="form-check-label" for="exampleCheck1">No</label>
                </div>
              </div>
            </div>
            <div class="row" id="covid">
              <div class="form-group col-md-12">
                <label for="validationTextarea">Why</label>
                <textarea class="form-control" name="covidReason" value='{{$attendance->covidReason}}' id="validationTextarea">{{$attendance->covidReason}}</textarea>

              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="validationTextarea">State Of the Flock</label>
                <textarea class="form-control" name="stateOfFlock" value='{{$attendance->stateOfFlock}}' id="validationTextarea" required>{{$attendance->stateOfFlock}}</textarea>

              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="validationTextarea">Final Remark</label>
                <textarea class="form-control" name="finalRemark" value='{{$attendance->finalRemark}}' id="validationTextarea" required>{{$attendance->finalRemark}}</textarea>

              </div>
            </div>
            <!-- <button type="submit" class="btn btn-warning form-control">Submit</button> -->
            </fieldset>
          </form>
          <a class="btn btn-outline-primary" href="{{route('house.reports')}}">Back</a>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      

    </div>
  </div>
</section>


@endsection
@section('datatableJs')

@endsection