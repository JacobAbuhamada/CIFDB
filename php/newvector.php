
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Jacob Abuhamada">
      <meta name="keywords" content="CIF, CIFDB, Common, Integrative, Framework">
      <meta name="color-scheme" content="light only">
      <title>CIFDB | Add New Experience</title>  
      <link rel="stylesheet" href="../css/style.css">
    </head> 
<body>  


    <?php 
        include "header.php";

        if (!isset($_SESSION['user'])) {
            header('Location: login.php');
        }

    ?>

       <h1>Add New Experience</h1>
       
       <div class="content-wrapper" style="text-align: center;">
           <div class="portfolio-items-wrapper">

               <div class="portfolio-item-wrapper">
                    <div class="portfolio-img-background">

                        <div class="img-text-wrapper">
                            <div class="logo-wrapper">
                              <a href="present.php">  
                                <img src="../images/presentbutton.jpg">
                              </a>
                            </div>
                
                            <div class="subtitle">
                                <a href="present.php">Click here to input your current experience.</a>
                            </div>
                        </div>
                    </div>
               </div>
               <br> 
               <br> 
               <br> 
               <br> 

               <div class="portfolio-item-wrapper">
                    <div class="portfolio-img-background">
                        <div class="img-text-wrapper">
                            <div class="logo-wrapper">
                            <a href="past.php">
                                <img src="../images/pastbutton.jpg">
                            </a>
                            </div>
                
                            <div class="subtitle">
                                <a href="past.php">Click here to input a past or imagined experience.</a>
                            </div>
                        </div>
                    </div>

           </div>
           </div>
       </div>

    </div>
    
</body>

</html>