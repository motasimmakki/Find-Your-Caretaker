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
			$full_name="";
			$dob="";
			$gender="";
			$education="";
			$address="";
			$profession="";
			$photo="";
			$mobile_number="";
			$marital_status="";
			$religion="";
			$working_hours="";
			$salary_expectation="";
			$experience="";
			$resume="";
					
			$full_name = mysqli_real_escape_string($db, $_POST['full_name']);
			$dob= mysqli_real_escape_string($db, $_POST['dob']);
			$gender= mysqli_real_escape_string($db, $_POST['gender']);
			$education= mysqli_real_escape_string($db, $_POST['education']);
			$address= mysqli_real_escape_string($db, $_POST['address']);
			$profession= mysqli_real_escape_string($db, $_POST['profession']);

			$get_photo= $_FILES['photo']['name'];
			$temp_photo= $_FILES['photo']['tmp_name'];

			mkdir("./documents/"."/".$full_name);
			
			$saved_photo = "./documents/"."/".$full_name."/".$get_photo;
			move_uploaded_file($temp_photo, $saved_photo);
			echo $saved_photo;
			// ,'".$saved_photo."'

			$mobile_number= mysqli_real_escape_string($db, $_POST['mobile_number']);
			$marital_status= mysqli_real_escape_string($db, $_POST['marital_status']);
			$religion= mysqli_real_escape_string($db, $_POST['religion']);
			$working_hours= mysqli_real_escape_string($db, $_POST['working_hours']);
			$salary_expectation= mysqli_real_escape_string($db, $_POST['salary_expectation']);
			$experience= mysqli_real_escape_string($db, $_POST['experience']);

			$get_resume= $_FILES['resume']['name'];
			$temp_resume= $_FILES['resume']['tmp_name'];

			$saved_resume = "./documents/"."/".$full_name."/".$get_resume;
			move_uploaded_file($temp_resume, $saved_resume);
			echo $saved_resume;
			// ,'".$saved_resume."'

			$query="INSERT INTO apply(full_name,dob,gender,education,address,profession,photo,mobile_number,marital_status,religion,working_hours,salary_expectation,experience,resume) VALUES('$full_name','$dob','$gender','$education','$address','$profession','".$saved_photo."','$mobile_number','$marital_status','$religion','$working_hours','$salary_expectation','$experience','".$saved_resume."')";

			$result=mysqli_query($db,$query);

			if($result){
				header('location: ./SuccessApplyRequest.php');
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
			height: 830px;
			flood-color: left;
			position: relative; 
			background-image: url("./home3.jpg");
			background-size: cover;
		}
	
		.footer_body{
			top: 910px;
		}
	</style>
	<style type="text/css">
		.Apply_Job_write{
			text-align: center;
			font-size: 30px;
			padding-top: 10px;
			font-family: 'calibri';
		}
		.form{
			width: 100%;
			height: 700px;
			position: relative;
			box-sizing: border-box;
			text-align: center;
			padding-top: 0px;
		}
		.form_data{
			width: 60%;
			height: 630px;
			border-radius: 5%;
			position: relative;
			box-sizing: border-box;
			display: inline-block;
			background-color: blue;
			background: rgba(176, 110, 40, 0.5);
		}
		.L_form_data{
			width: 50%;
			height: 100%;
			position: relative;
			box-sizing: border-box;
			float: left;
			padding-top: 40px;
			padding-left: 40px;
		}
		.R_form_data{
			width: 50%;
			height: 100%;
			position: relative;
			box-sizing: border-box;
			float: left;
			padding-top: 40px;
		}
		label{
			font-size: 20px;
			display: block;
		}
		label:after 
		{ content: ": " }
		input{
			width: 200px;
			height: 25px;
			margin-bottom: 20px;
			border: 2px solid #0d2b1d;
			border-radius: 10px;
		}
		select{
			width: 200px;
			height: 25px;
			border: 2px solid #0d2b1d;
			margin-bottom: 20px;
			border-radius: 10px;
		}
		.select{
			height: 30px;
			width: 200px;
		}
		.applySubmitButton{
			width: 250px;
			height: 40px;	
			margin-top: 20px;
			border-radius: 10px;
			outline: none;
			font-size: 30px;
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
						<h1>Apply For Job</h1>
					</div>
				</div>
				<div class="form">
					<div class="form_data">
						<form method="post" action="./apply.php" enctype="multipart/form-data">
							<div class="L_form_data">
							
								<label class="label" for="full_name">Full Name</label>
								<input type="text" name="full_name" placeholder="Full Name" required="true" style="outline: none;" style="outline: none;"><br>
								<label class="label" for="dob">Date of Birth</label>
								<input type="date" name="dob" required="true" style="outline: none;"><br>
								<label for="gender">Gender</label>
								<select class="select" name="gender" required="true" style="outline: none;">
									<option>Select Gender</option>
									<option>Male</option>
									<option>Female</option>
									<option>Other</option>
								</select><br>
								<label class="label" for="education">Education</label>
								<input type="text" name="education" placeholder="eg. Secondary School" required="true" style="outline: none;"><br>
								<label class="label"  for="address">Address</label>
								<input type="text" name="address" placeholder="Address" required="true" style="outline: none;"><br>
								<label for="profession">Profession</label>
								<select class="select" name="profession" required="true" style="outline: none;">
									<option>Select Profession</option>
									<option>Baby Sitter</option>
									<option>child Care</option>
									<option>Cook</option>
									<option>Elder Care</option>
									<option>House Maid</option>
									<option>Patient Care</option>
								</select><br>
								<label class="upload" for="photo">Photo Uplode</label>
								<input type="file" name="photo" style="height: 100%" required="true" style="outline: none;"><br>

							</div>
							<div class="R_form_data">
								<label class="label"  for="mobile_number">Mobile Number</label>
								<input type="tel" name="mobile_number" placeholder="Mobile Number" required="true" style="outline: none;"><br>
								<label class="label" for="marital_status">Marital Status</label>
								<select class="select" name="marital_status" required="true" style="outline: none;">
									<option>Select</option>
									<option>Yes</option>
									<option>No</option>
								</select><br>
								<label class="label" for="religion">Religion</label>
								<select class="select" name="religion" required="true" style="outline: none;">
									<option>Select a Religion</option>
									<option>Hindu</option>
									<option>Muslim</option>
									<option>Sikh</option>
									<option>Chirischan</option>
								</select><br>
								<label for="working_hours">Working Hours</label>
								<input type="number" name="working_hours" placeholder="working_hours" required="true" style="outline: none;"><br>
								<label for="salary_expectation">Salary Expectation</label>
								<input type="number" name="salary_expectation" placeholder="eg. 10000" required="true" style="outline: none;"><br>
								<label for="experience">Experience</label>
								<input type="number" name="experience" placeholder="eg. 1" required="true" style="outline: none;"><br>
								
								<label class="upload" for="resume">Resume Uplode</label>
								<input type="file" name="resume" style="height: 100%" required="true" style="outline: none;"><br>
							</div>

							<button type="submit" class="applySubmitButton" name="submit">
								Submit
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
