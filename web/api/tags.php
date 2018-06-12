<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    try
    {
        $dbUrl = getenv('DATABASE_URL');

        $dbopts = parse_url($dbUrl);

        $dbHost = $dbopts["host"];
        $dbPort = $dbopts["port"];
        $dbUser = $dbopts["user"];
        $dbPassword = $dbopts["pass"];
        $dbName = ltrim($dbopts["path"],'/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            if (!empty($_GET["event_id"])) {
                $event_id = test_input($_GET["event_id"]);
                $statement = $db->prepare("SELECT * FROM event_tag AS et JOIN tag AS t ON et.tag_id=t.id WHERE et.event_id=:id");
                $statement->bindValue(':id', $event_id, PDO::PARAM_INT);
                $statement->execute();
                $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

                echo json_encode($rows);
            }
            else {
                $statement = $db->prepare("SELECT * FROM event_tag AS et JOIN tag AS t ON et.tag_id=t.id");
                $statement->execute();
                $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

                echo json_encode($rows);
            }
            
        }
        // else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //     if (!empty($_POST["event_id"])) {
        //         $event_id = test_input($_POST["event_id"]);
        //         $statement = $db->prepare("SELECT * FROM event_participant AS ep JOIN participant AS p ON ep.participant_id=p.id WHERE ep.event_id=:id");
        //         $statement->bindValue(':id', $id, PDO::PARAM_INT);
        //         $statement->execute();
        //         $participants = $statement->fetchAll(PDO::FETCH_ASSOC);

        //         echo json_encode($participants);
        //     }
        // }
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }

    //Validates input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
