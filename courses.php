<?php
include_once('util.php');
session_start();
//check whether the user is logged in or not
if(! isset($_SESSION['user_id'])){
    echo "<p>Please <a href='log_in.php'>Log In </a>first so you can Enroll in our courses</p>";
    die("Access Denied! Please Log in first!");
    return;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- For internet explorer -->
    <meta http-equiv="X-UA Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Using Font Awesome -->
    <script src="https://kit.fontawesome.com/3d9f0ba563.js" crossorigin="anonymous"></script>
    <!-- Title Icon -->
    <link rel="icon" type="image/png" href="images/logo.png">
    <!-- custom stylesheet -->
    <link rel="stylesheet" href="styles/style.css">
    	<!-- Syling notification -->
	<link rel="stylesheet" href="styles/notification.css">
    <title>Courses</title>
</head>

<body>
<header>
         <?php
         //loading header file from util.php
             top_header();
        ?>
    </header>
    <main>
        <div class="container-fluid ">
            <nav class="bdcrumb pt-3">
                <ol class="list-unstyled">
                    <li class=""><a href="index.php">Home </a>>></li>
                    <li class=""><a href="courses.php">Courses </a>>></li>
                    <li class="">Levels</li>
                </ol>
            </nav>
            <h1>Courses</h1>
            <!-- Cards here -->
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
                    <div class="card border border-primary my-2" style="width: 15rem;">
                        <img src="images/book1.jpg" alt="book1" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Intercom Book 1</h5>
                            <p class="card-text">English Language for Everone</p>
                        </div>
                        <a href="#" class="btn btn-primary" title="Enroll for free">Get Enrolled</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center ">
                    <div class="card border border-primary  my-2" style="width: 15rem;">
                        <img src="images/book2.jpg" alt="book2" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Intercom Book 2</h5>
                            <p class="card-text">English Language for Everone</p>
                        </div>
                        <a href="#" class="btn btn-primary" title="Enroll for free">Get Enrolled</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
                    <div class="card border border-primary  my-2" style="width: 15rem;">
                        <img src="images/book3.jpg" alt="book3" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Intercom Book 3</h5>
                            <p class="card-text">English Language for Everone</p>
                        </div>
                        <a href="#" class="btn btn-primary" title="Enroll for free">Get Enrolled</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center ">
                    <div class="card border border-primary  my-2" style="width: 15rem;">
                        <img src="images/book4.jpg" alt="book4" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Intercom Book 4</h5>
                            <p class="card-text">English Language for Everone</p>
                        </div>
                        <a href="#" class="btn btn-primary" title="Enroll for free">Get Enrolled</a>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>