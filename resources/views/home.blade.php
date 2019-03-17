<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>KONCAT</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css"  rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



    <style type="text/css">
      
      .linedivide1 {
        display: block;
        height: 20px;
        width: 1px;
        background-color: #e5e5e5;
        margin-left: 23px;
        margin-right: 23px;
        margin-top: 13px;
      }

      #page-top{
        font-family: monospace;
      }

    </style>

    
  </head>
  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand page-scroll" href="#page-top"><img src="images/KonCat.png" style="width: 100px;height: 70px;"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="hidden">
              <a href="#page-top"></a>
            </li>
           <!--  <li>
              <a class="page-scroll" href="#">Current Location - {{$location}}</a>
            </li> -->
            <li>
              <a class="page-scroll" href="#sport">Sport</a>
            </li>
            <li>
              <a class="page-scroll" href="#technical">Technical</a>
            </li>
            <li>
              <a class="page-scroll" href="#cultural">Cultural</a>
            </li>
            <!-- <li class="nav-item">
              <p>Your location: </p>
              <p>(<a href="/home">Change</a>)</p>
            </li> -->
            <li><span class="linedivide1"></span></li>                
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} (Current Location - {{$location}})<span class="caret"></span> 
              </a>

              <div  class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="padding: 10px;">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #000000; display: block;">
                      {{ __('Logout') }}
                </a>                
                <a class="dropdown-item" href="/showTeams2" style="color: #000000; display: block;">Show my teams</a>
                <a class="dropdown-item" href="/home" style="color: #000000; display: block;">Change Location</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
    <!-- Header -->
    <header style="background-image: url('images/background.jpg');">
      <div class="container">
        <div class="slider-container">
          <div class="intro-text">
            <div class="intro-lead-in">KonCat</div>
            <div class="intro-heading">Meet. Greet. Complete. Repeat.</div>
            <a href="/teamBuild" class="page-scroll btn btn-xl">Build Team</a>
            <a href="/teamList" class="page-scroll btn btn-xl">Join Team</a>
          </div>
        </div>
      </div>
    </header>
    <!-- Sport -->
    <section id="sport" class="light-bg" style="background-image: url('images/background.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="section-title">
              <h2>Sport</h2>
              <p>A creative agency based on Candy Land, ready to boost your business with some beautifull templates. Lattes Agency is one of the best in town see more you will be amazed.</p>
            </div>
          </div>
        </div>  
      </div>
      <!-- /.container -->
    </section>


    <!-- Technical -->
    <section id="technical" class="light-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="section-title">
              <h2>Technical</h2>
              <p>A creative agency based on Candy Land, ready to boost your business with some beautifull templates. Lattes Agency is one of the best in town see more you will be amazed.</p>
            </div>
          </div>
        </div>
        
      </div>
      <!-- /.container -->
    </section>


    <!-- Cultural -->
    <section id="cultural" class="light-bg" style="background-image: url('images/background.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="section-title">
              <h2>Cultural</h2>
              <p>A creative agency based on Candy Land, ready to boost your business with some beautifull templates. Lattes Agency is one of the best in town see more you will be amazed.</p>
            </div>
          </div>
        </div>
        
      </div>
      <!-- /.container -->
    </section>



    <p id="back-top">
      <a href="#top"><i class="fa fa-angle-up"></i></a>
    </p>
    <footer>
      <div class="container text-center">
        <p>Designed by TEAM NACHOS</a></p>
      </div>
    </footer>

    
    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/theme-scripts.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>