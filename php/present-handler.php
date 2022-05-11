<?php
require_once 'class-db.php';
require_once 'conn.php';

session_start();
 
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

$arr_message = array();
if (isset($_POST['submit'])) {
    $description = $_POST['description'];
    $X = $_POST['X'];
    $Y = $_POST['Y'];
    $Z = $_POST['Z'];
    $SoS = $_POST['SoS'];

    $v_time = $_POST['time'];
    $v_date = $_POST['date'];

    // past experience = 0, present experience = 1
    $isPresentExperience = 1;

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if($conn->connect_error){
        die("Failed to connect with MySQL: " . $conn->connect_error);
    }
    
    $stmt = $conn->prepare(
        "INSERT INTO `vectors` (`ID`,`v_time`,`v_date`,`X`,`Y`,`Z`,`SoS`,`description`,`past_or_pres`) 
        VALUES (?,?,?,?,?,?,?,?,?)"
    );
    $stmt->bind_param('sssssssss',
        $_SESSION["user"]["ID"],$v_time, $v_date, $X, $Y, 
        $Z, $SoS, $description, $isPresentExperience
    );
    $result = $stmt->execute();
    
    // $db = new DB;
    // $sql = "INSERT INTO `vectors` (`ID`,`v_time`,`v_date`,`X`,`Y`,`Z`,`SoS`,`description`,`past_or_pres`) 
    // VALUES ({$_SESSION['user']['ID']},'{$v_time}', '{$v_date}', '{$X}', '{$Y}', 
    // '{$Z}', '{$SoS}', '{$description}', '{$isPresentExperience}')";


    // $result = $db->store_vector_results($sql, $_POST['time'],$_POST['date']);
    echo $conn->error;
    if ($result){
        header('Location: profile.php?experience=success');
    }
}