<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Special Request Form</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body>

    <div class="container">
        @if (Session::has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session::get('error') }} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h1 class='text-center'>Special Request Application Form</h1>
        <p class='text-center'> The information you provide in this form will be treated with confidentiality</p>
        <form action="{{ route('update.request', $specialRequest->id) }}" method="post">

            @csrf
            <input type="hidden" name="id" value="{{ $specialRequest->id }}">
            <fieldset disabled>

                <h6>Personal Details :</h6>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" name="fname" value='{{ $specialRequest->fname }}' class="form-control"
                            id="firstname">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lname" value='{{ $specialRequest->lname }}' class="form-control"
                            id="lastname">
                    </div>
                </div>
            </fieldset>
            <fieldset disabled>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" name="dob" value='{{ $specialRequest->dob }}' class="form-control"
                            id="dob">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="{{ $specialRequest->gender }}">{{ $specialRequest->gender }}</option>
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset disabled>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" class="form-control" value='{{ $specialRequest->phoneNo }}'
                            name="phoneNo" required>
                        <small>Format: 123-4560-7890</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="maritalStatus">Marital Status</label>
                        <select id="maritalStatus" name="maritalStatus" class="form-control">
                            <option selected value='{{ $specialRequest->maritalStatus }}'>
                                {{ $specialRequest->maritalStatus }}</option>

                        </select>
                    </div>
                </div>
            </fieldset>

            <fieldset disabled>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" value='{{ $specialRequest->address }}' name="address" id="address"
                            cols="30" rows="5">{{ $specialRequest->address }}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value='{{ $specialRequest->email }}' name="email"
                            id="email">
                    </div>

                </div>
            </fieldset>
            <fieldset disabled>

                <div class="form-row">
                    <div class="form-group icon_parent col-md-6">
                        <label for="center">Center</label>
                        <select id="center" name="center_id" class="form-select form-control"
                            aria-label="Default select example">
                            <!-- <option selected>Please select Center</option> -->
                            <option value="{{ $specialRequest->center_id }}">{{ $specialRequest->center_id }}
                            </option>
                        </select>

                        <span class="icon_soon_bottom_right"><i class="fas fa-user"></i></span>
                    </div>
                    <div class="form-group col-md-6">
                        <h6>Which best describes your attendance at CGCC</h6>
                        <div class="row">
                            <div class="form-group form-check col-md-3 ml-3">
                                <input type="radio" name="attendance" value="Frequent"
                                    {{ $specialRequest->attendance == 'Frequent' ? 'checked' : '' }}
                                    class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Frequent</label>
                            </div>
                            <div class="form-group form-check col-md-3">
                                <input type="radio" name="attendance" value="Seldom"
                                    {{ $specialRequest->attendance == 'Seldom' ? 'checked' : '' }}
                                    class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Seldom</label>
                            </div>
                            <div class="form-group form-check col-md-3">
                                <input type="radio" name="attendance" value="Never"
                                    {{ $specialRequest->attendance == 'Never' ? 'checked' : '' }}
                                    class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Never</label>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset disabled>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="row">
                            <div class="form-group form-check col-md-8">
                                <p>Have you applied for special needs before?</p>
                            </div>
                            <div class="form-group form-check col-md-2">
                                <input type="radio" name="prevApply" value="Yes"
                                    {{ $specialRequest->prevApply == 'Yes' ? 'checked' : '' }}
                                    class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Yes</label>
                            </div>
                            <div class="form-group form-check col-md-2">
                                <input type="radio" name="prevApply" value="No"
                                    {{ $specialRequest->prevApply == 'No' ? 'checked' : '' }}
                                    class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row">
                            <div class="form-group form-check col-md-8">
                                <p>Are you willing to recieve financial councelling?</p>
                            </div>
                            <div class="form-group form-check col-md-2">
                                <input type="radio" name="finCounsel" value="Yes"
                                    {{ $specialRequest->finCounsel == 'Yes' ? 'checked' : '' }}
                                    class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Yes</label>
                            </div>
                            <div class="form-group form-check col-md-2">
                                <input type="radio" name="finCounsel" value="No"
                                    {{ $specialRequest->finCounsel == 'No' ? 'checked' : '' }}
                                    class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">No</label>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>


            <div class="form-row">

                <div class="form-group col-md-6">
                    <h6>In your opinion which best describes the level of your financial situation </h6>
                    <div class="row">
                        <div class="form-group form-check col-md-6">
                            <input type="radio" name="finSituation" value="Short Term Emergency" disabled
                                {{ $specialRequest->finSituation == 'Short Term Emergency' ? 'checked' : '' }}
                                class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Short Term Emergency</label>
                        </div>
                        <div class="form-group form-check col-md-6">
                            <input type="radio" name="finSituation" value="Long Term Emergency" disabled
                                {{ $specialRequest->finSituation == 'Long Term Emergency' ? 'checked' : '' }}
                                class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Long Term Emergency</label>
                        </div>
                    </div>
                </div>


                <div class="form-group col-md-6">
                    @if($specialRequest->pastorComment == null)
                    <label for="pastorComment">CIH Pastor's Comment</label>
                    <textarea class="form-control" id="pastorComment" name="pastorComment" cols="30" rows="5" required></textarea>
                    @else
                    <label for="pastorComment">CIH Pastor's Comment</label>
                    <textarea class="form-control" id="pastorComment" name="pastorComment" cols="30" rows="5" disabled>{{$specialRequest->pastorComment}}</textarea>
                    @endif
                </div>
            </div>
            <fieldset disabled>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="totalSum">The total amount of your request is</label>
                        <input type="number" name="totalSum" value="{{ $specialRequest->totalSum }}"
                            class="form-control" id="totalSum">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="need">What did you need it for?</label>
                        <input type="text" name="need" value="{{ $specialRequest->need }}" class="form-control"
                            id="need">
                    </div>
                </div>
            </fieldset>
            <fieldset disabled>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="row">
                            <div class="form-group form-check col-md-8">
                                <p>Are you currently employed?</p>
                            </div>
                            <div class="form-group form-check col-md-2">
                                <input type="radio" name="employmentStatus" value="Yes"
                                    {{ $specialRequest->employmentStatus == 'Yes' ? 'checked' : '' }}
                                    class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Yes</label>
                            </div>
                            <div class="form-group form-check col-md-2">
                                <input type="radio" name="employmentStatus" value="No"
                                    {{ $specialRequest->employmentStatus == 'No' ? 'checked' : '' }}
                                    class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">No</label>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset disabled>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="RequestDetails">In less than 1000 words, kindly tell us exactly what your needs
                            are
                            and what led you to request assistance.</label>
                        <textarea class="form-control" id="RequestDetails" name="RequestDetails"
                            value="{{ $specialRequest->RequestDetails }}" cols="30"
                            rows="5"> {{ $specialRequest->RequestDetails }}</textarea>
                    </div>
                </div>
            </fieldset>
            <small><i> We will keep praying for you and provide counsel when needed.</i></small>
            @if($specialRequest->pastorComment == null)
            <button type="submit" class="btn btn-primary form-control">Comment</button>
            @else
            <a class="btn btn-primary form-control" href="{{route('request.stat')}}">Back</a>
            @endif
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

</html>