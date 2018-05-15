<?php
    session_start();
    $id = "";

    //Get data from request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Get product id
        if (empty($_POST["itemID"])) {
            //echo "ID not found";
            $success = false;
        }
        else {
            $id = test_input($_POST["itemID"]);
            $success = true;
        }
        
    }

    //Validates input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($success) {
        unset($_SESSION["cart"][$id]);
    }

    $_SESSION["total"] = 0;
    foreach($_SESSION["cart"] as $p => $p_value) {
        $_SESSION["total"] += $p_value->price * $p_value->qty;
    }

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
            <a href="browse.php"><button class="btn btn-primary">Return to Browse</button></a>
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
                    if (count($_SESSION["cart"]) > 0) {
                        foreach($_SESSION["cart"] as $p => $p_value) {
                            echo "<tr>\n" . 
                                    "<td>" . $p_value->name . "</td>\n" . 
                                    "<td>$" . $p_value->price . "</td>\n" . 
                                    "<td>" .  $p_value->qty . "</td>\n" . 
                                    "<td>" . 
                                        "<form method=\"post\" action=\"cart.php\">\n" . 
                                            "<input type=\"hidden\" name=\"itemID\" value=\"" . $p . "\">\n" . 
                                            "<input type=\"submit\" class=\"btn btn-danger\" value=\"Remove\" />\n" . 
                                        "</form>" . 
                                    "<td>\n" . 
                                "</tr>\n";
                        }
                        echo "<th>Total:</th>\n" . 
                            "<th class=\"col-md-1\">$" . $_SESSION["total"] . "</th>\n";
                    }
                    else {
                        echo "<h2>Your Cart is Empty</h2>\n";
                    }
                    ?>
                </tbody>
            </table>
            <?php
            if (count($_SESSION["cart"]) > 0) {
                echo "<a href=\"checkout.php\"><button class=\"btn btn-success\">Proceed to Checkout</button></a>";
            }
            ?>
        </div>
    </div>
</body>
</html>