@extends('team_lead.team_lead_master')
@section('team_lead')
    <!--/ content header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0">Dashboard</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color:#000">Home</a></li>
                    <li class="breadcrumb-item active" style="color:#000">feedback</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <!-- counter_area -->
            <section class="container-fluid">
            <h1 class='text-center'>CIH OPERATIONS UNIT MONTHLY <br> FEEDBACK / MONITORING REPORT. </h1>
            <p class='text-center'> The information you provide in this form will be treated with confidentiality</p>
            <form>
                <fieldset disabled>

               
                @csrf
                
                <div class="form-row">
                    <div class="form-group col-md-8 ml-3">
                        
                        <div class="row">
                        <h6  class="">Did any member relocate to another place?</h6>
                            <div class="form-group form-check col-md-3 ml-5">
                                <input type="radio" name="relocate" value="Yes" {{ $report->relocate == 'Yes' ? 'checked' : '' }} class="form-check-input" onclick="document.getElementById('relocate').style.display='block'">
                                <label class="form-check-label">Yes</label>
                            </div>
                            <div class="form-group form-check col-md-3">
                                <input type="radio" name="relocate" value="No" {{ $report->relocate == 'No' ? 'checked' : '' }} class="form-check-input" onclick="document.getElementById('relocate').style.display='none'">
                                <label class="form-check-label">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="relocate">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" value="{{ $report->firstname }}" class="form-control" id="firstname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" value="{{ $report->lastname }}" class="form-control" id="lastname">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone No</label>
                            <input type="number" name="phone" value="{{ $report->phone_number }}" class="form-control" id="phone">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" cols="30" rows="10" class="form-control">{{ $report->home_address }}</textarea>
                            <input type="text" name="area" id="area" placeholder="Area">
                        </div>
                    </div>
                </div>
                <hr>
                    <h6>Your first mentee is :</h6>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstMenteeName">Full Name</label>
                            <input type="text" id="firstMenteeName" value="{{ $report->firstMenteeName }}" class="form-control" name="firstMenteeName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="firstMenteePhone">Phone No (WhatsApp Emblemed)</label>
                            <input type="number" name="firstMenteePhone" value="{{ $report->firstMenteePhone }}" class="form-control" id="firstMenteePhone">
                        </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstMenteeOffice">Office</label>
                                <input type="text" class="form-control" value="{{ $report->firstMenteeOffice }}" id="firstMenteeOffice" name="firstMenteeOffice"></input>
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Missionary Force Member? </h6>
                                <div class="row">
                                    <div class="form-group form-check col-md-3 ml-3">
                                        <input type="radio" name="firstMenteemfm" value="Yes" {{ $report->firstMenteemfm == 'Yes' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Yes</label>
                                    </div>
                                    <div class="form-group form-check col-md-3">
                                        <input type="radio" name="firstMenteemfm" value="No" {{ $report->firstMenteemfm == 'No' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">No</label>
                                    </div>
                                </div>

                            </div>
                    </div>
                    <h6>Your Second Mentee is :</h6> 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="secondMenteeName">Full Name</label>
                            <input type="text" id="secondMenteeName" value="{{ $report->RequestDetails }}" class="form-control" name="secondMenteeName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="secondMenteePhone">Phone No (WhatsApp Emblemed)</label>
                            <input type="number" name="secondMenteePhone" value="{{ $report->RequestDetails }}" class="form-control" id="secondMenteePhone">
                        </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="secondMenteeOffice">Office</label>
                                <input type="text" class="form-control" id="secondMenteeOffice" value="{{ $report->RequestDetails }}" name="secondMenteeOffice">
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Missionary Force Member? </h6>
                                <div class="row">
                                    <div class="form-group form-check col-md-3 ml-3">
                                        <input type="radio" name="secondMenteemfm" value="Yes" {{ $report->employmentStatus == 'No' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Yes</label>
                                    </div>
                                    <div class="form-group form-check col-md-3">
                                        <input type="radio" name="secondMenteemfm" value="No" {{ $report->employmentStatus == 'No' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">No</label>
                                    </div>
                                </div>

                            </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="row">
                                <div class="form-group form-check col-md-12">
                                    <p>	Is any of your centers lacking CIH officer(s)? </p>
                               
                                    <div class="form-group form-check col-md-2">
                                        <input type="radio" name="lackOfficer" value="Yes" {{ $report->lackOfficer == 'Yes' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Yes</label>
                                    </div>
                                    <div class="form-group form-check col-md-2">
                                        <input type="radio" name="lackOfficer" value="No" {{ $report->lackOfficer == 'No' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">No</label>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row">
                            <div class="form-group form-check col-md-6">
                                <p>If yes, which center and the “WHO” officer?</p>
                                </div>
                                    <div class="form-group form-check col-md-6">
                                        <input type="text" name="center" class="form-control" value="{{ $report->center }}" id="exampleCheck1">
                                    </div>
                                <div class="form-group form-check col-md-4">
                                    <input type="radio" name="officer" value="House Pastor" {{ $report->officer == 'House Pastor' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">House Pastor</label>
                                </div>
                                <div class="form-group form-check col-md-4">
                                    <input type="radio" name="officer" value="Prayer Secretary" {{ $report->officer == 'Prayer Secretary' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Prayer Secretary</label>
                                </div>
                                <div class="form-group form-check col-md-4">
                                    <input type="radio" name="officer" value="Welfare Secretary" {{ $report->officer == 'Welfare Secretary' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Welfare Secretary</label>
                                </div>
                            </div>
                        </div>
                    </div> 
                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="form-group form-check col-md-8">
                                    <p>	Do you wish to change any “WHO” officer? </p>
                                </div>
                                <div class="form-group form-check col-md-2">
                                    <input type="radio" name="officerChange" value="Yes" {{ $report->officerChange == 'Yes' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Yes</label>
                                </div>
                                <div class="form-group form-check col-md-2">
                                    <input type="radio" name="officerChange" value="No" {{ $report->officerChange == 'No' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">No</label>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="form-group form-check col-md-6">
                                    <p>If yes,when and who?</p>
                                </div>
                                <div class="form-group form-check col-md-6">
                                    <input type="text" name="whenWho" value="{{ $report->whenWho }}" class="form-control" id="exampleCheck1">
                                </div>
                            </div>
                        </div>
                    </div> 
                    
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="remark">REMARK: Kindly write any issue not captured here but is urgent here. <br> (e.g. CIH center change of address or location)</label>
                        <textarea class="form-control" id="remark" name="remark" cols="30" rows="5">{{ $report->remark }}</textarea>
                    </div>
                </div>
                </fieldset>
                <a type="submit" class="btn btn-primary" href="{{route('zone.report')}}">Back</a> 
            </form>
            </section>
           
        </div>
        <!--/middle content wrapper-->
   
@endsection
