<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Jacob Abuhamada">
      <meta name="keywords" content="CIF, CIFDB, Common, Integrative, Framework">
      <meta name="color-scheme" content="light only">
      <title>CIFDB | Profile</title>  
      <link rel="stylesheet" href="../css/style.css">

    </head>
<body>

    <?php 
        include "header.php";

        if (!isset($_SESSION['user'])) {
            header('Location: login.php');
        }

        if(isset($_GET['experience']) && $_GET['experience'] == "success"){
            echo "<div><p><strong>Thank you for submitting your experience.</strong></p></div>"; // experience submitted
        }
        else if(isset($_GET['past_experience']) && $_GET['past_experience'] == "success"){ // past experience submitted
            echo "<div><p><strong>Thank you for submitting your experience.</strong></p></div>";
        }
        else if(isset($_GET['profile']) && $_GET['profile'] == "success"){ // profile informatino  submitted
            echo "<div><p><strong>Thank you for submitting your information.</strong></p></div>";
        }
    ?> 

    <h1>Profile</h1><br>
    <div>
        <h2>User Info</h2>
        <br>
        Your email address and password have been encrypted to protect your data/identity.<br>
        <br>
        <p>Your Email: <?php echo $_SESSION["user"]["email"] ?>
        <hr>
        <br>
    </div>
    <div>
        <h2>User Demographics</h2>
        <br>

        <a href="editprofile.php">
            <button type="submit">Edit Profile</button>
        </a>
    </div>
    <div>
        <br>
        <hr>
        <br>
        
        <h2>User Data</h2>
        <br>
        <p>If you would like a copy of all your data, please <a href="contact.php">Contact</a> me with an emailed request.</p>
    </div>
</body>

</html>