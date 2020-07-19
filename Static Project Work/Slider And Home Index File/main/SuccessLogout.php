<?php
	
	session_start();
	
	if(!isset($_SESSION['username'])){
		header('location: ./index.php');
	}
	
	if(isset($_SESSION['username'])){
		unset($_SESSION['username']);
		session_destroy();
	}
	

	require 'header.html';
	require 'footer.html';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Find Your Caretaker</title>
	<style type="text/css">	
		.footer_body{
			top: 785px;
		}
		.body{
			top: -420px;
			width: 100%;
			height: 755px;
			flood-color: left;
			position: relative; 
			background-image: url("./home1.jpg");
			background-size: cover;
		}
		.successmessage{
			width: 1230px;
			height: 580px;
			position: absolute;
			/*border: 2px solid black;*/
			margin-left: 50px;
			margin-top: 85px;
			border-radius: 40px;
			/*background-color: rgb(159, 117, 85,0.8);*/
			background: rgba(176, 110, 40, 0.5);
		}
		.successmessage h1{
			font-family: calibri;
			font-size: 50px;
			margin-left: 200px;
			color: maroon;
			margin-top: 250px;
		}
		.successmessage h2{
			font-family: calibri;
			font-size: 40px;
			margin-left: 500px;
			color: maroon;
			margin-top: 200px;
		}
		.successmessage button{
			width: 300px;
			height: 50px;
			margin-left: 20px;
			border-radius: 20px;
			outline: none;
			color: yellow;
			background-color: #4d3131;
			border: 3px solid #602d2d;
			color: #ffffff;
			font-size: 20px;
			font-weight: bolder;
			letter-spacing: 0.3em;
		}
		button:hover{
			color: yellow;
		}
	</style>
</head>
<body>
	<div class="body">
		<div class="successmessage">
			<h1>You have Successfully Loged Out!</h1>
			<h2>Back To Home Page : <a href="./index.php"><button>CLICK HERE !</button></a></h2>
		</div>
	</div>
</body>
</html>
