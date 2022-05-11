<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Jacob Abuhamada">
      <meta name="keywords" content="CIF, CIFDB, Common, Integrative, Framework">
      <meta name="color-scheme" content="light only">
      <title>CIFDB | About</title>  
      <link rel="stylesheet" href="../css/style.css" >
    </head>
<body>

<?php 
include "header.php";

if (!isset($_SESSION['user'])) {
    header('Location: account-out.php');
}

?>

    <h1>About the CIF Database</h1>

    <br><br>
    <form action="../consent-about-in.html">
        <input type="submit" value="View Study Consent Form" />
    </form>

    <div class="about">
        
        <br>
        This study aims to collect data about different types of experiences and their context, and to use
        that data along with demographic information to derive insights about the nature of the human mind.
        This data will ultimately be used to support or refute the theoretical conceptual framework underlying
        it. In time, the site will expand to include analytics dashboarding and other features to allow you or
        a professional to explore/deconstruct your psychology. The collective data from all participants will
        also support research in psychology, psychiatry, sociology, religion, phenomenology/philosophy of mind, 
        and any other fields related to the mind or consciousness.
        <br><br>
        
        <img src="../images/CIF_Map_3_title_name_year.jpg">
        
    </div>

</body>

</html>