<?php

// Initialize the session
session_start();
 // 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
    
    
    require_once "config.php";// call config file
    $id =$_SESSION['id']; // catch login id
    $sql ="SELECT * FROM users WHERE id ='$id'";
    $query = mysqli_query($mysqli, $sql);
    $results = mysqli_fetch_assoc($query);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6 m-auto">
                <div class="card bg-light shadow">
                    <h3 class="display-5">Your Profile</h3>
            <label for="Username">Username : <?php echo  $results['username']; ?></label><br>
            <label for="Username">Email : example@gmail.com</label><br>
            <label for="Username">Created Time : <?php echo  $results['created_at']; ?></label><br>
            <p>
            <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
            <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
        </p>
    </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>
