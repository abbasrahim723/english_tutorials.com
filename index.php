<?php
require_once "pdo.php";
require_once "util.php";
require_once "authenticator.php";
 session_start();
										//checking if token parameter is present or not
										//  if(isset($_GET['vkey'])){
										//  $token = $_GET['vkey'];
										//now calling function to verify the account
										//  verifyUserToken($token);
										//  }
 //now checking if user has clicked on reset link
 if(isset($_GET['password_token']))
 {
	 $password_token = $_GET['password_token'];

		// function verify_link($password_token)
		// {
		// 	// global $pdo;
		// 	$stmt = $pdo->prepare('SELECT * FROM user_table where vkey = :vkey');
		// 	$stmt->execute(array(':vkey' => $password_token));
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
		// 	$_SESSION['user_email'] = htmlentities($row['user_email']);
		// 	$_SESSION['user_id'] = htmlentities($row['user_id']);
		// 	header('location:reset_password.php');
		// 	return;

		// }
	verify_password_link($password_token);
	

 }

 //getting data to check if account is verified or not

 


// 2 hours in seconds
// $inactive = 30; 
// ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 2 hours

// session_start();

// if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
// 	echo("<script type='text/javascript'>alert('Your session has expired. Please <a href='log_in.php'>Log In </a> again.')</script>");
//    header('location: log_out.php');
// }
// $_SESSION['testing'] = time(); // Update session
// date_default_timezone_set('Asia/Karachi');
// $date = date('d-m-y h:i:s');
// echo $date;
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
	<!-- Title Icon -->
	<link rel="icon" type="image/png" href="images/logo.png">
	<title>English Tutorials</title>
	<style>
		.card1{
			margin: 0 auto;
			margin-top: 2%;
		}
	</style>
</head>
<body>	 
	<header class="text-primary">
		<?php
		top_header();
		?>
    </header>
	<main>
		
		<div class="container-fluid">
			<div class="row">
				<div class="jumbotron mt-3 col-sm-12">
					<h1>English Langugae for Everyone</h1>
					
					<p>
						Welcome to English Language for Everyone Specialization. Here it includes everything about English.
						Here you will be taught Intercom 2000 series. This series includes 4 levels of basic and 3 levels of
						advance grammar. We also offer specially designed classes of grammar for both basic and advance level.
						Our system of study includes weekly assigments and quizes which evaluate your learning.
					</p>
				</div>
				
				<!-- Slideshow starts here.......... -->
				<div class="container-fluid col-sm-12" id="myslide">
					<div class="carousel slide carousel-fade" id="slideshow" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="images/english.jpg" alt="book1" class="d-block w-100">
								<div class="carousel-caption d-none d-md-block">
									<h4 class="text-dark">Want to learn English</h4>
									<p class="text-dark">Learn English with our world class Instructors</p>
								</div>
							</div>
							<div class="carousel-item">
								<img src="images/english1.jpg" alt="book1" class="d-block w-100">
								<div class="carousel-caption d-none d-md-block">
									<h4 >Want to learn English</h4>
									<p >Learn English with our world class Instructors</p>
								</div>
							</div>
							<div class="carousel-item">
								<img src="images/english4.jpg" alt="book1" class="d-block w-100">
								
							</div>
							<div class="carousel-item">
								<img src="images/english3.jpg" alt="book1" class="d-block w-100">
								<div class="carousel-caption d-none d-md-block">
									<h4 class="text-dark">Want to learn English</h4>
									<p class="text-dark"> Learn English with our world class Instructors</p>
								</div>
							</div>
							
						</div>
						<a class="carousel-control-prev" href="#slideshow" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#slideshow" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		<?php
			if(isset($_SESSION['user_id'])){
				echo('
					<div class="mt-5">
						<div class=" col-sm-12">
							<div class="card card1" style="width: 80%;">
								<div class="card-header bg-primary text-white">
									<small> Part of our </small><a href="#" class="text-white"> English Language for Everyone Specialization</a>
								</div>
								<div class="card-body">
									<h3 class="card-title">Intercom 2000 Book 1</h3>
									<small class="muted">In Progress</small>
									<a href="intercom1.php" class="btn btn-primary float-right">Go to Course</a>
								</div>
			
								<div class="card-footer">
									English Tutorials
									<a href="#" class="card-link float-right">Share</a>
								</div>
							</div>
						</div>
					</div>');
			}
		?>
			
			<br>
		<div class="container col-sm-12">
			<div class="row text-center">
				<div class="col-sm-6 col-md-4 col-lg-3 ">
					<!-- Carousel is used here -->
					<a href="#">
						<img src="images/book1.jpg" alt="intercom_book1">
						<h4 class="text-center">Level One</h4>
					</a>

				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<!-- About Instructor Here -->
					<a href="#">
						<img src="images/book2.jpg" alt="intercom_book2">
						<h4 class="text-center">Level Two</h4>
					</a>

				</div>
				<div class="col-sm-6 col-md-4 col-lg-3 ">
					<!-- Carousel is used here -->
					<a href="#">
						<img src="images/book3.jpg" alt="intercom_book3">
						<h4 class="text-center">Level Three</h4>
					</a>

				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<!-- About Instructor Here -->
					<a href="#">
						<img src="images/book4.jpg" alt="intercom_book4">
						<h4 class="text-center">Level Four</h4>
					</a>

				</div>
			</div>
		</div>
		</div>
			</div>
	
	</main>

	<footer id="footer">
		<?php
		footer();
		?>
		
	</footer>
<?php
	if(isset($_SESSION['success_pass'])){
		echo "<script> alert('You have successfully changed password'); </script>";
		unset($_SESSION['success_pass']);
	}
?>
    <script src="script.js"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>