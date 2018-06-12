<?php
    session_start();

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
        //echo 'Success!';
        getEvents();
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }

    function getEvents() {
        $statement = $db->prepare("SELECT * FROM event");
        $statement->execute();
        $events = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($events);
    }
?>
