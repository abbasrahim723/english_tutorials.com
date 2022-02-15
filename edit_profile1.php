<?php
require_once "pdo.php";
require_once "util.php";
session_start();
if(! isset($_SESSION['user_id'])){
    echo("ACCESS DENIED");
    return;
}
else{
    $user_name = $_SESSION['user_name'];
    $user_email = $_SESSION['user_email'];
    $user_dob = $_SESSION['user_dob'];
    $user_gender = $_SESSION['user_gender'];
}
// 2 hours in seconds
// $inactive = 30; 
// ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 2 hours

// session_start();

// if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
// 	echo("<script type='text/javascript'>alert('Your session has expired. Please <a href='log_in.php'>Log In </a> again.')</script>");
//    header('location: log_out.php');
// }
// $_SESSION['testing'] = time(); // Update session
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
	<!-- Title Icon -->
	<link rel="icon" type="image/png" href="images/logo.png">
	<title><?= $user_name?>'s Profile</title>
	<style>
		.card1{
			margin: 0 auto;
			margin-top: 2%;
		}
	</style>
</head>

<body>
	<?php
	if(! isset($_SESSION['user_id'])){
		echo('<header class="text-primary">');
		echo('<nav class="navbar navbar-expand-md navbar-light background text-center ">');
		echo('<a href="index.php" class="navbar-brand brand">English Language for Everyone</a>');
		echo('<button type="button" class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#menu">');
		echo('<span class="navbar-toggler-icon"></span></button>');
		echo('<div class="collapse navbar-collapse" id="menu">');
		echo('<ul class="navbar-nav mr-auto " >');
		echo('<li class="nav-item"><a class="nav-link text-primary active " href="index.php">Home</a></li>');
		echo('<li class="nav-item"><a class="nav-link text-primary" href="about.php">About</a></li>');
		echo('<li class="nav-item"><a class="nav-link text-primary" href="log_in.php">Log In</a></li>');
		echo('<li class="nav-item"><a class="nav-link text-primary" href="sign_up.php">Sign Up</a></li>');
		echo('</ul></div></nav></header>');
	}
	else{
		echo('<header class="text-primary">');
		echo('<nav class="navbar navbar-expand-md navbar-light background text-center mb-3 ">');
		echo('<a href="index.php" class="navbar-brand brand">English Language for Everyone</a>');
		echo('<button type="button" class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#menu">');
		echo('<span class="navbar-toggler-icon"></span></button>');
		echo('<div class="collapse navbar-collapse" id="menu">');
		echo('<ul class="navbar-nav mr-auto " >');
		echo('<li class="nav-item"><a class="nav-link text-primary active " href="index.php">Home</a></li>');
		echo('<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle text-primary" href="courses.php" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Courses</a>
		<div class="dropdown-menu">
			<a href="courses.php" class="dropdown-item text-primary">Levles</a>
			<a href="basic-grammar.php" class="dropdown-item text-primary">Basic Grammar</a>
			<a href="#" class="dropdown-item text-primary">Advance Grammar</a></div></li>');
		echo('<li class="nav-item"><a class="nav-link text-primary" href="about.php">About</a></li>');
		echo('<li class="nav-item"><a class="nav-link text-primary" href="Log_out.php">Logout</a></li>');
		echo('</ul>');
	    echo('<div class="profile mt-1">');
		

		
		echo('<div class="dropdown drpdwn">
			<button class="btn text-center dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			
			<img class="profile_Pic" src="images/default_Image.png" alt="Profile Pic">	
			Hello! '.$_SESSION['user_name'].'
			</button>
			<div class="dropdown-menu drpdwn_list" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item " href="profile.php">My Profile</a>
				<a class="dropdown-item" href="courses.php">My Courses</a>
				<a class="dropdown-item" href="log_out.php">Log Out</a>
			</div>');

		echo('</ul></div></nav></header>');
	}

	?>

	<main>
        <div class="below">
            <div class="jumbotron jum_profile" >
                <div class="row text-center">
                    <div class="col-sm-12">
                        <figure>
                        <ul class="edit-profile">
                            <i class="fas fa-pen fa-2x" title="Edit Profile"></i>
                            </ul>
                            <img  src="images/default_Image.png" alt="Profile Pic"  style="width: 120px; border-radius: 50%;">	
                            <figcaption class="mt-3" style="font-size:1.5rem;"> <?=$_SESSION['user_name']?> </figcaption>
                            <p style="font-size:1.2rem;">Student</p>
                            <p>Currently studying intercom_book1</p>
                        </figure>
                    </div>
                </div>
                <div class="jumbotron text-center over-layed">
                    <h3 class="mb-3">About Me</h3>
                    <p><strong>Email : </strong><?= $user_email ?></p>
                    <p><strong> DOB : </strong><?= $user_dob ?></p>
                    <p><strong>Gender : </strong><?= $user_gender?></p>
                </div>
            </div>	
        </div>
	</main>

	<footer class="profile_footer" style="">
			<div class="container-fluid jumbotron footer text-center" >
				<div class="row">
					<div class="col-sm-6">
						<!-- Some Links Here -->
						<h5>English Tutorials</h5>
						<a href="about.php">About</a><br>
						<a href="#">Careers</a><br>
						<a href="courses.php">Courses</a><br>
						<a href="#">Certificates</a>
					</div>
					<div class="col-sm-6">
						<!--About community here -->
						<h5>Community</h5>
						<a href="teachers.php">Teachers</a><br>
						<a href="learners.php">Learners</a><br>
						<a href="#">Help</a><br>
						<a href="faq's.php">FAQ's</a><br>
					</div>
					<div class="col-sm-12">
						<!-- Contact here -->
						<h5>Contact</h5>
						<a href="mailto:abbasrahim723@gmail.com">Email Us at : abbasrahim723@gmail.com</a><br>
						<a href="https://www.facebook.com/abbasrahim723"><i class="fab fa-facebook fa-2x social" title="Follow US on Facebook"></i></a>
						<a href="https://twitter.com/AbbasRahim9"><i class="fab fa-twitter fa-2x social" title="Follow US on Twitter"></i></a>
						<a href="https://www.linkedin.com/in/abbas-rahim-a23a371b3/"><i class="fab fa-linkedin fa-2x social" title="Follow US on Linkedin"></i></a>
						<a href="https://www.instagram.com/abbasrahim723/"><i class="fab fa-instagram fa-2x social" title="Follow US on Instagram"></i></a>
					</div>
					<div class="col-sm-12">
						<div class="container newsletter">
							<div class="container">
								<h5>Subscribe to our Newsletter</h5>
									<p class="news_notes">
										When you subscribe to our Newsletter, you get emails whenever we have something new on 
										our website i.e. when new lecture is uploaded, notes are uploaded, or even you get 
										updates on when we change our <a href="#"> Privacy Policy.</a> Don't worry You can unsubscribe any time you want.
									</p>
							</div>
							<form action="subscribe.php" method="post" id="form">
								<input type="text" name="news_name" id="news_name" placeholder=" Name" size="40" required/><br>
								<input type="email" name="news_email" id="news_email" placeholder=" Email Address" size="40" required/><br> 
								<input type="submit" name="subscribe" id="subscribe" class="btn btn-success" value="Subscribe"/>
							</form>
						</div>
					</div>
				</div>
			</div>
	</footer>



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>