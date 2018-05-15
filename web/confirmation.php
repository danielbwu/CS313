<?php

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
    
    <!--Main Content-->
    <div class="container">
        <div id="myForm"></div>
    </div>
</body>
</html>