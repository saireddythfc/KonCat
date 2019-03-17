<!DOCTYPE html>
<html lang="en">
  <head>
     <script src="/js/socket.io.js"></script>
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
      .request tbody{
        border-bottom: 1px solid white;
      }

      footer{

        bottom: 0px;
      }

      .requestedTeams{
        font-weight:bold; 
        text-align: center;
        font-family: monospace;
        color: #ffffff;
        font-size: 40px;
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
          <a class="navbar-brand page-scroll" href="#page-top"><img src="images/KonCat.png" style="width: 100px;height: 70px;"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="hidden">
              <a href="#page-top"></a>
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
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card ">
              <div class="card-header fs-22 header">Your Teams</div>
                <div class="card-body">
                  @if (session('status'))
                    <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                    </div>
                  @endif

                  @foreach ($teams as $team)
                  <table class="table">
                    <thead>
                      <tr>
                        <th>team Name</th>
                        <th>domain</th>
                        <th>req</th>
                        <th>contact</th>
                        <th>location</th>
                        <th>time</th>
                        <th>date</th>
                      </tr>
                    </thead>
                    <tbody>      
                      <tr>
                        <td>{{ $team->event }}</td>
                        <td>{{ $team->domain }}</td>
                        <td>{{ $team->requirements }}</td>
                        <td>{{ $team->contact_no }}</td>
                        <td>{{ $team->location }}</td>
                        <td>{{ $team->time }}</td>
                        <td>{{ $team->date }}</td>
                        <td><a href="/updateTeam/{{$team->id}}">Update</a></td>
                      </tr>          
                    </tbody>
                  </table>

                  <table class="table" style="margin-bottom: 100px;">
                    <thead>
                      <tr>
                        <th>User Name</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($team->registrations as $reg)            
                        <tr>            
                          <td>{{ $reg->name }}</td>
                          <td>{{ $reg->status }}</td>
                          @if($reg->status == 'Pending')
                            <td><button onclick="acceptRequest('{{$reg->id}}, {{csrf_token()}}');">Accept</button></td>
                            <td><button onclick="rejectRequest('{{$reg->id}}, {{csrf_token()}}');">Reject</button></td>
                          @endif
                          @if($reg->status == 'Accepted')
                            <td><button disabled onclick="acceptRequest('{{$reg->id}}, {{csrf_token()}}');">Accept</button></td>
                            <td><button onclick="rejectRequest('{{$reg->id}}, {{csrf_token()}}');">Reject</button></td>
                          @endif
                          @if($reg->status == 'Rejected')
                            <td><button onclick="acceptRequest('{{$reg->id}}, {{csrf_token()}}');">Accept</button></td>
                            <td><button disabled onclick="rejectRequest('{{$reg->id}}, {{csrf_token()}}');">Reject</button></td>>
                            <td><a href="/newRoute/{{$user_id}}/{{$team->id}}/{{$reg->id}}/">Chat</a></td>


                          @endif
                        </tr>
                      @endforeach
                      </tbody>

                    </table>

                  @endforeach

                  <p class="requestedTeams">Teams you have requested</p>

                  @foreach ($yourRequestedTeams as $team)

                  <table class="table">
                    <thead>
                      <tr>
                        <th>team Name</th>
                        <th>domain</th>
                        <th>contact</th>
                        <th>location</th>
                        <th>time</th>
                        <th>date</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ $team->event }}</td>
                        <td>{{ $team->domain }}</td>
                        <td>{{ $team->contact_no }}</td>
                        <td>{{ $team->location }}</td>
                        <td>{{ $team->time }}</td>
                        <td>{{ $team->date }}</td>
                        <td>{{ $team->status }}</td>
                        <td><a href="/chat/{{$team->team_id}}">Chat</a></td>

                      </tr>                      
                                  
                    </tbody>
                  </table>

                @endforeach
                <div class="links">
                  <a href="/teamBuild">Add New team</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <p id="back-top">
      <a href="#top"><i class="fa fa-angle-up"></i></a>
    </p>
    <!-- <footer>
      <div class="container text-center">
        <p>Designed by TEAM NACHOS</a></p>
      </div>
    </footer>
 -->
    
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

    <script type="text/javascript">
    function reloadPage() {
        location.reload();
    }
    /*function acceptRequest(id, token) {
        var http = new XMLHttpRequest();
        var url = 'http://127.0.0.1:8000/acceptRequest/'+id+'/';
        var params = 'id='+id;
        http.open('GET', url);

        console.log(id);
        //Send the proper header information along with the request
        http.setRequestHeader('X-CSRF-TOKEN', token);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        

        http.onreadystatechange = function() {//Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
                if(http.responseText == 1){
                    Swal.fire(
                          'Success!',
                          'This user was added.',
                          'success',
                          {onAfterClose: 'reloadPage()'}
                        );
                }
                else{
                    Swal.fire({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Something went wrong!'
                      
                    });
                }
                //location.reload();
            }
        }
        http.send(params);
    }*/


    function acceptRequest(id, token) {
        var http = new XMLHttpRequest();
        var url = 'http://127.0.0.1:8000/acceptRequest/'+id+'/';
        var params = 'id='+id;
        http.open('GET', url);

        console.log(id);
        //Send the proper header information along with the request
        http.setRequestHeader('X-CSRF-TOKEN', token);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        

        http.onreadystatechange = function() {//Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
                if(http.responseText == 1){
                    Swal.fire(
                          'Success!',
                          'This user was accepted',
                          'success',
                          {onAfterClose: 'reloadPage()'}
                        ).then(() => {
                            location.reload();
                        });
                    
                }
                else{
                    Swal.fire({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Something went wrong!'
                    });

                }
                
            }
        }
        http.send(params);
    }

    function rejectRequest(id, token) {
        var http = new XMLHttpRequest();
        var url = 'http://127.0.0.1:8000/rejectRequest/'+id+'/';
        var params = 'id='+id;
        http.open('GET', url);

        console.log(id);
        //Send the proper header information along with the request
        http.setRequestHeader('X-CSRF-TOKEN', token);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        

        http.onreadystatechange = function() {//Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
                if(http.responseText == 1){
                    Swal.fire(
                          'Success!',
                          'This user was rejected.',
                          'success'
                        ).then(() => {
                            location.reload();
                        });;
                }
                else{
                    Swal.fire({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Something went wrong!',
                      onAfterClose: 'reloadPage()'
                    });
                }
                
            }
        }
        http.send(params);
    }
</script>

  </body>
</html>