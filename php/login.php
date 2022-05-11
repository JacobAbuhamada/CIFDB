<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Jacob Abuhamada">
      <meta name="keywords" content="CIF, CIFDB, Common, Integrative, Framework">
      <meta name="color-scheme" content="light only">
      <title>CIFDB | Log In</title>  
      <link rel="stylesheet" href="../css/style.css">

    </head>

<body>

    <?php
        include "header.php";
        
        if (isset($_SESSION['user'])) {
            header('Location: newvector.php');
        }
    ?>  

 
    <section class="signup-form">
        <h1>Log In</h1>
        <br>
        <form action="login-handler.php" method="POST">
            <!-- Username:  <input type="text" name="username"><br><br>
            Password:  <input type="text" name="password"><br> -->
            <label for="email">Email:</label>
            <input type="email" class="field" name="email" id="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" class="field" id="password" name="password" required>
            <br><br>
            <section class="submission">
                <button type="submit" class="field" name="submit" value="Login">Login</button>
            </section>
            <br><br>
            <section class="signup">
                <h3>Don't have an account? <a href="../consent.html">Create Account</a></h3>
            </section>
        </form>
    </section>
</body>

</html>