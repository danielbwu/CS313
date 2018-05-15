<?php
    session_start();

    $total = 0;
    foreach($_SESSION["cart"] as $p => $p_value) {
        $total += $p_value->price * $p_value->qty;
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

    <script type="text/javascript">
        function removeFromCart(id) {
            console.log("Adding item " + id.toString() + " to cart");
            if (id != null) {
                //Send ajax request
                var request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                    }
                };
                request.open("POST", "remove_from_cart.php", true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send("id=" + id);
            }
        }
    </script>
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
                    if (count($_SESSION["cart"]) > 0) {
                        foreach($_SESSION["cart"] as $p => $p_value) {
                            echo "<tr id=\"" . $p . "\">" . 
                                "<td>" . $p_value->name . "</td>\n" . 
                                "<td>$" . $p_value->price . "</td>\n" . 
                                "<td>" .  $p_value->qty . "</td>\n" . 
                                "<td>" . "<button type=\"button\" class=\"btn btn-danger\" onclick=\"\">Remove</button><td>\n" . 
                                "</tr>\n";
                        }
                        echo "<th>Total:</th>\n" . 
                            "<th class=\"col-md-1\">$" . $total . "</th>\n";
                    }
                    else {
                        echo "<h2>Your Cart is Empty</h2>\n";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>