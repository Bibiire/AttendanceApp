@extends('zonal_coordinator.zonal_coordinator_master')
@section('zonal_coordinator')
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
            <form action="{{route('zonal_coordinator.create.feedback')}}" method="post">
                @csrf
                <input type="hidden" name="zone_id" value="{{Auth::guard('zonal_coordinator')->user()->zone_id}}">
                <div class="form-row">
                    <div class="form-group col-md-8 ml-3">
                        
                        <div class="row">
                        <h6  class="">Did any member relocate to another place?</h6>
                            <div class="form-group form-check col-md-3 ml-5">
                                <input type="radio" name="relocate" value="Yes" class="form-check-input" onclick="document.getElementById('relocate').style.display='block'">
                                <label class="form-check-label">Yes</label>
                            </div>
                            <div class="form-group form-check col-md-3">
                                <input type="radio" name="relocate" value="No" class="form-check-input" onclick="document.getElementById('relocate').style.display='none'">
                                <label class="form-check-label">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="relocate" style="display:none;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="firstname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone No</label>
                            <input type="number" name="phone" class="form-control" id="phone">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" cols="30" rows="10" class="form-control"></textarea>
                            <input type="text" name="area" id="area" placeholder="Area">
                        </div>
                    </div>
                </div>
                <hr>
                    <h6>Your first mentee is :</h6>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstMenteeName">Full Name</label>
                            <input type="text" id="firstMenteeName" class="form-control" name="firstMenteeName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="firstMenteePhone">Phone No (WhatsApp Emblemed)</label>
                            <input type="number" name="firstMenteePhone" class="form-control" id="firstMenteePhone">
                        </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstMenteeOffice">Office</label>
                                <input type="text" class="form-control" id="firstMenteeOffice" name="firstMenteeOffice"></input>
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Missionary Force Member? </h6>
                                <div class="row">
                                    <div class="form-group form-check col-md-3 ml-3">
                                        <input type="radio" name="firstMenteemfm" value="Yes" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Yes</label>
                                    </div>
                                    <div class="form-group form-check col-md-3">
                                        <input type="radio" name="firstMenteemfm" value="No" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">No</label>
                                    </div>
                                </div>

                            </div>
                    </div>
                    <h6>Your Second Mentee is :</h6> 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="secondMenteeName">Full Name</label>
                            <input type="text" id="secondMenteeName" class="form-control" name="secondMenteeName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="secondMenteePhone">Phone No (WhatsApp Emblemed)</label>
                            <input type="number" name="secondMenteePhone" class="form-control" id="secondMenteePhone">
                        </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="secondMenteeOffice">Office</label>
                                <input type="text" class="form-control" id="secondMenteeOffice" name="secondMenteeOffice">
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Missionary Force Member? </h6>
                                <div class="row">
                                    <div class="form-group form-check col-md-3 ml-3">
                                        <input type="radio" name="secondMenteemfm" value="Yes" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Yes</label>
                                    </div>
                                    <div class="form-group form-check col-md-3">
                                        <input type="radio" name="secondMenteemfm" value="No" class="form-check-input" id="exampleCheck1">
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
                                        <input type="radio" name="lackOfficer" value="Yes" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Yes</label>
                                    </div>
                                    <div class="form-group form-check col-md-2">
                                        <input type="radio" name="lackOfficer" value="No" class="form-check-input" id="exampleCheck1">
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
                                        <input type="text" name="center" class="form-control" id="exampleCheck1">
                                    </div>
                                <div class="form-group form-check col-md-4">
                                    <input type="radio" name="officer" value="House Pastor" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">House Pastor</label>
                                </div>
                                <div class="form-group form-check col-md-4">
                                    <input type="radio" name="officer" value="Prayer Secretary" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Prayer Secretary</label>
                                </div>
                                <div class="form-group form-check col-md-4">
                                    <input type="radio" name="officer" value="Welfare Secretary" class="form-check-input" id="exampleCheck1">
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
                                    <input type="radio" name="officerChange" value="Yes" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Yes</label>
                                </div>
                                <div class="form-group form-check col-md-2">
                                    <input type="radio" name="officerChange" value="No" class="form-check-input" id="exampleCheck1">
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
                                    <input type="text" name="whenWho" class="form-control" id="exampleCheck1">
                                </div>
                            </div>
                        </div>
                    </div> 
                    
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="remark">REMARK: Kindly write any issue not captured here but is urgent here. <br> (e.g. CIH center change of address or location)</label>
                        <textarea class="form-control" id="remark" name="remark" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary form-control">Submit</button> 
            </form>
            </section>
           
        </div>
        <!--/middle content wrapper-->
   
@endsection
