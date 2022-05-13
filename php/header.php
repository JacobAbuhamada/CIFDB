<?php 

session_start();

// echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
echo "<div class='brand' ><h1>CIF Database</h1></div>";
echo '<script src="../js/navbar.js"></script>';

if (!isset($_SESSION['user'])) {
    echo '<div class="container">
            <div class="nav-wrapper">
                <div class="left-side">
                    
                    <div class="nav-link-wrapper item-to-hide">
                        <a href="about.php">About</a>
                    </div>
                    <div class="nav-link-wrapper item-to-hide">
                        <a href="contact.php">Contact</a>
                    </div>

                    <div class="nav-link-wrapper">
                        <a href="login.php">Log In</a>
                    </div>
                </div>

                <div class="more">
                    <button id="hamburger">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="dropdown">
                        <a href="about.php">About</a>
                        <a href="contact.php">Contact</a>
                    </div>
                </div>
                
            </div>
        </div>';
       
} else {
    echo '<div class="container">
        
                <div class="nav-wrapper">
                    <div class="left-side">
                        <div class="nav-link-wrapper item-to-hide">
                            <a href="analytics.php">Analytics</a>
                        </div>
                        <div class="nav-link-wrapper">
                            <a href="newvector.php">Add New Experience</a>
                        </div>
                        <div class="nav-link-wrapper item-to-hide">
                            <a href="about.php">About</a>
                        </div>
                        <div class="nav-link-wrapper item-to-hide">
                            <a href="contact.php">Contact</a>
                        </div>
                        <div class="nav-link-wrapper item-to-hide">
                            <a href="profile.php">Profile</a>
                        </div>
                        <div class="nav-link-wrapper">
                            <a href="scripts/logout.php">Log Out</a>
                        </div>
                    </div>

                    <div class="more">
                        <button id="hamburger">
                            <i class="fa fa-bars"></i>
                        </button>
                        <div class="dropdown">
                        <div class="nav-link-wrapper"><a class="" href="analytics.php">Analytics</a></div>
                         <div class="nav-link-wrapper"><a class="" href="about.php">About</a></div>
                         <div class="nav-link-wrapper"><a class="" href="contact.php">Contact</a></div>
                         <div class="nav-link-wrapper"><a class="" href="profile.php">Profile</a></div>
  
                        </div>
                    </div>
                </div>
            </div>';
}


?>