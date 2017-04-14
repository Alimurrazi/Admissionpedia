<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
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

<header>
    <nav>
        <div class="nav-wrapper blue-grey darken-1">
          <a href="#!" class="brand-logo center">ADDMISSION PEDIA</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons"></i>menu</a>
          <!-- <ul class="right hide-on-med-and-down">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">Javascript</a></li>
            <li><a href="mobile.html">Mobile</a></li>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">Javascript</a></li>
            <li><a href="mobile.html">Mobile</a></li>
          </ul> -->
        </div>
    </nav>
</header>

<section style="position:relative;z-index:1;">
    <div class="slider">
        <ul class="slides">
          <li>
            <img src="{{asset('bootstrap/img/hudai.jpg')}}"> <!-- random image -->
            <div class="caption center-align">
              <h3>Welcome to ADDMISSION PEDIA</h3>
              <h5 class="light green-text text-darken-5">Here's our small slogan.</h5>
            </div>
          </li>
          <li>
            <img src="{{asset('bootstrap/img/buet.jpg')}}"> <!-- random image -->
            <div class="caption center-align">
              <h3>Welcome to ADDMISSION PEDIA</h3>
              <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
          </li>
        </ul>
    </div>
    <a href="{{url('/')}}" style="position:absolute;z-index:2;top:10%;" class="btn green waves-effect waves-light btn-large" type="submit" name="action">Continue
        <i class="material-icons right">send</i>
    </a>
</section>
<div class="input-field">
            <select>
              <option value="" disabled selected>Choose your option</option>
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
              <option value="3">Option 3</option>
            </select>
        </div>



<!-- javascript -->
	<script src="{{asset('bootstrap/js/jquery-1.9.1.min.js')}}"></script>

    <!--Import jQuery before materialize.js-->
    <script src="{{asset('bootstrap/js/materialize.js')}}"></script>
      <!-- //<script src="{{asset('bootstrap/css/bootstrap.min.js')}}"></script> -->
      <script>
        $(document).ready(function(){
            $(".button-collapse").sideNav();
            $('.slider').slider({full_width: true, height: 603});
        });
      </script>

</body>
</html>
