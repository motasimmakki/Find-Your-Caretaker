<?php
	if(isset($_REQUEST['login'])){
		$db=mysqli_connect('localhost','root','mysql','myDatabase');
		$username="";
		$password="";
		$username=mysqli_real_escape_string($db, $_REQUEST['username']);
		$password=mysqli_real_escape_string($db, $_REQUEST['password']);
		// $password=md5('$password');
				
		// $password=strrev($password);
		// $password=wordwrap($password,1,'!-@3_#(&^6%-)*{--9*}|',true);
				
		$sql="SELECT * FROM newaccount WHERE username='$username' AND password='$password'";
		$result=mysqli_query($db,$sql);
		if(!$result||mysqli_num_rows($result)==1){
			session_start();
			$_SESSION['username']=$username;
			header('location: ./ApplyOrFind.php');
		}
		else{
		?>
			<script type="text/javascript">
				 alert("Entered Username And Password Does Not Match !");
			</script>
		<?php
		}	 	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="icon" href="MC_Logo.png" type="image/png"> -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Find Your Caretaker</title>
	
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="../ideal-image-slider.css">
	<link rel="stylesheet" href="../themes/default/default.css">

	<script src="jQuery.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#header').load('header.html');
			$('#footer').load('footer.html');
		});

		$(function(){
			var slider = new IdealImageSlider.Slider('#slider');
			setInterval(slider.start(),200);
		});

	</script>

	<style media="screen">
		#slider {
			max-width: 100%;
			margin: 50px auto;
			/*top: -420px;*/
		}
	</style>
	<style type="text/css">
		
		.home_image{
			position: relative;
			z-index: 1;
		}
		.login{
			top: 30px;
			width:30%;
			height:53%;
			/*width: 400px;*/
			/*height: 400px;*/
			position: absolute;
			/*border: 2px solid black;*/
			margin-left: 470px;
			margin-top: 100px;
			border-radius: 40px;
			/*background-color: rgb(159, 117, 85,0.8);*/
			background: rgba(176, 110, 40, 0.5);
			z-index: 2;
		}
		.loginform{
			padding: 30px 40px; 
			/*margin-top: 30px;
			margin-left: 40px; */
		}
		.loginform h1{
			/*margin-left: 110px;*/
			text-align: center;
			font-family: calibri;
			font-size: 3vw;
			/*font-size: 40px;*/
			margin-top: -20px;
			color: maroon;
			font-weight: bolder;
		}
		.loginform label{
			font-family: calibri;
			font-size: 2vw;
			/*font-size: 25px;*/
			color: #0d2b1d;
			font-weight: bolder;
		}
		.loginform input{
			width: 100%;
			height: 8vh;
			/*width: 315px;*/
			/*height: 50px;*/
			margin-top: 10px;
			background-color: #edbfbf;
			border-radius: 20px;
			border: 3px solid #602d2d;
			outline: none;
			font-size: 20px;
			text-align: center;
		}
		.loginform button{
			width: 100%;
			height: 8vh;
			/*width: 315px;
			height: 50px;*/
			margin-top: 30px;
			border-radius: 20px;
			outline: none;
			background-color: #4d3131;
			border: 3px solid #602d2d;
			color: #ffffff;
			font-size: 1.5vw;
			/*font-size: 20px;*/
			font-weight: bolder;
			letter-spacing: 0.3em;
		}
		.register button{
			width: 80%;
			height: 8vh;
			/*width: 315px;
			height: 50px;*/
			margin-top: 30px;
			border-radius: 20px;
			outline: none;
			background-color: #4d3131;
			border: 3px solid #602d2d;
			color: #ffffff;
			font-size: 1.5vw;
			/*font-size: 20px;*/
			font-weight: bolder;
			letter-spacing: 0.3em;
		}
		.newaccount{
			padding: 0px;
			text-align: center;
		}
		.register{
			position: absolute;
			/*width: 50%;*/
			height: 15vh;
			/*width: 400px;
			height: 100px;*/
			/*border:2px solid green;*/
			margin-top: 520px;
			margin-left: 470px;
			border-radius: 20px;
		}
		.register button{
			/*margin-left: 45px;*/
			height:70px;
			margin-top: 15px;
			color: #34d5e4;
		}
		.register button:hover,.login button:hover{
			color: yellow;
		}
		.footer_body{
			margin-top: -885px;
		}
		.header_body{
			overflow: hidden;
		}
		.footer_body{
			/*overflow: hidden;*/
		}
		@media screen and (max-width: 1200px) {
  			.login{
				margin-left: 400px;
  			}
		}
		@media screen and (max-width: 1024px) {
  			.login{
				margin-left: 350px;
  			}
		}
		@media screen and (max-width: 900px) {
  			.login{
				margin-left: 300px;
  			}
		}
		@media screen and (max-width: 768px) {
  			.login{
				margin-left: 250px;
  			}
		}
		@media screen and (max-width: 600px) {
  			.login{
				margin-left: 200px;
  			}
		}
		@media screen and (max-width: 480px) {
  			.login{
				margin-left: 150px;
  			}
		}
		@media screen and (max-width: 320px) {
  			.login{
				margin-left: 100px;
  			}
		}
	</style>

</head>
<body style="user-select: none;">
	<div id="header"></div>

	<div class="home_image">
		<div id="slider">
			<img src="home1.jpg" alt="Slide 1" />
			<img src="home2.jpg" alt="Slide 2" />
			<img src="home3.jpg" alt="Slide 3" />
			<img src="home4.jpg" alt="Slide 4" />
			<img src="home5.jpg" alt="Slide 5" />
		</div>

		<div class="login">
			<form class="loginform" action="./index.php" method="POST">
				<h1>LOGIN</h1>
				<label>Username :</label><br>
				<input type="text" name="username" placeholder="Enter Username..." required="true">
				<label>Password :</label><br>
				<input type="Password" name="password" placeholder="Enter Password..." required="true"><br>
				<button type="submit" name="login">SIGN IN</button>
			</form>
			
		</div>
		<div class="register login">
			<form class="newaccount" action="./form.php">
				<button type="submit">Register New Account !</button>
			</form>
		</div>

	</div>

	<script src="../ideal-image-slider.js"></script>
	
	<div id="footer"></div>

</body>
</html>