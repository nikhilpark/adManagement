<?php
require_once('config.php')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body>
    <div>
        <?php


        $con=mysqli_connect($host,$db_user,$db_pass,$db_name);

        if(isset($_POST['create']))
        {
           
            if(empty($_POST['username']) || empty($_POST['password']))
            {

                echo '<script>alert("Both fields are required")</script>';
            } else
            {

                $username=mysqli_real_escape_string($con,$_POST['username']);
                $password=mysqli_real_escape_string($con,md5($_POST['password']));
                $sql="SELECT * from users where username='$username' and password='$password'";
                $result=mysqli_query($con,$sql);
            }
                if(mysqli_num_rows($result)>0) 
                {
                
                    session_start();
                    $_SESSION['userid']=$username;

                    $row=mysqli_fetch_assoc($result); 
                    $isAdmin = $row['isAdmin'];
                    $_SESSION['isAdmin'] = $isAdmin;



                    
                    header("location:dashboard.php");
                }
                else
                {
                    echo '<script>alert("Wrong id/password")</script>';
                }
            }   
            
            

        
     


        ?>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light navbg">
        
          <div class="navbar-nav">
            <a class="nav-item nav-link " href="index.php">Home </a>
            <a class="nav-item nav-link active" href="login.php">Login<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="registration.php">Register</a>
            <a class="nav-item nav-link" href="dashboard.php">Dashboard</a>
          </div>
        </div>
    </nav>



    <div>
        <form action=login.php  method="post">
            <div class="container" >

            <div class="row">
                <div class="col-sm-3">
                    <h1>Login</h1>

                    <label for="username"> <strong>  Username </strong> </label>
                    <input class="form-control" type="text" name="username" required>

                    <label for="password"> <strong>  Password </strong> </label>
                    <input class="form-control" type="pass" name="password" required>
                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" name="create" value="Submit">
                     
                </div>
            </div>
      


</body>
</html>