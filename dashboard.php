

<?php
require_once('config.php');
session_start();
if(!isset($_SESSION['userid']))
{
   header("location:login.php"); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    






<div>
        <?php
        $con=mysqli_connect($host,$db_user,$db_pass,$db_name);
        if(isset($_POST['create']))
        {
          

                $filename= $_FILES['adBanner']['name'];
                $target_dir="upload/";

                if($filename !=''){ 

                    $target_file = $target_dir.basename($_FILES['adBanner']['name']);
                    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $extensions_arr = array("jpg","jpeg","png","gif");
                    
                     if(in_array($extension,$extensions_arr)){
                        $image_base64 = base64_encode(file_get_contents($_FILES['adBanner']
                        ['tmp_name'] ));
                        $image = "data::image/".$extension.";base64,".$image_base64;

                        if(move_uploaded_file($_FILES['adBanner']['tmp_name'], $target_file
                        )){
                            $query = "INSERT INTO adverts(bannername,banner) VALUES (' ".$filename." ',' ".$image."')";
                            mysqli_query($con,$query);
                        }
                     }
 
                }


                $adTitle=mysqli_real_escape_string($con,$_POST['adTitle']);
                $adDesc=mysqli_real_escape_string($con,$_POST['adDesc']);
                $adCost=mysqli_real_escape_string($con,$_POST['adCost']);
                $adTaud=mysqli_real_escape_string($con,md5($_POST['adTaud']));
                $adTags=mysqli_real_escape_string($con,$_POST['adTags']);
                $adDuration=mysqli_real_escape_string($con,$_POST['adDuration']);
                $username = $_SESSION['userid'];
{
            $sql = "INSERT INTO adverts (title, userid, description, cost, targetaudience, tags, duration ) VALUES(?,?,?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$adTitle, $username, $adDesc, $adCost, $adTaud, $adTags, $adDuration]);
            if ($result){ 
                echo "Success";
            } else{
                echo "Error";
            }


              } 
            
            
            }
        
     

            
        ?>
    </div>







<nav class="navbar navbar-expand-lg navbar-light navbg">
      
        </button>
       
          <div class="navbar-nav">
            <a class="nav-item nav-link " href="index.php">Home </a>
            <a class="nav-item nav-link" href="login.php">Login</a>
            <a class="nav-item nav-link" href="registration.php">Register</a>
            <a class="nav-item nav-link active" href="dashboard.php">Dashboard<span class="sr-only">(current)</span></a>
            
          </div>
        </div>
    </nav>



<h1>
WELCOME - 
<?php echo $_SESSION['userid']; 
if($_SESSION['isAdmin'] == 1){
    echo " Admin";
}else{
    echo " User";
}



?>
</h1>

<form action=dashboard.php  method="post" enctype="multipart/form-data">
            <div class="container" >
            <div class="row">
                <div class="col-sm-5">
                    <h1>Add a new advert</h1>

                    <label for="adTitle"> <strong>  Title </strong> </label>
                    <input class="form-control" type="text" name="adTitle" required>

                    <label for="adDesc"> <strong>  Description </strong> </label>
                    <textarea class="form-control" name="adDesc" required style="height:20vh"> </textarea>
                  
                    <label for="adCost"> <strong>  Cost per click (INR) </strong> </label>
                    <input class="form-control" type="text" name="adCost" required>
                    <div style="padding-top :5vh;padding-bottom:5vh;">
                    <label for="adBanner"> <strong>  Banner:  </strong> </label>
                    <input  type="file" name="adBanner" >
                    </div>

                    <label for="adTaud"> <strong>  Target Audience </strong> </label>
                    <input class="form-control" type="text" name="adTaud" required>

                    <label for="adTags"> <strong>  Tags </strong> </label>
                    <input class="form-control" type="text" name="adTags" required>

                    <label for="adDuration"> <strong>  Duration (hours) </strong> </label>
                    <input class="form-control" type="text" name="adDuration" required>


                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" name="create" value="Submit">
                     
                </div>
            </div>






<br>
<br>
<a href="logout.php">LOGOUT</a>

</body>
</html>
