<?php
require_once('config.php')

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light navbg">
          <div class="navbar-nav nav-div">
            <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="login.php">Login</a>
            <a class="nav-item nav-link" href="registration.php">Register</a>
            <a class="nav-item nav-link" href="dashboard.php">Dashboard</a>
          </div>
        </div>
    </nav>




<div class="container">

  <div class="ad">
   
  <?php

                $con=mysqli_connect($host,$db_user,$db_pass,$db_name);
                session_start();
                $sql="SELECT * from adverts";
                $result=mysqli_query($con,$sql) or die( mysqli_error($con));

                
     
                while ($row=mysqli_fetch_assoc($result)){ 
                      ?>
                      
                   
                    <div class="adCont">

                        
                            
                            <h2><?php echo $row['title'];?>  </h2>
                            <h4><?php echo $row['description'];?>  </h4> 
                            <p><?php echo $row['tags'];?></p>
                            <img alt="not available" width="50px" height="50px" src="<?=$row['banner'] ?>">
                            
                           
                      

                    </div>

                   







                     <?php
                     
                }
                     ?>

              



  </div>




</div>













</body>
</html>