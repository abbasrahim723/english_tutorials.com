<?php
session_start();
require_once "util.php";
require_once "pdo.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<!-- <meta http-equiv="refresh" content="60;url=log_out.php" /> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA Compatible" content="ie=edge">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<!-- Using Font Awesome -->
	<script src="https://kit.fontawesome.com/3d9f0ba563.js" crossorigin="anonymous"></script>
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="styles/style.css">
	<!-- Syling notification -->
	<link rel="stylesheet" href="styles/notification.css">
    <!-- Syling dashboard -->
	<link rel="stylesheet" href="styles/dashboard.css">
	<!-- Title Icon -->
	<link rel="icon" type="image/png" href="images/logo.png">
	<title>Dashboard</title>
	<style>
		.card1{
			margin: 0 auto;
			margin-top: 2%;
		}
	</style>
</head>
<body>
    <header>
        <?php
        top_header();
        ?>
    </header>
    <main class="">
        <div class="container-fluid dashboard">
            <h3 class="pt-3">Dashboard</h3>
          
            <div class="row">
            <div class="bg-light col-sm-12 col-md-8 pt-3 mb-3">
            <h4>Recently viewed courses</h4>

                <div class="row pb-3">
                    <div class="col-sm-12 col-md-4 recent ">
                        <div class="card">
                                <img class="card-img-top" src="images/back_4.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Conversation Class</h5>
                                    <p class="card-text">Instructor : Zia Ullah</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>        
                    <div class="col-sm-12 col-md-4 recent">
                        <div class="card">
                                <img class="card-img-top" src="images/back_4.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Writting Class</h5>
                                    <p class="card-text">Instructor : Saeed Ullah</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>        
                    </div>
                </div>
            
                <div class="col-sm-12 col-md-3 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="images/back_4.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Resume Building</h5>
                            <p class="card-text">Instructor : M Adil</p>
                            <p class="card-text"><small class="text-muted">Last updated 2 days ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="images/back_5.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Professional Practices</h5>
                            <p class="card-text">Course No# CS-404</p>
                            <p class="card-text"><small class="text-muted">Last updated 12 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="images/back_7.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Numerical Computing</h5>
                            <p class="card-text">Course No# CS-405</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 days ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="images/back_4.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Artificial Intelligence</h5>
                            <p class="card-text">Course No# CS-403</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="images/back_5.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Professional Practices</h5>
                            <p class="card-text">Course No# CS-404</p>
                            <p class="card-text"><small class="text-muted">Last updated 12 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="images/back_7.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Numerical Computing</h5>
                            <p class="card-text">Course No# CS-405</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 days ago</small></p>
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

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    
</body>
</html>