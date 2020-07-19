<?php
	
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ./index.php');
	}
	
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
			$mobile_number="";
			$region="";
			$skills="";
			$department="";

			$first_name = mysqli_real_escape_string($db, $_POST['first_name']);
			$last_name= mysqli_real_escape_string($db, $_POST['last_name']);
			$email= mysqli_real_escape_string($db, $_POST['email']);
			$mobile_number= mysqli_real_escape_string($db, $_POST['mobile_number']);
			$region= mysqli_real_escape_string($db, $_POST['region']);
			$skills= mysqli_real_escape_string($db, $_POST['skills']);
			$department= mysqli_real_escape_string($db, $_POST['department']);

			$query="INSERT INTO find(first_name,last_name,email,mobile_number,region,skills,department) VALUES('$first_name','$last_name','$email','$mobile_number','$region','$skills','$department')";

			$result=mysqli_query($db,$query);

			if($result){
				header('location: ./SuccessFindRequest.php');
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
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Find Your Caretaker</title>
	
	<script src="jQuery.js"></script>
	<script type="text/javascript">
		$(function(){
			$('.logout').html("Logout/Sign Out");

			$('.logout').attr('href','./SuccessLogout.php');
		})
	</script>

	<style type="text/css">

		.body{
			top: -370px;
			width: 100%;
			height: 990px;
			flood-color: left;
			position: relative; 
			background-image: url("./home5.jpg");
			background-size: cover;
		}
	
		.footer_body{
			top: 1070px;
		}
	</style>
	<style type="text/css">
		.Apply_Job_write{
			text-align: center;
			font-size: 30px;
			padding-top: 10px;
			font-family: 'calibri';
		}
	</style>
	<style type="text/css">
		.container{
			/*border:2px solid black;	
			*/
			border: 3px transparent;
			position: relative;
			margin: auto;
			width: 50%;
			padding: 30px 30px 30px 30px;
			text-align: center;
			box-sizing: border-box;
		    /*background: rgba(0,0,0,.5);*/
			background: rgba(176, 110, 40, 0.5);
		}
		.label_design{
			width: 300px;
			height: 20px;
			border-radius: 10px;
		    border-bottom: 1px solid #fff;
		    /*background: transparent;*/
		    border: 2px solid #0d2b1d;
		    outline: none;
		    height: 40px;
		    font-size: 16px;
		}
		.Image{
			position: absolute;
			background-repeat: no-repeat;
			width: 100%;
			height: 100vh;
		    overflow: hidden;
		    filter: blur(6px);
		  
		}
		button{
			width: 150px;
		    height: 40px;
			border-radius: 10px;
		    border-bottom: 1px solid #fff;
		    /*background: transparent;*/
		    border: 2px solid #0d2b1d;
		    outline: none;
		    font-size: 16px;
		}
		select{
			width: 300px;
		    height: 40px;
			border-radius: 10px;
		    border-bottom: 1px solid #fff;
		    /*background: transparent;*/
		    border: 2px solid #0d2b1d;
		    outline: none;
		    font-size: 16px;
		}
		label{
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div class="body">
		<div class="main">
			<div class="header"></div>
			<div class="mid">
				<div class="Apply_Job">
					<div class="Apply_Job_write">
						<h1>Find Your Caretaker</h1>
					</div>
				</div>
				<div class="container">
					<form method="post" action="./find.php">
						<label class="label" for="F_M_Name">First Name & Middle Name</label><br>
						<input class="label_design" type="text" name="first_name" placeholder="Your Name" required="true"><br>
						<label class="label" for="L_Name">Last Name</label><br>
						<input class="label_design" type="text" name="last_name" placeholder="Your Surname Name" required="true"><br>
						<label>Email</label></br>
						<input class="label_design" type="Email" name="email" placeholder="Example@gmail.com" required="true"></br>
						<label>Contact Number</label></br>
						<input class="label_design" type="text" name="mobile_number" placeholder="Ex:+91 1234567890" required="true"></br>
						<label>Region</label></br>
						<select Id="City" name="region" required="true">
							<option value="Delhi">East Delhi</option>
							<option value="Mumbai">West Delhi</option>
							<option value="Gurgaon">Gurgaon</option>
							<option value="Noida">Noida</option>
							<option value="Haryana">North Delhi</option>
							<option value="Lukhnow">South Delhi</option>
						</select></br>
						<label>Skills</label></br>
						<textarea class="label_design" Id="Skills" name="skills"required="true" placeholder="Write about your skills" style="height:150px"></textarea></br>
						<!-- <label class="label" for="create_password">Create Password</label><br>
						<input class="label_design" type="password" name="password" placeholder="create password"><br>
						<label class="label" for="create_password">Confirm Password</label><br>
						<input class="label_design" type="password" name="password" placeholder="confirm password"> -->
						<div class="search">
							<h1>Select Department</h1>
							<select id="select" required="true" name="department">
								<option value="Select Departement">Select Departement</option>
								<option value="Cook">Cook</option>
								<option value="Baby Sitter">Baby Sitter</option>
								<option value="Elder Care">Elder Care</option>
								<option value="House Maid">Home Care</option>
								<option value="Patient Care">Patient Care</option>
							</select>
						</div>

						<br><br>
						<button type="submit" name="submit">Submit Request</button><br>
		   		 		<!-- <p>Already have an account? <a href="./index.php">Sign in</a>.</p> -->
		   			</form>
		  		</div>
			</div>
		</div>
		
	</div>
</body>
</html>
