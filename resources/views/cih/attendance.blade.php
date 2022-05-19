@extends('cih.cih_master')
@section('datatablesCss')
<link rel="stylesheet" href="{{asset('plugins/fullcalendar/main.css')}}">
@endsection
@section('cih')
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
          <h2>Welcome Pastor {{ Auth::guard('cih')->user()->full_name }}</h2>
          <p>Here’s what is happening in your Center today.</p>
      </div>
      <div class="col-sm-3 mx-3">
          <h2>{{$center->name}}</h2>
          <h4>{{$zone->name}}</h4>
      </div>


    </div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- general form elements disabled -->
      <div class="card card-warning col-8">
        <div class="card-header row" style="background-color: #fff !important;">
          <h1 class="card-title col-sm-8">Attendance and Activity Reporting</h1>
          <a href="{{route('cih.create.member')}}" class="btn col-sm-2"><img src="{{asset('dist/img/frame9.png')}}" alt="" width='100%'></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="{{ route('cih.attendance.create') }}" method="post">
            @csrf
            <input type="hidden" name="center_id" value="{{ Auth::guard('cih')->user()->center_id }}">
            <div class="row">
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="activity" value="Power Week" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Power Week <br> (First Saturday)</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="activity" value="Edification Saturday" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Edification Saturday <br> (Second Saturday)</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="activity" value="Share | Caring & Communication" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Share | Caring & Communication <br> (Third Saturday)</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="activity" value="Outreach" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Outreach <br> (Forth Saturday)</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="activity" value="Empowerment Saturday" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Empowerment Saturday <br> (Fifth Saturday)</label>
                </div>
              </div>
            </div>
            <hr>
            <div>
              <h6>Female Attendance</h6>
              <div class="form-group form-inline ">
                <label for="">Adult</label>
                <input type="number" class="form-control mx-4" name="femaleAdult" value='0' id="femaleAdult" style="width:100px">
                <label for="">Youth</label>
                <input type="number" class="form-control mx-4" name="femaleYouth" value='0' id="femaleYouth" style="width:100px">
                <label for="">Teenager</label>
                <input type="number" class="form-control mx-4" name="femaleTeen" value='0' id="femaleTeen" style="width:100px">
                <label for="">Children</label>
                <input type="number" class="form-control mx-4" name="femaleChild" value='0' id="femaleChild" style="width:100px">
              </div>
            </div>
            <div>
              <h6>Male Attendance</h6>
              <div class="form-group form-inline ">
                <label for="">Adult</label>
                <input type="number" class="form-control mx-4" name="maleAdult" value='0' id="maleAdult" style="width:100px">
                <label for="">Youth</label>
                <input type="number" class="form-control mx-4" name="maleYouth" value='0' id="maleYouth" style="width:100px">
                <label for="">Teenager</label>
                <input type="number" class="form-control mx-4" name="maleTeen" value='0' id="maleTeen" style="width:100px">
                <label for="">Children</label>
                <input type="number" class="form-control mx-4" name="maleChild" value='0' id="maleChild" style="width:100px">
              </div>
            </div>
            <div class="row">
              <h6 class="col-md-4">Did your zone Coordinator visit you?</h6>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="visit" value="Yes" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Yes</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="visit" value="No" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">No</label>
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleCheck1">Meeting Started At:</label>
                  <input type="text" name="startTime" class="form-control" id="exampleCheck1">

                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleCheck1">Meeting Ended At:</label>
                  <input type="text" name="endTime" class="form-control" id="exampleCheck1">
                </div>
              </div>
            </div>
            <div class="row">
              <h6 class="col-md-4">Was your gathering Covid-19 Compliant?</h6>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="covid" value="Yes" class="form-check-input" id="exampleCheck1" onclick="document.getElementById('covid').style.display='none'">
                  <label class="form-check-label" for="exampleCheck1">Yes</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group form-check">
                  <input type="radio" name="covid" value="No" class="form-check-input" id="exampleCheck1" onclick="document.getElementById('covid').style.display='block'">
                  <label class="form-check-label" for="exampleCheck1">No</label>
                </div>
              </div>
            </div>
            <div class="row" id="covid" style='display:none'>
              <div class="form-group col-md-10">
                <label for="validationTextarea">Why</label>
                <textarea class="form-control" name="covidReason" id="validationTextarea"></textarea>

              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-10">
                <label for="validationTextarea">State Of the Flock</label>
                <textarea class="form-control" name="stateOfFlock" id="validationTextarea" required></textarea>

              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-10">
                <label for="validationTextarea">Final Remark</label>
                <textarea class="form-control" name="finalRemark" id="validationTextarea" required></textarea>

              </div>
            </div>
            <h1 class="text-center">Attendance</h1>
            <br>
            <div class='row'>
              @foreach($members as $member)
              <div class="col-md-2">
                <div class="card" style="">
                  @if($member->gender == 'male')
                  <img src="{{asset('dist/img/avatar5.png')}}" class="card-img-top" style='' alt="...">
                  @else
                  <img src="{{asset('dist/img/avatar3.png')}}" class="card-img-top" alt="...">
                  @endif
                  <h6 class=" text-center text-bold mt-3">{{$member->family_name}} {{$member->other_name}}</h6>
                  <div class="card-body row">
                    <br>
                    @if($member->gender == 'male' && $member->age_band == 'Adult')
                    <a class="btn btn-success presentMA  col-md-12" id='presentMA{{$member->id}}' onclick='callMAP({{$member->id}})' style='display:block'>P</a>
                    <a class="btn btn-danger AbsentMA col-md-12" id='AbsentMA{{$member->id}}' onclick='callMAA({{$member->id}})' style='display:none'>A</a>
                    @elseif($member->gender == 'Female' && $member->age_band == 'Adult')
                    <a class="btn btn-success col-md-12" id='presentFA{{$member->id}}' onclick='callFAP({{$member->id}})' style='display:block'>P</a>
                    <a class="btn btn-danger col-md-12" id='AbsentFA{{$member->id}}' onclick='callFAA({{$member->id}})' style='display:none'>A</a>
                    @elseif($member->gender == 'male' && $member->age_band == 'Youth')
                    <a class="btn btn-success col-md-12" id='presentMY{{$member->id}}' onclick='callMYP({{$member->id}})' style='display:block'>P</a>
                    <a class="btn btn-danger col-md-12" id='AbsentMY{{$member->id}}' onclick='callMYA({{$member->id}})' style='display:none'>A</a>
                    @elseif($member->gender == 'Female' && $member->age_band == 'Youth')
                    <a class="btn btn-success col-md-12" id='presentFY{{$member->id}}' onclick='callFYP({{$member->id}})' style='display:block'>P</a>
                    <a class="btn btn-danger col-md-12" id='AbsentFY{{$member->id}}' onclick='callFYA({{$member->id}})' style='display:none'>A</a>
                    @elseif($member->gender == 'male' && $member->age_band == 'Teen')
                    <a class="btn btn-success col-md-12" id='presentMT{{$member->id}}' onclick='callMTP({{$member->id}})' style='display:block'>P</a>
                    <a class="btn btn-danger col-md-12" id='AbsentMT{{$member->id}}' onclick='callMTA({{$member->id}})' style='display:none'>A</a>
                    @elseif($member->gender == 'Female' && $member->age_band == 'Teen')
                    <a class="btn btn-success col-md-12" id='presentFT{{$member->id}}' onclick='callFTP({{$member->id}})' style='display:block'>P</a>
                    <a class="btn btn-danger col-md-12" id='AbsentFT{{$member->id}}' onclick='callFTA({{$member->id}})' style='display:none'>A</a>
                    @elseif($member->gender == 'male' && $member->age_band == 'Child')
                    <a class="btn btn-success col-md-12" id='presentMC{{$member->id}}' onclick='callMCP({{$member->id}})' style='display:block'>P</a>
                    <a class="btn btn-danger col-md-12" id='AbsentMC{{$member->id}}' onclick='callMCA({{$member->id}})' style='display:none'>A</a>
                    @elseif($member->gender == 'Female' && $member->age_band == 'Child')
                    <a class="btn btn-success col-md-12" id='presentFC{{$member->id}}' onclick='callFCP({{$member->id}})' style='display:block'>P</a>
                    <a class="btn btn-danger col-md-12" id='AbsentFC{{$member->id}}' onclick='callFCA({{$member->id}})' style='display:none'>A</a>
                    @endif
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <button type="submit" class="btn btn-warning form-control">Submit</button>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="col-sm-4">
        <div>
          <div class="card bg-secondary" style="">
            <img src="{{ !empty($cih->profile_image) ? url('upload/cih_images/' . $cih->profile_image) : url('upload/no_image.jpeg') }}" class="card-img-top img-circle pt-4" style="width:200px !important; margin: 0 auto" alt="profile">
            <div class="card-body">
              <h3 class="text-center text-dark text-uppercase">Pastor {{$cih->full_name}}</h3>
            </div>
          </div>
          <div>
            <div class="row">
              @if($host != null)
              <h5 class="col-md-4" style='text-align:right'>Host/Hostess: </h5>
              <p class="col-md-8">{{$host->family_name}} {{$host->other_name}}</p>
              @endif
              @if($ps != null)
              <h5 class="col-md-4" style='text-align:right'>Prayer Secretary: </h5>
              <p class="col-md-8">{{$ps->family_name}} {{$ps->other_name}}</p>
              @endif
              @if($ws != null)
              <h5 class="col-md-4" style='text-align:right'>Welfare Secretary: </h5>
              <p class="col-md-8">{{$ws->family_name}} {{$ws->other_name}}</p>
              @endif

              <h5 class="col-md-4" style='text-align:right'>Location: </h5>
              <p class="col-md-8">{{$center->location}}</p>
              <h5 class="col-md-4" style='text-align:right'>Zone: </h5>
              <p class="col-md-8">Zone {{$center->zone_id}}</p>
            </div>

          </div>
        </div>
        <div class="card card-primary">
          <div class="card-body p-0">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>

    </div>
  </div>
</section>


@endsection
@section('datatableJs')
<script src="{{asset('plugins/fullcalendar/main.js')}}"></script>
<script>
  $(function() {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function() {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0 //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    // var Draggable = FullCalendar.Draggable;

    // var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    // new Draggable(containerEl, {
    //   itemSelector: '.external-event',
    //   eventData: function(eventEl) {
    //     return {
    //       title: eventEl.innerText,
    //       backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
    //       borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
    //       textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
    //     };
    //   }
    // });

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [

      ],
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function(e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color': currColor
      })
    })
    $('#add-new-event').click(function(e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color': currColor,
        'color': '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
<script>
  function callMAP(id) {
    let mA = document.querySelector('#maleAdult');
    mA.value = parseInt(mA.value) + 1;
    document.getElementById(`presentMA${id}`).style.display='none';
    document.getElementById(`AbsentMA${id}`).style.display='block';
    console.log(fA);
    console.log(id)
    alert(id);
  }
  function callMAA(id) {
    let mA = document.querySelector('#maleAdult');
    mA.value = parseInt(mA.value) - 1;
    document.getElementById(`presentMA${id}`).style.display='block';
    document.getElementById(`AbsentMA${id}`).style.display='none';
    console.log(fA);
    console.log(id)
    alert(id);
  }
</script>
<script>
  function callFAP(id) {
    let fA = document.querySelector('#femaleAdult');
    fA.value = parseInt(fA.value) + 1;
    document.getElementById(`presentFA${id}`).style.display='none';
    document.getElementById(`AbsentFA${id}`).style.display='block';
    console.log(fA);
    console.log(id);
    alert(id);
  }
  function callFAA(id) {
    let fA = document.querySelector('#femaleAdult');
    fA.value = parseInt(fA.value) - 1;
    document.getElementById(`presentFA${id}`).style.display='block';
    document.getElementById(`AbsentFA${id}`).style.display='none';
    console.log(fA);
    console.log(id);
    alert(id);
  }
</script>
<script>
  function callMYP(id) {
    let mY = document.querySelector('#maleYouth');
    mY.value = parseInt(mY.value) + 1;
    document.getElementById(`presentMY${id}`).style.display='none';
    document.getElementById(`AbsentMY${id}`).style.display='block';
    console.log(mY);
    console.log(id);
    alert(id);
  }
  function callMYA(id) {
    let mY = document.querySelector('#maleYouth');
    mY.value = parseInt(mY.value) - 1;
    document.getElementById(`presentMY${id}`).style.display='block';
    document.getElementById(`AbsentMY${id}`).style.display='none';
    console.log(mY);
    console.log(id);
    alert(id);
  }
</script>
<script>
  function callFYP(id) {
    let fY = document.querySelector('#femaleYouth');
    fY.value = parseInt(fY.value) + 1;
    document.getElementById(`presentFY${id}`).style.display='none';
    document.getElementById(`AbsentFY${id}`).style.display='block';
    console.log(fY);
    console.log(id);
    alert(id);
  }
  function callFYA(id) {
    let fY = document.querySelector('#femaleYouth');
    fY.value = parseInt(fY.value) - 1;
    document.getElementById(`presentFY${id}`).style.display='block';
    document.getElementById(`AbsentFY${id}`).style.display='none';
    console.log(fY);
    console.log(id);
    alert(id);
  }
</script>
<script>
  function callMTP(id) {
    let mT = document.querySelector('#maleTeen');
    mT.value = parseInt(mT.value) + 1;
    document.getElementById(`presentMT${id}`).style.display='none';
    document.getElementById(`AbsentMT${id}`).style.display='block';
    console.log(mT);
    console.log(id);
    alert(id);
  }
  function callMTA(id) {
    let mT = document.querySelector('#maleTeen');
    mT.value = parseInt(mT.value) - 1;
    document.getElementById(`presentMT${id}`).style.display='block';
    document.getElementById(`AbsentMT${id}`).style.display='none';
    console.log(mT);
    console.log(id);
    alert(id);
  }
</script>
<script>
  function callFTP(id) {
    let fT = document.querySelector('#femaleTeen');
    fT.value = parseInt(fT.value) + 1;
    document.getElementById(`presentFT${id}`).style.display='none';
    document.getElementById(`AbsentFT${id}`).style.display='block';
    console.log(fT);
    console.log(id);
    alert(id);
  }
  function callFTA(id) {
    let fT = document.querySelector('#femaleTeen');
    fT.value = parseInt(fT.value) - 1;
    document.getElementById(`presentFT${id}`).style.display='block';
    document.getElementById(`AbsentFT${id}`).style.display='none';
    console.log(fT);
    console.log(id);
    alert(id);
  }
</script>
<script>
  function callMCP(id) {
    let mC = document.querySelector('#maleChild');
    mC.value = parseInt(mC.value) + 1;
    document.getElementById(`presentMC${id}`).style.display='none';
    document.getElementById(`AbsentMC${id}`).style.display='block';
    console.log(mC);
    console.log(id);
    alert(id);
  }
  function callMCA(id) {
    let mC = document.querySelector('#maleChild');
    mC.value = parseInt(mC.value) - 1;
    document.getElementById(`presentMC${id}`).style.display='block';
    document.getElementById(`AbsentMC${id}`).style.display='none';
    console.log(mC);
    console.log(id);
    alert(id);
  }
</script>
<script>
  function callFCP(id) {
    let fC = document.querySelector('#femaleChild');
    fC.value = parseInt(fC.value) + 1;
    document.getElementById(`presentFC${id}`).style.display='none';
    document.getElementById(`AbsentFC${id}`).style.display='block';
    console.log(fC);
    console.log(id);
    alert(id);
  }
  function callFCA(id) {
    let fC = document.querySelector('#femaleChild');
    fC.value = parseInt(fC.value) - 1;
    document.getElementById(`presentFC${id}`).style.display='block';
    document.getElementById(`AbsentFC${id}`).style.display='none';
    console.log(fC);
    console.log(id);
    alert(id);
  }
</script>

<script>
  
  

  
</script>


@endsection