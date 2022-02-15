<?php
require_once "pdo.php"; //making database connection
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
    	<!-- Syling notification -->
	<link rel="stylesheet" href="styles/notification.css">
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
	<header>
         <?php
         //loading header file from util.php
             top_header();
         ?>
    </header>
	<main>
        <div class="below">
            <div class="jumbotron jum_profile" >
                <div class="row text-center">
                    <div class="col-sm-12">
                        <figure>
                        <ul class="edit-profile">
                            <a href="edit_profile.php" style="color:white;"> <i class="fas fa-pen fa-2x" title="Edit Profile"></i></a>
                            </ul>
                            <img  src="<?=$_SESSION['user_image']?>" alt="Profile Pic"  style="width: 120px; border-radius: 50%;">	
                            <figcaption class="mt-3" style="font-size:1.5rem;"> <?=$_SESSION['user_name']?> </figcaption>
                            <p style="font-size:1.2rem;">Student</p>
                            <p>Currently studying intercom_book1</p>
                        </figure>
                    </div>
                </div>
                <div class="jumbotron text-center profie-card">
                    <h3 class="mb-3">Student Info</h3>
                    <p><strong>Email : </strong><?= $user_email ?></p>
                    <p><strong> DOB : </strong><?= $user_dob ?></p>
                    <p><strong>Gender : </strong><?= $user_gender?></p>
                </div>
            </div>	
        </div>
	</main>

	<footer class="profile_footer" style="">
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