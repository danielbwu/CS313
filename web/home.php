<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
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
	<div class="bg"></div>
	<!--Main content-->
	<div class="container">

		<div class="col-sm-2"></div>

		<div class="container-fluid col-sm-8">
			<div class="jumbotron text-center row container-fluid bio">
				<div class="col-sm-6">
					<img src="images/headshot.jpg" class="img-rounded img-responsive" alt="daniel wu" />
				</div>
				<div class="col-sm text-left">
					<h2>Daniel Wu</h2>
					<p>
						<b>Major:</b><br />
						Software Engineering
					</p>
				</div>
			</div>

			<div class="container text-center">
				<p>Here's some text</p>
			</div>
		</div>

		<div class="col-sm-2"></div>

	</div>
</body>
</html>