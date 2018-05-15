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
        $p1->qty = 1;

        $p2;
        $p2->id = 2;
        $p2->name = "Erasers (2-pack)";
        $p2->desc = "A set of standard pink erasers";
        $p2->price = 0.99;
        $p2->qty = 1;

        $p3;
        $p3->id = 3;
        $p3->name = "Gel Pens (5-pack)";
        $p3->desc = "Ink pens of various colors";
        $p3->price = 4.99;
        $p3->qty = 1;

        $p4;
        $p4->id = 4;
        $p4->name = "Backpack";
        $p4->desc = "Just a regular backpack";
        $p4->price = 24.99;
        $p4->qty = 1;

        $p5;
        $p5->id = 5;
        $p5->name = "Ruler";
        $p5->desc = "A standard 12-inch ruler";
        $p5->price = 3.99;
        $p5->qty = 1;

        $items = array($p1->id=>$p1, $p2->id=>$p2, $p3->id=>$p3, $p4->id=>$p4, $p5->id=>$p5);
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
        function addToCart(id) {
            console.log("Adding item " + id.toString() + " to cart");
            if (id != null) {
                var qty = parseInt(document.getElementById(id.toString() + "-qty").value);
                console.log("Quantity: " + qty.toString());

                if (qty != null && qty != 0) {
                    //Send ajax request
                    var request = new XMLHttpRequest();
                    request.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log(this.responseText);
                        }
                    };
                    request.open("POST", "add_to_cart.php", true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send("id=" + id + "&qty=" + qty);
                }
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
                        <?php
                            foreach($_SESSION["items"] as $p => $p_value) {
                                echo "<tr>" . 
                                "<td>" . $p_value->name . "</td>" . 
                                "<td>$" . $p_value->price . "</td>" . 
                                "<td>" . "<input type=\"number\" id=\"" . $p . "-qty\" size=\"2\" min=\"0\" max=\"99\" value=\"" . $p_value->qty . "\">" . "</td>" . 
                                "<td>" . "<button type=\"button\" class=\"btn btn-success\" onclick=\"addToCart(" . $p . ")\">Add to Cart</button>" . "<td>" . 
                                "</tr>\n";
                            }
                        ?>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-success" value="View Cart" />
            </div>
        </form>
    </div>

</body>
</html>