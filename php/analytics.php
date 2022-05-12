<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Jacob Abuhamada">
      <meta name="keywords" content="CIF, CIFDB, Common, Integrative, Framework">
      <meta name="color-scheme" content="light only">
      <title>CIFDB | Analytics</title>  
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/dashboard.css">

    </head>
<body>

<?php 
        include "header.php";
        include "dashboardHandler.php";

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
    
    <!-- tabs -->

        <ul class="tabs">
            <li>
                <a href="analytics.php?tab=summary">Summary Stats</a>
            </li><li>
                <a href="analytics.php?tab=vectors">Experiences</a>
            </li><li>
                <a href="analytics.php?tab=words">Word Frequency List</a>
            </li>
        </ul>

        <?php

            if(isset($_GET["tab"])){
                if($_GET["tab"] == "summary"){
                    include("dashboard/statistics.php");
                }
                else if($_GET["tab"] == "vectors"){
                    include("dashboard/vectors.php");
                }
                else if($_GET["tab"] == "words"){
                    include("dashboard/words.php");
                }
            }
            else{
                include("dashboard/statistics.php");
            }

        ?>

    

</body>
</html>