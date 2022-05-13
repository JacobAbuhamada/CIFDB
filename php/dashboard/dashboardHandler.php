<?php
    // include_once 'header.php';

    require_once 'scripts/class-db.php';
    require_once 'scripts/conn.php';

     
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if($conn->connect_error){
        die("Failed to connect with MySQL: " . $conn->connect_error);
    }

    $operationHuman = array("AVG" => "Average", "STDDEV" => "Standard Deviation", "MIN" => "Minimum", "MAX" => "Maximum");
    $fieldHuman = array("X" => "Functioning", "Y" => "Intensity", "Z" => "Valence", "SoS" => "Sense of Self");

    function getStats($conn){

        $stats = array();
        
        if(isset($_SESSION["user"])){
            $stats["user"] = array();
        }
        $stats["everyone"] = array();

        $operations = ["AVG", "STDDEV", "MIN", "MAX"];
        $fields = ["X", "Y", "Z", "SoS"];
        foreach($operations as $operation ){
            foreach($fields as $field ){
                $value;
                $userValue;
                
                if(isset($_SESSION["user"])){
                    $userValue = $conn->query("SELECT ".$operation."(".$field.") AS value FROM vectors WHERE ID = {$_SESSION['user']["ID"]}")->fetch_assoc()["value"];
                }
                $value = $conn->query("SELECT ".$operation."(".$field.") AS value FROM vectors") -> fetch_assoc()["value"];
                
                if($operation.$field == "AVGX"){ // incrementing by 5 for the function
                    $value += 5;
                    if(isset($_SESSION["user"])){
                        $userValue += 5;
                    }
                }

                if(isset($_SESSION["user"])){
                    if(!isset($stats["user"][$field])){
                        $stats["user"][$field] = array();
                    }
                    $stats["user"][$field][$operation] = $userValue;
                }
                if(!isset($stats["everyone"][$field])){
                    $stats["everyone"][$field] = array();
                }
                $stats["everyone"][$field][$operation] = $value;
            }
        }
        return $stats;
    }

    $stats = getStats($conn);

    // Count total experiences

    $avgNumExperience =  count($conn->query("SELECT * FROM vectors")->fetch_all()) / count($conn->query("SELECT * FROM user")->fetch_all());
    $totalNumExperiences =  count($conn->query("SELECT * FROM vectors WHERE ID = {$_SESSION["user"]["ID"]}")->fetch_all());


?>