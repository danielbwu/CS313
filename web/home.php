<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/home.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		require("nav.php");
	?>
	<div class="bg col-sm-12"></div>
	<!--Main content-->
	<div class="container">

		<div class="col-sm-2"></div>

		<div class="container-fluid col-sm-8">
			<div class="jumbotron text-center row container-fluid" id="bio">
				<div class="col-sm-6 container">
					<img src="images/headshot.jpg" class="img-rounded img-responsive" alt="daniel wu" id="headshot" />
				</div>
				<div class="col-sm text-left well">
					<h2>Daniel Wu</h2>
					<p>
						<b>Hometown:</b><br />
						Mesa, AZ<br />
						<b>Major:</b><br />
						Software Engineering<br />
						<b>Email:</b><br />
						wu15002@byui.edu<br />
						<b>Phone:</b><br />
						123-456-7890<br />
					</p>
				</div>
			</div>

			<div class="container-fluid text-center col-sm-6" id="about">
				<ul class="list-group">
					<li class="list-group-item active"><b>About Me</b></li>
					<li class="list-group-item">Hi! My name is Daniel Wu. I grew up in Mesa,
					Arizona, and I currently live in Rexburg, Idaho attending Brigham Young
					University - Idaho. I am a Software Engineering student in my 8th semester.</li>
				</ul>
			</div>

			<div class="container-fluid text-left col-sm-6" id="hobbies">
				<ul class="list-group">
					<li class="list-group-item active"><b>Hobbies:</b></li>
					<li class="list-group-item">Programming</li>
					<li class="list-group-item">Computer Building</li>
					<li class="list-group-item">D&D</li>
					<li class="list-group-item">Video Games</li>
				</ul>
			</div>

		</div>

		<div class="col-sm-2"></div>

	</div>
</body>
</html>