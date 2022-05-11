<?php
require_once 'class-db.php';

session_start();
 
if (isset($_SESSION['user'])) {
    header('Location: newvector.php');
}

$arr_message = array();
if (isset($_POST['submit'])) {
 
    if ($_POST['email'] === $_POST['confirmemail'] && $_POST['password'] === $_POST['confirmpass']){
        $db = new DB();

        if(!$db->email_exists($_POST['email'])) {
        
            $response = $db->insert_user(
                array(
                
                    'email' => md5($_POST['email']),
                    'password' => md5($_POST['password']),
                    'join_date' => date("Y-m-d")
                )
            );

            // die(var_dump($response));

            if($response){
                $_SESSION['user'] = array("ID" => $response["ID"], "email" => $_POST['email'], "password" => $response["password"], "join_date" => $response["password"]);
                // echo var_dump($_SESSION['user']);
                // exit();
            }
            else{
                header("Location: signup.php?error=unknown");
                exit();
            }
            
            header("Location: editprofile.php?submit=success");
            
        } else {
            $arr_message = array('class' => 'error', 'message' => 'Email already exists.'); // is not going to be used at all.
            header("Location: signup.php?error=emailExists");
        }
    }
    else{
        if($_POST['email'] !== $_POST['confirmemail']){
            header("Location: signup.php?error=emailNotMatch");
        }
        else{
            header("Location: signup.php?error=passwordNotMatch");
        }
    }

    
}
?>