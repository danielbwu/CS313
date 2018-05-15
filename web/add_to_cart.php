<?php
    $id = $qty = "";

    //Get data from request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Get product id
        if (empty($_POST["id"])) {

        }
        else {
            $id = test_input($_POST["id"]);
        }

        //Get quantity
        if (empty($_POST["qty"])) {

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
?>
