<?php

session_start();
$user_email = "";
$error="";
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
                // $_SESSION['logged_in'] = true;
                $_SESSION['testing'] = time();
                header('location: index.php');
                return;
            } 
            else 
            {
                $_SESSION['error'] = 'Invalid password!';
                header('location: log_in.php');
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
<body class="body_login">
     <header class="text-primary">
     <div class="nav">
            <!-- Nav menu with side menu -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light pmd-navbar pmd-z-depth fixed-top">
              
              <button class="navbar-toggler pmd-navbar-toggle" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-target="#navbarSupportedContent">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <a class="navbar-brand" href="index.php" title="Home">English Language for Everyone</a>
              <div class="pmd-sidebar-overlay"></div>
              <div class="collapse navbar-collapse pmd-navbar-sidebar bg-light p-2 notify-menu" id="navbarSupportedContent" >
                  <ul class="navbar-nav ml-auto items text-center">
                      <li class="nav-item dropdown pmd-dropdown ">
                          <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" data-sidebar="true" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Courses
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <i class="dropdown-item">Level Classes
                                  <ul class="submenu dropdown-menu">
                                      <li class="dropdown-item"><a href="#">Level 1</a> </li>
                                      <li class="dropdown-item"><a href="#">Level 2</a> </li>
                                      <li class="dropdown-item"><a href="#">Level 3</a> </li>
                                      <li class="dropdown-item"><a href="#">Level 4</a> </li>
        
                                  </ul>
                            </i>
                              <i class="dropdown-item" href="#">Advance Classes
                                      <ul class="submenu dropdown-menu">
                                      <li class="dropdown-item"><a href="#">Perspective 1</a> </li>
                                      <li class="dropdown-item"><a href="#">Perspective 2</a> </li>
                                      <li class="dropdown-item"><a href="#">Perspective 3</a> </li>
                                     </ul>
                              </i>
        
                              <div class="dropdown-divider"></div>
                              <i class="dropdown-item" href="#">Special classes
                                     <ul class="submenu dropdown-menu">
                                      <li class="dropdown-item"><a href="#">Intercom Grammar</a> </li>
                                      <li class="dropdown-item"><a href="#">Special Grammar</a> </li>
                                      <li class="dropdown-item"><a href="#" title="Professional English Language Class">PELC</a> </li>
                                      <li class="dropdown-item"><a href="#">Writing Class</a> </li>
                                      <li class="dropdown-item"><a href="#">Conversation Class</a> </li>
                                      <li class="dropdown-item"><a href="#">Vocabulary Class</a> </li>
                                      <li class="dropdown-item"><a href="#">Special Grammar</a> </li>
                                    </ul>
                              </i>
                          </ul>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link text-primary" href="about.php">About Us</a>
                      </li>
                      
                      <li class="nav-item">
                          <a class="nav-link text-primary active" href="log_in.php" title="Continue to your Account">Log In</a>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link text-primary" href="sign_up.php" title="Create Account">Sign Up</a>
                     </li>
                      <li class="nav-item">
                      
                          <!-- <div class="pmd-navbar-right-icon ml-auto">
                                  <a class="btn btn-md text-primary pmd-btn-fab pmd-btn-flat pmd-ripple-effect" href="#">Search <i class="fas fa-search"></i></a>
                          </div> -->
                      </li>
            </ul>
                
                       
                        
                  </div>
                 
                  </ul> 
              </div>
             
              <div class="pmd-sidebar-overlay"></div>
          </nav>
          </div>
       <!-- <nav class="navbar navbar-expand-md navbar-light bg-light background text-center fixed-top ">
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
        </nav>-->
        
    </header> 

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-6 form-div">
                    <form action="log_in.php" method="post">
                        <!-- <img src="images/logo.png" alt="logo" id="logo" class="logo"> -->
                        <!-- <h3 class="text-center">Log In</h3> -->
                        <p class="text-center text-muted">Please enter your Email & password</p>

                        <hr>
                        <?php
                              if(isset($_SESSION['error']))
                              {
                                echo '<div class="alert alert-danger"><li>';
                                echo ($_SESSION['error']);
                                echo'</li></div>';
                                unset($_SESSION['error']);
                              }
                            ?>
                        <div class="form-group">
                            <label for="user_email">Email or Username</label>
                            <input type="text" class="form-control form-control-md" placeholder="email@example.com" name="user_email"required >
                        </div>
                        <div class="form-group">
                            <label for="user_Password">Password</label>
                            <input type="password" class="form-control form-control-md" placeholder="*********" name="user_password"required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-md" name="log_in">Log In</button>
                        </div>
                        <!-- <p class="text-center form-p">Not a member yet? <a href="sign_up.php">Register here</a> </p> -->
                    </form>
                    <div class="text-center">
                            <p>...or...</p>
                            <a href="sign_up.php" class="btn btn-success mb-3">Create Account</a>
                            <p class="small"><a href="forgot_password.php" class="">Forgotten your account?</a></p>
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

    </html>