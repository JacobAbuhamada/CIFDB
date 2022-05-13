<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="color-scheme" content="light only">
    <title>Account Registration</title>
    <link rel="stylesheet" href="../css/style.css">
</head>


<body style="height: auto;">

    <?php
        include_once 'header.php';
        
        if (isset($_SESSION['user'])) {
            header('Location: newvector.php');
        }

    ?>

  <div class="wrapper">
    <br>
    <h2>Create Your Account</h2>
    <form action="scripts/signup-handler.php" method="post">
      <p><strong><?php 
        if(isset($_GET['error'])){
          if($_GET['error'] == "emailNotMatch"){
            echo "Emails don't match. Make sure that the Email and Confirm Email match.";
          }
          if($_GET['error'] == "passwordNotMatch"){
            echo "Passwords don't match. Make sure that the Password and Confirm Password match.";
          }
          if($_GET['error'] == "emailExists"){
            echo "Email already exists.";
          }
          if($_GET['error'] == "unknown"){
            echo "An unknown error happened. Please, try again later, or contact me at 
            <a href='mailto:cif.database@gmail.com'>cif.database@gmail.com</a>.";
          }
        }

      ?></strong></p>
      <div class="input-box">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required>
      </div>
      <br>
      <div class="input-box">
        <label for="confirmemail">Confirm Email: </label>
        <input type="email" name="confirmemail" id="confirmemail" placeholder="Please verify email address" required>
      </div>
      <br>
      <div class="input-box">
        <label for="password">Create Password: </label>
        <input type="password" name="password" id="password" pattern=".{8,}" placeholder="Eight or more characters" title="Eight or more characters" required>
      </div>
      <br>
      <div class="input-box">
        <label for="confirmpass">Confirm Password: </label>
        <input type="password" name="confirmpass" id="confirmpass" placeholder="Confirm password" required>
      </div>
      <br>
      <div class="consent">
        <input type="checkbox" id="consent" value="consent" required>
        <label for="consent">I accept all conditions of the <a href="../consent.php">consent form</a></label>
      </div>
      <br>
      <div class="StroopApp">
        <input type="checkbox" id="stroop" value="stroop" required>
        <label for="stroop">I have downloaded/will download the EncephalApp Stroop Test: <a href="https://www.encephalapp.com/" target="_blank" rel="noopener noreferrer">Apple iOS</a> | <a  href="https://play.google.com/store/apps/details?id=com.mobelux.stroop_android&hl=en_US&gl=US&showAllReviews=true" target="_blank" rel="noopener noreferrer"> Android</a></label>
      </div>
      <br>
      <div class="Samply">
        <input type="checkbox" id="samply" value="samply" required>
        <label for="samply"> 
          I have downloaded and joined/will download/join the study on the <a href="https://samply.uni-konstanz.de/studies/common-integrative-framework-study" target="_blank" rel="noopener noreferrer">Samply app</a></label>
      </div>

      <br>
      <div class="input-box button">
        <!-- <a href="editprofile.html">
          <input type="submit" name="submit" value="Register">
        </a>     -->
        <button type="reset">Reset</button>

          <button type="submit" name="submit">Submit</button>

      </div>
    </form>
    
      <div class="text">
        <h3>Already have an account? <a href="login.php">Log in now</a></h3>
      </div>
    </form>
  </div>
      <br>
    <?php include("components/_video_iframe.php") ?>
</body>
</html>