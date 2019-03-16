

@extends('layouts.app')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Team</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
</head>

<body>


{{$location}}


                
                
                <div  class="container" >

                
                   @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="wrapper">
                  <div style="float: right">
                   <a style ="text-decoration:none; " class="first after" href="/teamBuild">Build A Team</a>
                     
                     <div style="float: right">
                   <a style ="text-decoration:none;"  class = "first after" href="/teamList">Join A Team  </a>
                     </div>
                    
                


                    
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    
                        
                        <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                        <div class="item active">
                            <img src="images/background.jpg" alt="TECHNICAL" style="width:100%;">
                            <div class="carousel-caption">
                            <h3>TECHNICAL</h3>
                            <p>Brainstorm!</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="images/background.jpg" alt="SPORTS" style="width:100%;">
                            <div class="carousel-caption">
                            <h3>SPORTS</h3>
                            <p>Play Harder!</p>
                            </div>
                        </div>
                        
                        <div class="item">
                            <img src="images/background.jpg" alt="CULTURAL" style="width:100%;">
                            <div class="carousel-caption">
                            <h3>CULTURAL</h3>
                            <p>Dress Up!</p>
                            </div>
                        </div>
                    
                        </div>

                        <!-- Left and right controls -->
      
                        
                    </div>
                    


                    

                </div>
            </div>
        
</body>
</html>
   
@endsection