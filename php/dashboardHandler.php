<?php
    // include_once 'header.php';

    require_once 'class-db.php';
    require_once 'conn.php';

     
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if($conn->connect_error){
        die("Failed to connect with MySQL: " . $conn->connect_error);
    }



    $averageFunctioningResult = $conn->query("SELECT AVG(X) AS AverageFunctioning FROM vectors");
    $averageIntenstiyResult = $conn->query("SELECT AVG(Y) AS AverageIntensity FROM vectors");
    $averageValenceResult = $conn->query("SELECT AVG(Z) AS AverageValence FROM vectors");
    $averageSoSResult = $conn->query("SELECT AVG(SoS) AS AverageSoS FROM vectors");

    $averageEveryoneFunctioning = number_format($averageFunctioningResult -> fetch_assoc()["AverageFunctioning"]) + 5;
    $averageEveryoneIntenstiy = number_format($averageIntenstiyResult -> fetch_assoc()["AverageIntensity"]) + 5;
    $averageEveryoneValence = $averageValenceResult -> fetch_assoc()["AverageValence"];
    $averageEveryoneSoS = $averageSoSResult -> fetch_assoc()["AverageSoS"];

    $stats = array("averageFunctioning" => array( "everyone" => $averageEveryoneFunctioning),
    "averageIntenstiy" => array( "everyone" => $averageEveryoneIntenstiy),
    "averageValence" => array( "everyone" => $averageEveryoneValence),
    "averageSoS" => array( "everyone" => $averageEveryoneSoS));

    if(isset($_SESSION["user"])){
        $averageFunctioningResult = $conn->query("SELECT AVG(X) AS AverageFunctioning FROM vectors WHERE ID = {$_SESSION['user']["ID"]}");
        $averageIntenstiyResult = $conn->query("SELECT AVG(Y) AS AverageIntensity FROM vectors WHERE ID = {$_SESSION['user']["ID"]}");
        $averageValenceResult = $conn->query("SELECT AVG(Z) AS AverageValence FROM vectors WHERE ID = {$_SESSION['user']["ID"]}");
        $averageSoSResult = $conn->query("SELECT AVG(SoS) AS AverageSoS FROM vectors WHERE ID = {$_SESSION['user']["ID"]}");
    
        $averageFunctioning = number_format($averageFunctioningResult -> fetch_assoc()["AverageFunctioning"]) + 5;
        $averageIntenstiy = number_format($averageIntenstiyResult -> fetch_assoc()["AverageIntensity"]) + 5;
        $averageValence = $averageValenceResult -> fetch_assoc()["AverageValence"];
        $averageSoS = $averageSoSResult -> fetch_assoc()["AverageSoS"];

        $stats["averageFunctioning"]["user"] = $averageFunctioning;
        $stats["averageIntenstiy"]["user"] = $averageIntenstiy;
        $stats["averageValence"]["user"] = $averageValence;
        $stats["averageSoS"]["user"] = $averageSoS;
    }

    // Count total experiences

    $avgNumExperience =  count($conn->query("SELECT * FROM vectors")->fetch_assoc()) / count($conn->query("SELECT * FROM user")->fetch_assoc());
    $totalNumExperiences =  count($conn->query("SELECT * FROM vectors WHERE ID = {$_SESSION["user"]["ID"]}")->fetch_assoc());


?>