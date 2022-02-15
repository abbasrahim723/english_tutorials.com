<?php

// session_start();

require_once "pdo.php";
require_once "util.php";
//check if user is already logged in
if(isset($_SESSION['user_id'])){
    $uid = $_SESSION['user_id'];
    header('location:index.php');
    return;
}
//first check if fields are filled
if(isset($_POST['user_email']) && isset($_POST['user_password'])){

    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    //grab data from the database
    $count = $pdo->query("SELECT * FROM user_table where user_email='$user_email'")->fetchColumn();
    $stmt = $pdo->query("SELECT * FROM user_table where user_email='$user_email'");
    if($count == 0){
        $_SESSION['error'] = "Email doesn't exist";
        header('location:log_in.php');
        return;
    }
     while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) )
    {
       
        $_SESSION['db_email'] = htmlentities($row['user_email']);
        $_SESSION['db_password']= htmlentities($row['user_password']);
    
        

        if($_SESSION['db_email'] === $_POST['user_email'])
        {
            $_SESSION['success'] = "Email matched in database";
            if (password_verify($_POST['user_password'], htmlentities($row['user_password'])))
            {
                $_SESSION['success'] = 'Password is valid';
                $_SESSION['user_id'] = htmlentities($row['user_id']);
                $_SESSION['user_name'] = htmlentities($row['user_name']);
                $_SESSION['user_email'] = htmlentities($row['user_email']);
                $_SESSION['user_dob'] = htmlentities($row['user_dob']);
                $_SESSION['user_gender'] = htmlentities($row['user_gender']);
                $_SESSION['user_password'] = htmlentities($row['user_password']);
                $_SESSION['user_image'] = htmlentities($row['user_image']);
                $_SESSION['user_verfied'] = htmlentities($row['verfied']);

                // $_SESSION['logged_in'] = true;
                $_SESSION['testing'] = time();
                header('location: index.php');
                return;
            } 
            else 
            {
                $_SESSION['error'] = 'Invalid password!';
                header('location: log_in.php?Wrong Password');
                return;
            }
            
        }
                $_SESSION['error'] = "Invalid Email Adddress";
                header('location: log_in.php?Email does not exist');
                return;

       
    }

}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Using Font Awesome -->
    <script src="https://kit.fontawesome.com/3d9f0ba563.js" crossorigin="anonymous"></script>
    <!-- Title Icon -->
    <link rel="icon" type="image/png" href="images/logo.png">
    <!-- custom stylesheet -->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/log_in.css">
    	<!-- Syling notification -->
	<link rel="stylesheet" href="styles/notification.css">
    <title>Log In</title>
</head>
<body>
    <header class="text-primary">
        <nav class="navbar navbar-expand-md navbar-light background text-center fixed-top ">
            <a href="index.php" class="navbar-brand text-primary brand" title="Home Page">English Language for EveryOne</a>
          <button type="button" class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#menu">
              <span class="navbar-toggler-icon"></span>
          </button>
         
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ml-auto">
			
                <li class="nav-item">
                    <a class="nav-link text-primary" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary active" href="log_in.php">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="sign_up.php">Sign Up</a>
                </li>
            </ul>
          </div>
        </nav>
        
    </header>
    <main>
       
        <div class="jumbotron jumbotron-fluid log_in mt-3 ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-4  offset-md-4 offset-sm-4 form-div border border-primary rounded">
                        <h1 class="mb-3 text-center">Log In</h1>
                        <div class="dropdown-divider"></div>

                        <p class="text-center text-muted">Please enter your Email & password</p>
                        <?php
                              if(isset($_SESSION['error']))
                              {
                                echo '<div class="alert alert-danger"><li>';
                                echo ($_SESSION['error']);
                                echo'</li></div>';
                                unset($_SESSION['error']);
                              }
                            ?>
                        <form action="log_in.php" class="mb-3 text-center" method="post">
                            <div class="form-group ">
                                 <label for="email" class="sr-only">Email:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                             <input type="email" required class="form-control center-log-in " placeholder="email@example.com" id="user_email" name="user_email">
                                      </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password:</label>
                                    <div class="input-group">
                                         <div class="input-group-prepend">
                                             <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                                 <input type="password" class="form-control center-log-in " placeholder="*******"  id="user_password" name="user_password" required>
                                         </div>
                                    </div>
                            </div> 
                            <?php 
                                if ( isset($_SESSION['error']) ) {
                                    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
                                    unset($_SESSION['error']);
                                }
                                ?>
                            <button type="submit" class="btn btn-primary btn-block" value="">Log In</button>
                        </form>
                        <div class="text-center">
                            <p>...or...</p>
                            <a href="sign_up.php" class="btn btn-success mb-3">Create Account</a>
                            <p class="small"><a href="forgot.php" class="">Forgotten your account?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    <footer>
       <?php
       footer();
       ?>
    </footer>

    <script src="script.js"></script>

     <!-- Bootstrap JavaScript and Jquery -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>