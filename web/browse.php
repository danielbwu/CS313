<?php

    session_start();

    if(!isset($_SESSION["items"])) {
        init_items();
    }

    function addToCart($item) {

    }

    function init_items() {
        $p1;
        $p1->id = 1;
        $p1->name = "#2 Pencils (5-pack)";
        $p1->desc = "School-approved #2 pencils";
        $p1->price = 1.99;
        $p1->qty = 0;

        $p2;
        $p2->id = 2;
        $p2->name = "Erasers (2-pack)";
        $p2->desc = "A set of standard pink erasers";
        $p2->price = 0.99;
        $p2->qty = 0;

        $p3;
        $p3->id = 3;
        $p3->name = "Gel Pens (5-pack)";
        $p3->desc = "Ink pens of various colors";
        $p3->price = 4.99;
        $p3->qty = 0;

        $items = array($p1->id=>$p1, $p2->id=>$p2, $p2->id=>$p2);
        $_SESSION["items"] = $items;
        
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Browse Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
        function addToCart(id) {
            console.log("Adding item " + id.toString() + " to cart");
        }
    </script>
</head>
<body>
    <?php
		require("nav.php");
	?>
    <!--Main Content-->
    <div class="container">
        <form id="myForm" action="cart.php" method="post">
            <div class="container-fluid col-md-12">
                <table class="table">
                    <thead>
                        <th>Product</th>
                        <th class="col-md-1">Price</th>
                        <th class="col-md-1">Quantity</th>
                        <th class="col-md-2"></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Product 1</td>
                            <td>$5.00</td>
                            <td><input type="number" size="2" min="0" max="99"></td>
                            <td><button type="button">Add to Cart</button></td>
                        </tr>
                        <?php
                            foreach($_SESSION["items"] as $p => $p_value) {
                                echo "<tr>" . 
                                "<td>" . $p_value->name . "</td>" . 
                                "<td>$" . $p_value->price . "</td>" . 
                                "<td>" . "<input type=\"number\" name=\"quantity\" size=\"2\" min=\"0\" max=\"99\" value=\"" . $p_value->qty . "\">" . "</td>" . 
                                "<td>" . "<button type=\"button\" class=\"btn btn-success\" onclick=\"addToCart(" . $p . ")\">Add to Cart</button>" . "<td>" . 
                                "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <input type="submit" value="View Cart" />
            </div>
        </form>
    </div>

</body>
</html>