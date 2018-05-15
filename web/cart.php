<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Your Cart</title>
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
        <div class="container-fluid col-md-12">
            <h1>Your Cart</h1>
            <table class="table table-responsive">
                <thead>
                    <th>Product</th>
                    <th class="col-md-1">Price</th>
                    <th class="col-md-1">Quantity</th>
                    <th class="col-md-2"></th>
                </thead>
                <tbody>
                    <?php
                        foreach($_SESSION["cart"] as $p => $p_value) {
                            echo "<tr>" . 
                                "<td>" . $p_value->name . "</td>\n" . 
                                "<td>$" . $p_value->price . "</td>\n" . 
                                "<td>" .  $p_value->qty . "</td>\n" . 
                                "<td>" . "<button type=\"button\" class=\"btn btn-danger\" onclick=\"\">Remove</button><td>\n" . 
                                "</tr>\n";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>