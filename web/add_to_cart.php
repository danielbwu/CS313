<?php
    $id = $qty = "";

    //Get data from request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Get product id
        if (empty($_POST["id"])) {
            echo "ID not found";
        }
        else {
            $id = test_input($_POST["id"]);
            echo $id;
        }

        //Get quantity
        if (empty($_POST["qty"])) {
            echo "Quantity not found";
        }
        else {
            $qty = test_input($_POST["qty"]);
            echo $qty;
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
