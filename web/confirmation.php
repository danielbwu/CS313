<?php
    session_start();

    $streetAddress = $city = $state = $zip = "";
    $success = true;

    //Get data from request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Get street address
        if (empty($_POST["streetAddress"])) {
            $success = false;
        }
        else {
            $streetAddress = test_input($_POST["streetAddress"]);
        }

        //Get city
        if (empty($_POST["city"])) {
            $success = false;
        }
        else {
            $city = test_input($_POST["city"]);
        }

        //Get state
        if (empty($_POST["state"])) {
            $success = false;
        }
        else {
            $state = test_input($_POST["state"]);
        }

        //Get zip
        if (empty($_POST["zip"])) {
            $success = false;
        }
        else {
            $zip = test_input($_POST["zip"]);
        }
        
    }

    //Validates input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!--Main Content-->
    <div class="container">
        <div class="container-fluid jumbotron text-center">
            <h2>Order Confirmed</h2>
            <p><b>Order Total:</b> $<?php echo $_SESSION["total"]?></p>
            <p><b>Ship To:</b> <?php echo $streetAddress . " " . $city . ", " . $state . " " . $zip ?></p>
            <a href="browse.php"><button class="btn btn-primary">Done</button></a>
        </div>
    </div>
</body>
</html>
<?php

?>