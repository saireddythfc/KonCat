<!-- <div>
	<a href="/setLocation/Mumbai">Mumbai</a>
	<a href="/setLocation/Delhi">Delhi</a>
	<a href="/setLocation/Chennai">Chennai</a>
	<a href="/setLocation/Kolkatta">Kolkatta</a>
</div> -->



Conversation opened. 1 unread message.

Skip to content
Using Gmail with screen readers
Enable desktop notifications for Gmail.
   OK  No thanks

1 of 1,499
(no subject)
Inbox
x

Animesh Srivastava
Attachments
11:45 PM (0 minutes ago)
to Sai, me, Siddhesh

home2.blade.php


Attachments area

<html>
<head>
    <style>
    body, div, h1, h2, h3, h4, h5, h6, p, ul, ol, li, dl, dt, dd, img, form, fieldset, blockquote {
	margin: 0; padding: 0; border: 0;
}
body {
	background: black;
	font-family: Monospace; margin-left:75px; 
}
h1 {
	font-size: 20px; text-transform: uppercase; color: #fff;
	 text-align: center; margin-top:100px; margin-right:105px;
}
#browser {
	margin: 0 auto; text-align:center;
	text-shadow: 0 3px 3px #333;
}
#location {
	width: 550px; position: relative; margin: 0px;
}
.container {
	width: 200px; height: 300px;
	-webkit-perspective: 1000;
}
.container:hover .card {
	-webkit-transform: rotateY(180deg);				
}
.face {
	position: absolute;
	-webkit-backface-visibility: hidden;
}
.front {
	z-index: 10;
}
.container:hover .front {
	z-index: 0;
}
.card {
	width: 200px; height: 300px;
	border: 8px solid #fff;	
	-webkit-transform-style: preserve-3d;
	-webkit-transition: 0.5s;
}
#backdim {
	position:relative;
	width:200px;
	height:300px;
	margin-right:-20px;
	margin-top:-20px;
}
.card1 {
	float: left; position: absolute; top: 50px; left: 100px;
}
	.card1 .front {

	}
	.card1 .back {
		margin-left:0px;
		width: 160px; height: 260px; padding: 20px;
		-webkit-transform: rotateY(180deg);
		background: red;
	}
	.card1 img {
		float: right;
	}
	.card1 p {
		float: left; width: 85px; margin: 0 0 20px 0;
	}
#card1dim {
	width: 200px;
	height:300px;
}
.card2 {
	float: left; position: absolute; top: 50px; right: 10px;
}
	.card2 .front {

	}
	.card2 .back {
		width:160px; height: 260px; padding: 20px;
		-webkit-transform: rotateY(180deg);
		background: #a3a3a3;
	}
	.card2 img {
		float: right;
	}
	.card2 p {
		float: left; width: 85px; margin: 0 0 27px 0;
	}
#card2dim {
	width: 200px;
	height:300px;
}
.card3 {
	float: left; position: absolute; top: 50px; right: -230px;
}
	.card3 .front {

	}
	.card3 .back {
		width: 160; height: 260px; padding: 20px;
		-webkit-transform: rotateY(180deg);
		background: #a3a3a3;
	}
	.card3 img {
		float: right;
	}
	.card3 p {
		float: left; width: 85px; margin: 0 0 27px 0;
	}
#card3dim {
	width: 200px;
	height:300px;
}
.card4 {
	float: left; position: absolute; top: 50px; right: -470px;
}
	.card4 .front {

	}
	.card4 .back {
		width: 160px; height: 260px; padding: 20px;
		-webkit-transform: rotateY(180deg);
		background: #a3a3a3;
	}
	.card4 img {
		float: right;
	}
	.card4 p {
		float: left; width: 85px; margin: 0 0 27px 0;
	}
#card4dim {
	width: 200px;
	height:300px;
}

    </style>
<meta charset="uft-8">
	<title>Location</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<h1>Click to select your location</h1>
<div id="location">
	<div class="container card1">
		<div class="card">
			<div class="face front">
				<img id="card1dim" src="images/Mumbai.png" alt="Card 1">
			</div>
			<div class="face back">
            <a href="/setLocation/Mumbai">
            <img id="backdim" src="images/MUMBAI_BACK.png" alt="Card 1"></a></a>
			</div>
	 	</div>
	</div>
	<div class="container card2">
		<div class="card">
			<div class="face front">
				<img id="card2dim" src="images/Delhi_front.png" alt="Card 2">
			</div>
			<div class="face back">
            <a href="/setLocation/Delhi">
            <img id="backdim" src="images/DELHI_BACK.png" alt="Card 2"></a>
			</div>
	 	</div>
	</div>
	<div class="container card3">
		<div class="card">
			<div class="face front">
				<img id="card3dim" src="images/Kolkata_Front.png" alt="Card 3">
			</div>
			<div class="face back">
            <a href="/setLocation/Kolkata">
			<img id="backdim" src="images/KOLKATA_BACK.png" alt="Card 3">	</a>
			</div>
	 	</div>
	</div>
	<div class="container card4">
		<div class="card">
			<div class="face front">
				<img id="card4dim" src="images/Chennai_front.png" alt="Card 4">
			</div>
			<div class="face back">
                <a href="/setLocation/Chennai">
                <img id="backdim" src="images/CHENNAI_BACK.png" alt="Card 4"></a>
			</div>
	 	</div>
	</div>
	
</div>
</body>
</html>
home2.blade.php
Displaying home2.blade.php.