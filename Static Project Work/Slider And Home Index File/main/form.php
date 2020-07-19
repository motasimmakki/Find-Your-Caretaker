<?php
	require 'header.html';
	require 'footer.html';
?> 
		<?php
			if(isset($_REQUEST['submit'])){
				$username="";
				$email="";
				$password="";
				$db=mysqli_connect('localhost','root','mysql','myDatabase');
				$username=mysqli_real_escape_string($db, $_REQUEST['username']);
				$email=mysqli_real_escape_string($db, $_REQUEST['email']);
				$password=mysqli_real_escape_string($db, $_REQUEST['password']);
				$confirmpassword=mysqli_real_escape_string($db, $_REQUEST['confirmpassword']);
				if($password!=$confirmpassword){
					?>
						<script type="text/javascript">
							alert("Confirm Password Does Not Match !");
						</script>
					<?php
				}
				else{
					$sql="SELECT * FROM newaccount WHERE username='$username' OR email='$email'";
					$result=mysqli_query($db,$sql);
					$fetch=mysqli_fetch_assoc($result);
					
					if($fetch){
						if($fetch['username']===$username){
							?>
								<script type="text/javascript">
									alert("Username Already Exist !");
								</script>
							<?php
						}
						else if($fetch['email']===$email){
							?>
								<script type="text/javascript">
									alert("E-mail Already Exist !");
								</script>
							<?php
						}
						mysqli_free_result($result);
					}
					else{
						// $password=md5('$password');
						
						// $password=strrev($password);
						// $password=wordwrap($password,1,'!-@3_#(&^6%-)*{--9*}|',true);
						
						$sql="INSERT INTO newaccount(username,email,password) VALUES('$username','$email','$password')";
						
						$result=mysqli_query($db,$sql);

						if($result){
							header('location: ./SuccessRegistered.php');
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
			}
		?>	
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Find Your Caretaker</title>
	<style type="text/css">

		.body{
			top: -370px;
			width: 100%;
			height: 100vh;
			flood-color: left;
			position: relative; 
			background-image: url("./home3.jpg");
			background-size: cover;
		}

		.registerform{
			width: 1230px;
			height: 580px;
			position: absolute;
			/*border: 2px solid black;*/
			margin-left: 50px;
			margin-top: 40px;
			border-radius: 40px;
			/*background-color: rgb(159, 117, 85,0.8);*/
			background: rgba(176, 110, 40, 0.5);
		}
		.newaccount h1{
			font-family: calibri;
			font-size: 50px;
			margin-left: 300px;
			color: maroon;
		}
		.newaccount input{
			width: 600px;
			height: 40px;
			margin-left: 300px;
			font-size: 20px;
			margin-top: 30px;
			background-color: #edbfbf;
			border-radius: 10px;
			border: 3px solid #602d2d;
			outline: none;
			text-align: center;
		}
		.newaccount button{
			width: 600px;
			height: 50px;
			margin-top: 30px;
			margin-left: 300px;
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
		.newaccount button:hover{
			color: yellow;
		}	
		.footer_body{
			top: 735px;
		}
	</style>
</head>
<body>
	<div class="body">
		<div class="registerform">
			<form class="newaccount" method="POST" action="./form.php">
				<h1>Create an account :</h1>
				<input type="text" name="username" required="true" placeholder="Enter Username :">
				<input type="email" name="email" required="true" placeholder="Enter Email :">
				<input type="password" name="password" required="true" placeholder="Enter Password :" pattern=".{6,}" 
				oninvalid="this.setCustomValidity('Your Password Must Contain At Least 6 Characters !')"
				onchange="this.setCustomValidity('')">
				<input type="password" name="confirmpassword" required="true" placeholder="Confirm Password :" pattern=".{6,}"
				oninvalid="this.setCustomValidity('Re-Enter Your Password For Confirmation At Least 6 Characters !')"
				onchange="this.setCustomValidity('')"><br>
				<button type="submit" name="submit">REGISTER</button>
			</form>
		</div>
		
	</div>
</body>
</html>
