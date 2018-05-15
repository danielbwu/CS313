<?php
    session_start();

    $id = $qty = "";
    $success = true;

    //Get data from request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Get product id
        if (empty($_POST["id"])) {
            echo "ID not found";
            $success = false;
        }
        else {
            $id = test_input($_POST["id"]);
            
        }

        //Get quantity
        if (empty($_POST["qty"])) {
            echo "Quantity not found";
            $success = false;
        }
        else {
            $qty = test_input($_POST["qty"]);
            
        }
        
    }

    //Validates input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Add items to cart
    if ($success) {
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
        }

        //Check if item is already in cart
        if (array_key_exists($id, $_SESSION["cart"])) {
            $_SESSION["cart"][$id]->qty += $qty;
        }
        else {
            $_SESSION["cart"][$id] = $_SESSION["items"][$id];
            $_SESSION["cart"][$id]->qty = $qty;
        }
        echo "Success";
    }
?>
