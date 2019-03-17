<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KonCat</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <style>
        h1 { font-family: "Brush Script MT", cursive; font-size: 38px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 41.8px; }
            html, body {
                background-color: #000;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                /*background-image: url("images/background.jpg");*/
                background-repeat: no-repeat;
                background-position: fixed;
                -webkit-background-size: cover;
                -webkit-filter: cover;
                background-size: cover;
            }
            .container {
              position: relative;
              width: 100%;
              max-width: 400px;
            }


            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .top-left {
                position: absolute;
                left: 0px;
                top: 0px;

            }
            .bottom-right {
                position: absolute;
                right: 0px;
                bottom: : 0px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .image {
              width: 100%;
              height: auto;
            }
            .overlay {
              position: absolute;
              top: 0;
              bottom: 0;
              left: 0;
              right: 0;
              height: 100%;
              width: 100%;
              opacity: 0;
              transition: .3s ease;
              background-color: black;
            }
            .fa-user:hover {
              color: #eee;
            }
            .icon {
              color: white;
              font-size: 100px;
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
              -ms-transform: translate(-50%, -50%);
              text-align: center;
            }
            .top-left:hover .overlay {
                  opacity: 1;
                }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Build/Join</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
                <div class="top-left">

                        <a href="/home" style="margin-left:20px">
                  <img src="images/KonCat_name.png" class="name" alt="Name" width="500px" height="500px" style="margin-right:10px;">
                  </a>
                  <div class="overlay">
                        
                          <img src="images/KonCat_name_Hindi.png" alt="Avatar" class="image" width="400px" height="400px margin-right:10px;">
                        
                      </div>
                  

                    
                    
                </div>
                <div class="bottom-right">

                  <iframe src="https://giphy.com/embed/3kuQUK8m1DVK6inpkR" width="400" height="400" frameBorder="0" class="giphy-embed" allowFullScreen style="margin-top:50px;">></iframe>
                  
                    
                    
                </div>
            @endif

            
        </div>
    </body>
</html>
