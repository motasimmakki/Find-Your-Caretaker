<?php
	require 'header.html';
	require 'footer.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Find Your Caretaker</title>
	<link rel="stylesheet" type="text/css" href="design.css">

	<style type="text/css">
		.footer_body{
			top: 2550px;
		}
		select{
			width: 200px;
			height: 25px;
			border: 2px solid #0d2b1d;
			margin-bottom: 20px;
			border-radius: 10px;
		}
	</style>
</head>
<body style="background: rgba(176, 110, 40, 0.5);">
	<div class="main">
		<div class="img">
			<img src="culture.jpg">
		</div>
		<div class="started">
			<p>We connect families with caregivers and caregivers with jobs so that </p>
			<p>the world can go to work. And we're just getting started.</p>
		</div>
		<div class="technology">
			<div class="technology_img">
				<img src="caretaker.jpg">
			</div>
			<div class="technology_content">
				<h1>Our technology connects people</h1>
				<p>Since 2007, we've been the market leader in empowering families and caregivers to build heartfelt relationships. Our services are used as an HR recruiting and retention benefit by some of the world's leading companies. And our award-winning financial platform makes it easy for families to manage and pay for care. We're so much more than a babysitting website we're a game-changer for families, caregivers, and corporations.</p>
			</div>
		</div>
		<div class="life">
			<div class="life_content">
				<h1>We get it: you</h1>
				<h1>have a life</h1>
				<p>The work we do is important, but so is everything else in your life. We aim to support work-life balance by offering a terrific suite of benefits that span financial, emotional, and physical well-being. And we are constantly tapping into the voice of our employees to launch new benefits that people really value.</p>
			</div>
			<div class="life_img">
				<img src="caretaker.jpg">
			</div>
		</div>
		<div class="driven">
			<div class="driven_img">
				<img src="caretaker.jpg">
			</div>
			<div class="driven_content">
				<h1>Join an organization</h1>
				<h1>that's values-driven</h1>
				<p>We believe culture is as critical as business strategy—and ours is all about transparency, respect, and collaboration. We work hard to ensure our culture is consistent from Boston to the Bay Area, Austin to Berlin. And while we work in different times zones, we're united by our passion for helping people.</p>
			</div>
		</div>
		<div class="cares">
			<div class="cares_content">
				<h1>Be a part of a brand that cares</h1>
				<p>We believe caregiving is the most important job in the world: the flywheel that drives stable lives, meaningful work, and growing economies. So we help wherever and whenever we can: training refugees to work as caregivers, building a platform to offer health benefits to gig workers, and creating tools to make finding jobs easier.</p>
			</div>
			<div class="cares_img">
				<img src="caretaker.jpg">
			</div>
		</div>
		<div class="enjoy">
			<h1>We're changing the world, and enjoying</h1>
			<h1>every minute of it</h1>
		</div>
		<div class="search">
				<h1>Search jobs</h1>
				<select id="select">
					<option value="Select Departement">Select Departement</option>
					<option value="cook">Cook</option>
					<option value="Baby Sitter">Baby Sitter</option>
					<option value="Elder Care">Elder Care</option>
					<option value="House Maid">House Maid</option>
					<option value="Patient Care">Patient Care</option>
				</select>
				<button>Find Jobs</button>
		</div>
	</div>
</body>
</html>