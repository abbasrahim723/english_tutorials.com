<?php
require_once "pdo.php";
require_once "util.php";

session_start();






?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA Compatible" content="ie=edge">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<!-- Using Font Awesome -->
	<script src="https://kit.fontawesome.com/3d9f0ba563.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css"></script>
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/card.css">
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
<header>
         <?php
         //loading header file from util.php
             top_header();
        ?>
    </header>
	<main>
		<?php
			//getting data from database
			// $stmt = $pdo->query("SELECT * FROM instructors");
			// $stmt->execute(array());
			// while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) 
			// {
			// 	$ins_name = htmlentities($row['ins_name']); 
			// 	$ins_profession = htmlentities($row['ins_profession']); 
			// 	$ins_description = htmlentities($row['ins_description']); 
			// 	$ins_email = htmlentities($row['ins_email']);
			// 	 $ins_image = htmlentities($row['ins_image']); 
 
				//now printing data

		// 		echo '	
		// 		<div class="container mt-5">
		// 			<div class="row mt-5">
		// 				<div class="container d-flex justify-content-center mt-5 col-sm-6 col-md-4 col-lg-3 ">
		// 					<div class="card cd1 p-3 py-4">
		// 						<div class="text-center"> <img src="'.$ins_image.'" width="100" class="rounded-circle">
		// 							<h3 class="mt-2">'.$ins_name.' </h3> <span class="mt-1 clearfix"><strong>'.$ins_profession.' </strong></span> 
		// 							<small class="mt-4">'.$ins_description.' </small>
		// 							<div class="social-buttons mt-5"> 
		// 							<button class="neo-button"><a href="https://www.facebook.com/abbasrahim723"><i class="fa fa-facebook fb fa-1x"></a></i> </button>
		// 							<button class="neo-button"><a href="https://www.linkedin.com/in/abbasrahim723/"><i class="fa fa-linkedin ln fa-1x"></a></i></button> 
		// 							<button class="neo-button"><a href="mailto:'.$ins_email.' "><i class="fa fa-google google fa-1x"></a></i> </button> 
		// 							<button class="neo-button"><a href=""><i class="fa fa-youtube fa-1x"></a></i> </button> 
		// 							<button class="neo-button"><a href="https://twitter.com/AbbasRahim9"><i class="fa fa-twitter tw fa-1x"></a></i> </button> 
		// 							</div>
		// 						</div>
		// 					</div>
		// 				</div>
		// 		</div>';
		// 	}
		// ?>
		<div class="container mt-5">
			<div class="row mt-5">
				<div class="container d-flex justify-content-center mt-5 col-sm-6 col-md-4 col-lg-3 ">
					<div class="card cd1 p-3 py-4">
						<div class="text-center"> <img src="images/abbas.jpg" width="100" class="rounded-circle">
							<h3 class="mt-2">Abbas Rahim</h3> <span class="mt-1 clearfix"><strong> Web Developer</strong></span> 
							<small class="mt-4">I am an web developer working at fiver,freelance & UpWork online from Pakistan.</small>
							<div class="social-buttons mt-5"> 
							  <button class="neo-button"><a href="https://www.facebook.com/abbasrahim723"><i class="fa fa-facebook fb fa-1x"></a></i> </button>
						      <button class="neo-button"><a href="https://www.linkedin.com/in/abbasrahim723/"><i class="fa fa-linkedin ln fa-1x"></a></i></button> 
							  <button class="neo-button"><a href="mailto:abbasrahim723@gmail.com"><i class="fa fa-google google fa-1x"></a></i> </button> 
							  <button class="neo-button"><a href=""><i class="fa fa-youtube fa-1x"></a></i> </button> 
							  <button class="neo-button"><a href="https://twitter.com/AbbasRahim9"><i class="fa fa-twitter tw fa-1x"></a></i> </button> 
							</div>
						</div>
					</div>
				</div>

				<div class="container d-flex justify-content-center mt-5 col-sm-6 col-md-4 col-lg-3 ">
					<div class="card cd1 p-3 py-4">
						<div class="text-center"> <img src="images/adil.jpg" width="100" class="rounded-circle">
							<h3 class="mt-2">Muhammad Adil</h3> <span class="mt-1 clearfix"><strong> Game Developer</strong></span> 
							<small class="mt-4">I am a game developer working at fiver,freelance & UpWork online from Pakistan.</small>
							<div class="social-buttons mt-5"> 
							  <button class="neo-button"><a href="https://www.facebook.com/abbasrahim723"><i class="fa fa-facebook fb fa-1x"></a></i> </button>
						      <button class="neo-button"><a href="https://www.linkedin.com/in/abbasrahim723/"><i class="fa fa-linkedin ln fa-1x"></a></i></button> 
							  <button class="neo-button"><a href="mailto:abbasrahim723@gmail.com"><i class="fa fa-google google fa-1x"></a></i> </button> 
							  <button class="neo-button"><a href=""><i class="fa fa-youtube fa-1x"></a></i> </button> 
							  <button class="neo-button"><a href="https://twitter.com/AbbasRahim9"><i class="fa fa-twitter tw fa-1x"></a></i> </button> 
							</div>
						</div>
					</div>
				</div>

				<div class="container d-flex justify-content-center mt-5 col-sm-6 col-md-4 col-lg-3 ">
					<div class="card cd1 p-3 py-4">
						<div class="text-center"> <img src="images/saeed.jpg" width="100" class="rounded-circle">
							<h3 class="mt-2">Saeed Ullah</h3> <span class="mt-1 clearfix"><strong> Web Designer</strong></span> 
							<small class="mt-4">I am a web Designer working at fiver,freelance & UpWork online from Pakistan.</small>
							<div class="social-buttons mt-5"> 
							  <button class="neo-button"><a href="https://www.facebook.com/abbasrahim723"><i class="fa fa-facebook fb fa-1x"></a></i> </button>
						      <button class="neo-button"><a href="https://www.linkedin.com/in/abbasrahim723/"><i class="fa fa-linkedin ln fa-1x"></a></i></button> 
							  <button class="neo-button"><a href="mailto:abbasrahim723@gmail.com"><i class="fa fa-google google fa-1x"></a></i> </button> 
							  <button class="neo-button"><a href=""><i class="fa fa-youtube fa-1x"></a></i> </button> 
							  <button class="neo-button"><a href="https://twitter.com/AbbasRahim9"><i class="fa fa-twitter tw fa-1x"></a></i> </button> 
							</div>
						</div>
					</div>
				</div>

				<div class="container d-flex justify-content-center mt-5 col-sm-6 col-md-4 col-lg-3 ">
					<div class="card cd1 p-3 py-4">
						<div class="text-center"> <img src="images/ihsan.jpg" width="100" class="rounded-circle">
							<h3 class="mt-2">Ihsan Ullah</h3> <span class="mt-1 clearfix"><strong>Graphics Designer</strong></span> 
							<small class="mt-4">I am a Graphic designer working at fiver,freelance & UpWork online from Pakistan.</small>
							<div class="social-buttons mt-5"> 
							  <button class="neo-button"><a href="https://www.facebook.com/abbasrahim723"><i class="fa fa-facebook fb fa-1x"></a></i> </button>
						      <button class="neo-button"><a href="https://www.linkedin.com/in/abbasrahim723/"><i class="fa fa-linkedin ln fa-1x"></a></i></button> 
							  <button class="neo-button"><a href="mailto:abbasrahim723@gmail.com"><i class="fa fa-google google fa-1x"></a></i> </button> 
							  <button class="neo-button"><a href=""><i class="fa fa-youtube fa-1x"></a></i> </button> 
							  <button class="neo-button"><a href="https://twitter.com/AbbasRahim9"><i class="fa fa-twitter tw fa-1x"></a></i> </button> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


    </main>
          

	<footer class="">
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