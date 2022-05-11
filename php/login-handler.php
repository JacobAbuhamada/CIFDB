<?php
    // include_once 'header.php';

session_start();
 
if (isset($_SESSION['user'])) {
    header('Location: newvector.php');
}
 
require_once 'class-db.php';
 
$error_message = '';
if (isset($_POST['submit'])) {
    // echo $_POST['email'] . $_POST['password'];
    $db = new DB();
    $response = $db->check_credentials($_POST['email'], $_POST['password']);
    
    // echo var_dump($response);
    // exit();

    if ($response) {
        $_SESSION['user'] = array("ID" => $response["ID"], "email" => $_POST['email'], "password" => $response["password"], "join_date" => $response["password"]);
        header('Location: newvector.php');
    }
    else{
        $error_message = "Email or password is invalid.";
    }
}
?>
 
<?php if (!empty($error_message)) { ?>
    <div class="error">
        <strong><?php echo $error_message; ?></strong>
    </div>
<?php } ?>