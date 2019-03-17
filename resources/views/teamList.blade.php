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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


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

      .body{
        position: absolute;
        top: 150px;
        left:300px;
        font-family: monospace;
        color: #ffffff;
        text-transform: uppercase;
      }
      .header{
        text-align: center;
        font-size: 40px;
        font-family: monospace;
      }
      #page-top{
        background-color: #000000;
      }
      button{
        color: #000000;
      }
      a{
        font-family: "Roboto",sans-serif;
        text-transform: uppercase;
        font-weight: 400;
        letter-spacing: 1px;
        color: #fff; 
      }
      th{
        color: #fec503;
      }
    </style>

    
  </head>
  <body id="page-top">
    <!-- Navigation -->
    <header class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand page-scroll" href="#page-top"><img src="images/KonCat.png" style="width: 100px;height: 50px;"></a>
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
                <a class="dropdown-item" href="/showTeams" style="color: #000000; display: block;">Show my teams</a>
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
    </header>

    <div class="background">
        <div class="container m-t-100 m-b-100 body">

            <div class="form-group row">

                <label for="selectedDomain" class="col-md-4 col-form-label text-md-right">Domain</label>

                <div class="col-md-6">
                    
                    <select id="selectedDomain" class="form-control" name="selectedDomain" onChange="update();">
                        <option>Any</option>
                        <option value="TECHNICAL">Technical</option>
                        <option value="CULTURAL">Cultural</option>
                        <option value="SPORT">Sport</option>
                    </select>
                </div>
            </div>


            <div class="form-group row">

                <label for="sortByDateCheckBox" class="col-md-4 col-form-label text-md-right">Find by date?</label>

                <div class="col-md-6">
                        
                    <input type="checkbox" id="sortByDateCheckBox" name="sortByDateCheckBox" class="col-md-4 col-form-label text-md-right" onclick="showSortByDate();">
                </div>
            </div>


            <div class="form-group row" id="showSortByDate" style="display: none;">

                <label for="startDate" class="col-md-4 col-form-label text-md-right" >Start date</label>
                <input type="date" name="startDate" id="startDate" onChange="update();" style="color:#000000;">
                <br>
                <label for="endDate" class="col-md-4 col-form-label text-md-right" onChange="update();">End date</label>
                <input type="date" name="endDate" id="endDate" onChange="update();"style="color:#000000;">
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header fs-22">Your Teams</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="table" id="mytab1">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Description</th>
                                        <th>domain</th>
                                        <th>req</th>
                                        <th>contact</th>
                                        <th>location</th>
                                        <th>time</th>
                                        <th>date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $team)
                                        
                                        <tr class="{{$team->domain}}">
                                            <td>{{ $team->event }}</td>
                                            <td>{{ $team->description }}</td>
                                            <td>{{ $team->domain }}</td>
                                            <td>{{ $team->requirements }}</td>
                                            <td>{{ $team->contact_no }}</td>
                                            <td>{{ $team->location }}</td>
                                            <td>{{ $team->time }}</td>
                                            <td>{{ $team->date }}</td>
                                            <td style="display: none"><?php $dateTime = DateTime::createFromFormat('Y-m-d', $team->date); echo $dateTime->format('m/d/Y'); ?></td>
                                            
                                            <td><a href="/requestTeam/{{$team->id}}">Request</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- <div class="links">
                                <a href="/addNewteam">Add New team</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>>

    <p id="back-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </p>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/theme-scripts.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <script type="text/javascript">

            
            window.onload = function() {

                /*Swal.fire({
                  title: 'Error!',
                  text: 'Do you want to continue',
                  type: 'error',
                  confirmButtonText: 'Cool'
                });*/
            };

            function update() {
                sel = document.getElementById('selectedDomain');
                //console.log(sel.value);

                var table = document.getElementById("mytab1");
                for (var i = 1, row; row = table.rows[i]; i++) {
                    //console.log(row.classList.contains(sel.value));
                    if(sel.value == "Any")
                        row.style.display = "";
                    else if(row.classList.contains(sel.value))
                        row.style.display = "";
                    else 
                        row.style.display = "none";
                }

                var checkBox = document.getElementById('sortByDateCheckBox');
                if(!checkBox.checked)
                    return true;

                var start = Date.parse(document.getElementById('startDate').value);
                var end = Date.parse(document.getElementById('endDate').value);
                console.log(start);
                if(isNaN(start) || isNaN(end))
                    return true;

                if(end < start){
                    Swal.fire({
                        title: 'Error!',
                        text: 'End date should be lesser than start date.',
                        type: 'error',
                        confirmButtonText: "Okay i'm dumb"
                    });
                    document.getElementById('endDate').value = '';
                }

                for (var i = 1, row; row = table.rows[i]; i++) {
                    date = row.cells[8].innerHTML;
                    current = Date.parse(date);
                    current += 19800000;
                    console.log(current);
                    if(!(current >= start && current <= end)) 
                        row.style.display = "none";
                }
            }


            function showSortByDate() {
                var dateDiv = document.getElementById('showSortByDate');
                var checkBox = document.getElementById('sortByDateCheckBox');

                if(checkBox.checked)
                    dateDiv.style.display = "block";
                else
                    dateDiv.style.display = "none";
                update();
            }
    </script>
</body>
</html>
