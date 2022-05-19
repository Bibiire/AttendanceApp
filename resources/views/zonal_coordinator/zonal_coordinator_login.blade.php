<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="{{ asset('panel/assets/images/favicon.png') }}">
    <!--Page title-->
    <title>Cih Login</title>
    <!--bootstrap-->
    <!-- <link rel="stylesheet" href="{{ asset('panel/assets/css/bootstrap.min.css') }}"> -->
    <!--font awesome-->
    <link rel="stylesheet" href="{{ asset('panel/assets/css/all.min.css') }}">
    <!-- metis menu -->
    <link rel="stylesheet" href="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css') }}">
    <!-- chart -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
    <!--Custom CSS-->
    <!-- <link rel="stylesheet" href="{{ asset('panel/assets/css/style.css') }}"> -->
    <style>
        .main{
            height: 100vh;
            background-image:url("{{asset('dist/img/bg-login.png')}}");
            
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }
        .d-row{
            box-sizing: border-box;
            padding-top:300px;
            min-height: 100vh;
            background-color: rgba(0, 0, 0, .2) !important;

        }
        .login{
            background-color: rgba(0, 0, 0, .5) !important;
            max-height: 600px;
            width: 500px;
            padding:50px 50px;
            border-radius:20px;
           
        }
        .caption{
            margin-top:50px;
            /* background-color: rgba(0, 0, 0, .2) !important; */
            
            
        }
        .caption h1{
            margin-top:30px;
            margin-left:50px;
            font-size:100px;
        } 
        .caption p{
            margin-top:30px;
            margin-left:50px;
            font-size:30px;
        } 
    </style>
</head>

<body>
<div class=" main card-img-overlay">
    <div id="overlay">
    <div class="row d-row">
        <div class="col-md-8 col-sm-4 caption text-light">
            <h1>Be a part of the <br> Citadel Family</h1>
            <p>We look forward to welcoming you <br> and fellowshipping with you!</p>
        </div>
        <div class="col-md-3 col-sm-6 login">
            <form action="{{ route('zonal_coordinator.login') }}" class="text-light" style="" method="post">
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session::get('error') }} </strong>
                        <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>
                @endif
                <h1 class='mb-4' style='font-size:50px;'>Login</h1>
                @csrf

                <div class="form-group mb-4 icon_parent">
                    <label for="username" class='mb-2' style='font-size:30px;'>User Name</label>
                    <input type="text" class="form-control mb-4 " name="username" placeholder="User Name" required>
                    <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>

                </div>
                <div class="form-group icon_parent">
                    <label for="password" class='mb-2' style='font-size:30px;'>Password</label>
                    <input type="password" class="form-control mb-4 " name="password" placeholder="Password" required>

                    <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                </div>
                <div class="form-group mb-4 ">
                    <label class="chech_container">Remember me
                        <input type="checkbox" name="remember" id="remember">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="form-group">
                    <!-- <a class="registration mb-4 " href="{{ route('cih.register') }} ">Create new
                        account</a><br> -->
                        <br>
                    <a href="" class="text-white mb-4 ">I forgot my password</a>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-warning">Login</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>


