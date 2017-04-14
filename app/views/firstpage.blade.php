<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('bootstrap/css/materialize.min.css')}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/respond.js"></script>
    
    <style type="text/css">
        .slider .indicators .indicator-item {
            display: none;
        }

        .btn{
            position: absolute;
            z-index: 2;
            left: 42%;
            width: 15%;
            margin-top: 20%;
        }

    </style>
</head>

<body>


<section style="position:relative;z-index:1;">
    <div class="slider">
        <ul class="slides">
          <li>
            <img src="{{asset('bootstrap/img/du.jpg')}}"> <!-- random image -->
            <div class="caption center-align">
  <h3 style=" text-align: center ;color: #008080">Welcome to  Addmission Pedia</h3>
            </div>
          </li>
          <li>
            <img src="{{asset('bootstrap/img/pstu.jpg')}}"> <!-- random image -->
            <div class="caption center-align">
   <h3 style=" text-align: center ;color: #008080">Welcome to  Addmission Pedia</h3>          
            </div>
          </li>
            <li>
            <img src="{{asset('bootstrap/img/buet1.jpg')}}"> <!-- random image -->
            <div class="caption center-align">
   <h3 style=" text-align: center ;color: #008080">Welcome to  Addmission Pedia</h3>          
            </div>
          </li>
        </ul>
    </div>
    <a href="{{url('/home')}}" style="position:absolute;z-index:2;top:10%;" class="btn green waves-effect waves-light btn-large" type="submit" name="action">Continue
        <i class="material-icons right">send</i>
    </a>
</section>



<!-- javascript -->
	<script src="{{asset('bootstrap/js/jquery-1.9.1.min.js')}}"></script>

    <!--Import jQuery before materialize.js-->
    <script src="{{asset('bootstrap/js/materialize.js')}}"></script>
      <!-- //<script src="{{asset('bootstrap/css/bootstrap.min.js')}}"></script> -->
      <script>
        $(document).ready(function(){
            $(".button-collapse").sideNav();
            $('.slider').slider({full_width: true, height: 700});
        });
      </script>

</body>
</html>
