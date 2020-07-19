<?php
	require 'header.html';
	require 'footer.html';
?>
<?php
	if(isset($_REQUEST['submit'])){
		$db=mysqli_connect('localhost','root','mysql','myDatabase');
		if (!$db){
			die('Could not connect: ' . mysql_error());
			?>
				<script type="text/javascript">
					alert("INCORRECT !!!");
				</script>
			<?php
		}
		else{
			$first_name="";
			$last_name="";
			$email="";
			$city="";
			$message="";
			$first_name = mysqli_real_escape_string($db, $_POST['First_Name']);
			$last_name= mysqli_real_escape_string($db, $_POST['Last_Name']);
			$email= mysqli_real_escape_string($db, $_POST['Email']);
			$city= mysqli_real_escape_string($db, $_POST['City']);
			$message= mysqli_real_escape_string($db, $_POST['Message']);

			$query="INSERT INTO contactus(first_name,last_name,email,city,message) VALUES('$first_name','$last_name','$email','$city','$message')";

			$result=mysqli_query($db,$query);

			if($result){
				header('location: ./SuccessMessage.php');
				exit();
			?>
				<script type="text/javascript">
					// alert("Done!!!");
				</script>
			<?php
			}
			else{
			?>
				<script type="text/javascript">
					alert("Not Done!!!");
				</script>
			<?php
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Find Your Caretaker</title>
		<link rel="stylesheet" href="style.css">
		<script src="jQuery.js"></script>
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
			#Message{
				font-size: 15px;
				text-align: left;
				border: 2px solid #0d2b1d;
			}
			input,select{
				border: 2px solid #0d2b1d;
			}
			label{
				font-size: 18px;
			}
			.place{
				height: 40px;
			}

			.footer_body{
				top: 735px;
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
				<form action="./contactUs.php" method="post">

					<label class="label" for="F_Name">
						First Name :
					</label></br>
					<input class="label_design" type="text" name="First_Name" placeholder="Your Name" required="true"></br>
					<label>
						Last Name :
					</label></br>
					<input class="label_design"  type="text" name="Last_Name" placeholder="Surname" required="true"></br>
					<label>
						Email :
					</label></br>
					<input class="label_design" type="Email" name="Email" placeholder="Example@gmail.com" required="true"></br>
					<label>
						City :
					</label></br>
					<select class="place" name="City" required="true">
						<option value="Delhi">
							Delhi
						</option>
						<option value="Mumbai">
							Mumbai
						</option>
						<option value="Gurgaon">
							Gurgaon
						</option>
						<option value="Noida">
							Noida
						</option>
						<option value="Haryana">
							Haryana
						</option>
						<option value="Lukhnow">
							Lukhnow
						</option>
						<option value="Dehradun">
							Dehradun
						</option>
						<option value="Banglore">
							Banglore
						</option>
						<option value="Rampur">
							Rampur
						</option>
						<option value="Jaipur">
							Jaipur
						</option>
						<option value="Ahmedabad">
							Ahmedabad
						</option>
					</select></br>
					<label>
						Message
					</label></br>
					<textarea class="label_design" Id="Message" name="Message" placeholder="Write something.."
							style="height:200px" required="true">
					</textarea></br>
					<button class="contactUsSubmitButton" name="submit" type="submit">
						Submit
					</button>
				</form>
			</div>
		</div>

		<!-- <div id="footer"></div> -->
	</body>
</html>
