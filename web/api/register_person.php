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

        $valid = true;
        $event_id = $name = $inumber = $notes = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["event_id"])) {
                $event_id = test_input($_POST["event_id"]);
                
            } else { $valid = false; }

            if (!empty($_POST["participant_name"])) {
                $name = test_input($_POST["participant_name"]);
                
            } else { $valid = false; }

            if (!empty($_POST["participant_inumber"])) {
                $inumber = test_input($_POST["participant_inumber"]);
                
            } else { $valid = false; }

            if (!empty($_POST["notes"])) {
                $notes = test_input($_POST["notes"]);
                
            } else { $notes = NULL; }

            if ($valid) {
                $p_id = NULL;
                //Validate person
                $statement = $db->prepare("SELECT id FROM participant WHERE inumber=:inum");
                $statement->bindValue(':inum', $inumber, PDO::PARAM_STR);
                $statement->execute();
                $person = $statement->fetch(PDO::FETCH_ASSOC);
                echo json_encode($person);
                //Add person to db if they don't exist
                if (count($person) == 0) {
                    $statement = $db->prepare("INSERT INTO participant(name, inumber) VALUES (:name, :inum);");
                    $statement->bindValue(':inum', $inumber, PDO::PARAM_STR);
                    $statement->bindValue(':name', $name, PDO::PARAM_STR);
                    $statement->execute();

                    $p_id = $pdo->lastInsertId('participant_id_seq');
                }
                else {
                    $p_id = $person['id'];
                }
                echo "Person ID: $p_id";

                //Check if person is already registered
                $statement = $db->prepare("SELECT * FROM event_participant AS ep JOIN participant AS p ON ep.participant_id=p.id WHERE ep.event_id=:id AND p.inumber=:inum");
                $statement->bindValue(':id', $event_id, PDO::PARAM_INT);
                $statement->bindValue(':inum', $inumber, PDO::PARAM_STR);
                $statement->execute();
                $person = $statement->fetchAll(PDO::FETCH_ASSOC);

                if (count($person) != 0) {
                    echo "User is already registered for this event";
                    die();
                }
                else {
                    $statement = $db->prepare("INSERT INTO event_participant(event_id, participant_id, notes) VALUES (:event_id, :p_id, :notes)");
                    $statement->bindValue(':event_id', $event_id, PDO::PARAM_INT);
                    $statement->bindValue(':p_id', $p_id, PDO::PARAM_INT);
                    $statement->bindValue(':notes', $notes, PDO::PARAM_STR);
                    $statement->execute();


                }
            } else { die(); }
        }

       
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
