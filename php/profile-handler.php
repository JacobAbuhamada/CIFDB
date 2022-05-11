<?php
require_once 'class-db.php';
require_once 'conn.php';

session_start();
 
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

$arr_message = array();
if (isset($_POST['submit'])) {
   $inputs = array('gender'=>array('0'=>'male','1'=>'female','2'=>'nb','3'=>'other'),
            'race'=>array('0'=>'native', '1'=>'asian', '2'=>'black', '3'=>'pacific', '4'=>'white', '5'=>'two_or_more', '6'=>'otherace'),
            'soc_class'=>array('0'=>'poor','1'=>'working','2'=>'middle','3'=>'up-mid','4'=>'upper'),
            'vet_status'=>array('0'=>'active','1'=>'veteran','2'=>'not_vet','3'=>'no_say_vet'),
            'dis_status'=>array('0'=>'not_dis','1'=>'disabled','2'=>'no_say_dis'));
   $birthdate = $_POST['birthdate'];
   $gender = $_POST['gender'];
   $trans = $_POST['trans'];
   $race = $_POST['race'];
   $ethnicity = $_POST['ethnicity'];
   $religion = $_POST['religion'];
   $economics = $_POST['economics'];
   $culture = $_POST['culture'];
   $education = $_POST['education'];
   $country = $_POST['country'];
   $zip = $_POST['zip'];
   $soc_class = $_POST['soc_class'];
   $vet_status = $_POST['vet_status'];
   $dis_status = $_POST['dis_status'];

   $maj_depression = isset($_POST['maj_depression']);
   $min_depression = isset($_POST['min_depression']);
   $GAD = isset($_POST['GAD']);
   $PTSD = isset($_POST['PTSD']);
   $social_anx = isset($_POST['social_anx']);
   $OCD = isset($_POST['OCD']);
   $DID = isset($_POST['DID']);
   $dissociative = isset($_POST['dissociative']);
   $bipolar = isset($_POST['bipolar']);
   $psychotic = isset($_POST['psychotic']);
   $personality = isset($_POST['personality']);
   $sleep = isset($_POST['sleep']);
   $eating = isset($_POST['eating']);
   $dementia = isset($_POST['dementia']);
   $additional_diag = $_POST['additional_diag'];

   $maj_depression_sus = isset($_POST['maj_depression_sus']);
   $min_depression_sus = isset($_POST['min_depression_sus']);
   $GAD_sus = isset($_POST['GAD_sus']);
   $PTSD_sus = isset($_POST['PTSD_sus']);
   $social_anx_sus = isset($_POST['social_anx_sus']);
   $OCD_sus = isset($_POST['OCD_sus']);
   $DID_sus = isset($_POST['DID_sus']);
   $dissociative_sus = isset($_POST['dissociative_sus']);
   $bipolar_sus = isset($_POST['bipolar_sus']);
   $psychotic_sus = isset($_POST['psychotic_sus']);
   $personality_sus = isset($_POST['personality_sus']);
   $sleep_sus = isset($_POST['sleep_sus']);
   $eating_sus = isset($_POST['eating_sus']);
   $dementia_sus = isset($_POST['dementia_sus']);
   $susp_diag = $_POST['susp_diag'];
   $Rx = $_POST['Rx'];

    if($maj_depression){
        $maj_depression = 2;
    } elseif ($maj_depression_sus){
        $maj_depression = 1;
    } else {
        $maj_depression = 0;
    }

    if($min_depression){
        $min_depression = 2;
    } elseif ($min_depression_sus){
        $min_depression = 1;
    } else {
        $min_depression = 0;
    }

    if($GAD){
        $GAD = 2;
    } elseif ($GAD_sus){
        $GAD = 1;
    } else {
        $GAD = 0;
    }

    if($PTSD){
        $PTSD = 2;
    } elseif ($PTSD_sus){
        $PTSD = 1;
    } else {
        $PTSD = 0;
    }

    if($social_anx){
        $social_anx = 2;
    } elseif ($social_anx_sus){
        $social_anx = 1;
    } else {
        $social_anx = 0;
    }

    if($OCD){
        $OCD = 2;
    } elseif ($OCD_sus){
        $OCD = 1;
    } else {
        $OCD = 0;
    }

    if($DID){
        $DID = 2;
    } elseif ($DID_sus){
        $DID = 1;
    } else {
        $DID = 0;
    }

    if($dissociative){
        $dissociative = 2;
    } elseif ($dissociative_sus){
        $dissociative = 1;
    } else {
        $dissociative = 0;
    }

    if($bipolar){
        $bipolar = 2;
    } elseif ($bipolar_sus){
        $bipolar = 1;
    } else {
        $bipolar = 0;
    }

    if($psychotic){
        $psychotic = 2;
    } elseif ($psychotic_sus){
        $psychotic = 1;
    } else {
        $psychotic = 0;
    }

    if($personality){
        $personality = 2;
    } elseif ($personality_sus){
        $personality = 1;
    } else {
        $personality = 0;
    }

    if($sleep){
        $sleep = 2;
    } elseif ($sleep_sus){
        $sleep = 1;
    } else {
        $sleep = 0;
    }

    if($eating){
        $eating = 2;
    } elseif ($eating_sus){
        $eating = 1;
    } else {
        $eating = 0;
    }

    if($dementia){
        $dementia = 2;
    } elseif ($dementia_sus){
        $dementia = 1;
    } else {
        $dementia = 0;
    }

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if($conn->connect_error){
        die("Failed to connect with MySQL: " . $conn->connect_error);
    }

    $result = $conn->query("SELECT * FROM profile WHERE ID = {$_SESSION['user']['ID']}");
    if ($result){
        $result = $result->fetch_assoc();
    // $result['status'] = 1;
        if ($result) {
            $conn->query("DELETE FROM profile WHERE ID = {$_SESSION['user']['ID']}");
        }
        $stmt = $conn->prepare(
            "INSERT INTO `profile` (`ID`,`DOB`, `gender`, `trans`, `race`,`ethnicity`, `religion`,
            `econ_stance`, `cultural_stance`, `education`, `country`, `zip`, `soc_class`, `vet_status`, 
            `dis_status`, `maj_depression`, `min_depression`, `GAD`, `PTSD`, `social_anx`, `OCD`, `DID`, 
            `dissociative`, `bipolar`, `psychotic`, `personality`, `sleep`, `eating`, `dementia`, `known_diagnoses`, 
            `susp_diagnoses`, `medications`) 
            VALUES (?,?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
        );
        $stmt->bind_param('ssssssssssssssssssssssssssssssss',
            $_SESSION["user"]["ID"],$birthdate, $gender, $trans, $race, 
            $ethnicity, $religion, $economics, $culture, $education, 
            $country, $zip, $soc_class, $vet_status, $dis_status, $maj_depression, 
            $min_depression, $GAD, $PTSD, $social_anx, $OCD, 
            $DID, $dissociative, $bipolar, $psychotic, $personality, 
            $sleep, $eating, $dementia, $additional_diag, $susp_diag, $Rx
        );
        $result = $stmt->execute();
    }
    

    // $db = new DB();
    //    $sql = "INSERT INTO `profile` (`ID`,`DOB`, `gender`, `trans`, `race`,`ethnicity`, `religion`,
//     `econ_stance`, `cultural_stance`, `education`, `country`, `zip`, `soc_class`, `vet_status`, 
//     `dis_status`, `maj_depression`, `min_depression`, `GAD`, `PTSD`, `social_anx`, `OCD`, `DID`, 
//     `dissociative`, `bipolar`, `psychotic`, `personality`, `sleep`, `eating`, `dementia`, `known_diagnoses`, 
//     `susp_diagnoses`, `medications`) 
//     VALUES ({$_SESSION['user']['ID']},'{$birthdate}', '{$gender}', '{$trans}', '{$race}', 
//     '{$ethnicity}', '{$religion}', '{$economics}', '{$culture}', '{$education}', 
//     '{$country}', '{$zip}', '{$soc_class}', '{$vet_status}', '{$dis_status}', '{$maj_depression}', 
//     '{$min_depression}', '{$GAD}', '{$PTSD}', '{$social_anx}', '{$OCD}', 
//     '{$DID}', '{$dissociative}', '{$bipolar}', '{$psychotic}', '{$personality}', 
//     '{$sleep}', '{$eating}', '{$dementia}', '{$additional_diag}', '{$susp_diag}', '{$Rx}')";

    // $result = $conn->store_profile_results($sql);
    echo $conn->error;
    if ($result){
        header('Location: profile.php?profile=success');
    }

}