<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Jacob Abuhamada">
      <meta name="keywords" content="CIF, CIFDB, Common, Integrative, Framework">
      <meta name="color-scheme" content="light only">
      <title>CIFDB | Contact</title>  
      <link rel="stylesheet" href="../css/style.css">

    </head>
<body>

    <?php 
        include "header.php";

        if (!isset($_SESSION['user'])) {
            header('Location: contact-out.php');
        }

    ?>


   
    <h1>Contact</h1>

    If you have a problem with your log-in or account, require assistance with using the 
    website or apps, or have any other questions/suggestions/comments that are not answered
    by the <a href="../consent-about-in.html">consent form</a>, please do not hesitate to 
    contact the site administrator at: 
    <a href = "mailto: cif.database@gmail.com">cif.database@gmail.com</a>
    <br><br>
    Feedback is always welcome!

    <!-- <div class="contact form">
        <form id="contact-form" method="post" action="">
        <input name="name" type="text" class="form-control" placeholder="Your Name" required>
        <br>
        <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required> 
        <br>
        <select name="msg_type" id="msg_type">
            <option value="" disabled selected>Correspondence Type: </option>
            <option value="login_prob">Login Problem (forgot email/password)</option>
            <option value="comment">Suggestion/Comment/s</option>
            <option value="help">Question/Help with using Site</option>
            <option value="other">Other</option>
        </select>
        <br>
        <textarea name="message" class="form-control" placeholder="Your message here" row="10" cols="40"></textarea>
        <br>
        <input type="submit" class="form-control" value="SEND MESSAGE">
        <hr>
        </form>
    </div> -->
</body>

</html>