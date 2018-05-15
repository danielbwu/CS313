<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Checkout</title>
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
        <div class="container-fluid col-md-6">
            <h1>Checkout</h1>
            <h2>Order Total: <?php echo $_SESSION["total"]?></h2>
            <form method="post" action="confirmation.php">
                <div class="form-group">
                    <label for="streetAddress">Street address</label>
                    <input type="text" class="form-control" name="streetAddress" placeholder="Enter address" />
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" placeholder="Enter city" />
                </div>
                <div class="form-group">
                    <label for="state">State/Province</label>
                    <input type="text" class="form-control" name="state" placeholder="Enter State/Province" />
                </div>
                <div class="form-group">
                    <label for="zip">Zip code</label>
                    <input type="number" maxlength="8" class="form-control" name="zip" placeholder="Enter zip code" />
                </div>
                <input type="submit" class="btn btn-primary" value="Place Order" />
            </form>
        </div>
    </div>
</body>
</html>