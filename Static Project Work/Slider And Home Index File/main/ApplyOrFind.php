<?php
	
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ./index.php');
	}

	require 'header.html';
	require 'footer.html';

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Find Your Caretaker</title>
		<link rel="stylesheet" href="style.css">
		<script src="jQuery.js"></script>
		<script type="text/javascript">
			$(function(){
				$('.logout').html("Logout/Sign Out");

				$('.logout').attr('href','./SuccessLogout.php');
			})
		</script>
		<!-- <script type="text/javascript">
			$(function(){
				$('#header').load('header.html');
				$('#footer').load('footer.html');
			});
		</script> -->
		<style type="text/css">
			body{
				position: relative;
			}
			.contactUs_image{
				position: absolute;
				top: 80px;
			}
			.container_body{
				position:absolute;
				top: 50px;
			}

			.footer_body{
				top: 735px;
			}
			.container{
				height: 320px;
				width: 70%;
				padding-top: 190px;
			}
			.apply{
				height: 200px;
				width: 200px;
				/*border: 2px solid black;*/
				display: inline-block;
				margin-right: 200px;
			}
			.find{
				height: 200px;
				width: 200px;
				/*border: 2px solid black;*/
				display: inline-block;
			}
		</style>
	</head>
	<body>
		<!-- <div id="header"></div> -->

		<div class="contactUs_image">
			<img src="home1.jpg">
		</div>
		<div class="container_body">
			<div class="container">
				<div class="apply">
					<a href="./apply.php">
						<img src="apply.png" style="height: 100%; width: 100%">
					</a>
				</div>
				<div class="find">
					<a href="./find.php">
						<img src="find.png" style="height: 100%; width: 100%">
					</a>
				</div>
			</div>
		</div>

		<!-- <div id="footer"></div> -->
	</body>
</html>