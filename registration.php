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
    <title>Register</title>
</head>
<body>
    <div>
        <?php
        if(isset($_POST['create'])){
            $username     = $_POST[ 'username'];
            $email     = $_POST[ 'email' ];
            $password  = md5($_POST['password']);

            $sql = "INSERT INTO users (username, email, password ) VALUES(?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$username, $email, $password]);
            if ($result){
                echo "Success";
            } else{
                echo "Error";
            }


        }



        ?>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light navbg">
          <div class="navbar-nav">
            <a class="nav-item nav-link " href="index.php">Home </a>
            <a class="nav-item nav-link " href="login.php">Login</a>
            <a class="nav-item nav-link active" href="registration.php">Register<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="dashboard.php">Dashboard</a>
          </div>
        </div>
    </nav>



    <div>
        <form action=registration.php method="post">
            <div class="container">

            <div class="row">
                <div class="col-sm-3">
                    <h1>Register</h1>

                    <label for="username"> <strong>  Username </strong> </label>
                    <input class="form-control" type="text" name="username" required>

                    <label for="Email"> <strong>  Email </strong> </label>
                    <input class="form-control" type="email" name="email" required>

                    <label for="password"> <strong>  Password </strong> </label>
                    <input class="form-control" type="password" name="password" required>
                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" name="create" value="Submit">
                     


                </div>

            </div>


</body>
</html>