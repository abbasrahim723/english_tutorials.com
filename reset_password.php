<?php

    session_start();
    // if someone is comming without permission or loging in
    if(!(isset($_SESSION['user_id']) && isset($_SESSION['user_email']))){
        die("Access Denied");
        return;
    }
    require_once "pdo.php"; //making database connection
    require_once "util.php"; //getting header and footer from this file

        //check if user is already logged in
        // if(isset($_SESSION['user_id'])){
        //     $uid = $_SESSION['user_id'];
        //     header('location:index.php');
        //     return;
        // }

        //first check if fields are filled
        if(isset($_POST['user_password']) && isset($_POST['c_user_password']))
        {
            
            // $password = $_POST['user_password'];
            // $c_password = $_POST['c_user_password'];

            if($_POST['user_password'] === $_POST['c_user_password'])
            {
                //first we need to hash the newly enterd password
                $options = [
                    'cost' => 12,
                ];
                $user_hashed_password = password_hash($_POST['c_user_password'],PASSWORD_BCRYPT, $options);

                    //now let's insert new password to the database
                $sql = "UPDATE user_table SET user_password = :u_pass WHERE user_id=:u_id AND user_email=:u_email";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                ':u_id' => $_SESSION['user_id'],
                ':u_email' => $_SESSION['user_email'],
                ':u_pass' => $user_hashed_password
                ));
                    $_SESSION['success_pass'] = 'Password changed Successfully';
                    header('location: log_out.php');
                    return;
            }
            else
            $_SESSION['error_pass'] = "Passwords didn't match";
            
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
    <title>Changing Password</title>
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
  
        
    </header> 

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-6 form-div">
                    <form action="reset_password.php" method="post" name="form1">
                        <h3 class="text-center">Changing Password</h3>
                        <!-- <p class="text-center text-muted">Please enter your Email & password</p> -->

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
                            <label for="user_Password">Password</label>
                            <input type="password" class="form-control form-control-md" placeholder="*********" name="user_password"required>
                        </div>
                        <div class="form-group">
                            <label for="c_user_Password">Password</label>
                            <input type="password" class="form-control form-control-md" placeholder="*********" name="c_user_password" onkeyup='check();' required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-md" name="reset_password" return CheckPassword(document.form1.user_password)>Update Password</button>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>

    </main>
    <footer>
    <?php
       footer(); //calling footer from util.php
       ?>
    </footer>
    <script src="script.js"></script>

<!-- Bootstrap JavaScript and Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </html>