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
	<header class="text-primary">
        <nav class="navbar navbar-expand-md navbar-light background text-center fixed-top">
            <a href="index.php" class="navbar-brand text-danger" title="Home Page">English Tutorials</a>
          <button type="button" class="navbar-toggler " data-toggle="collapse" data-target="#menu">
              <span class="navbar-toggler-icon"></span>
          </button>
         
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ml-auto " >
			
                <li class="nav-item">
                    <a class="nav-link text-primary active " href="index.php">Home</a>
                </li>
                <!-- dropdown starts here -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-primary" href="courses.php" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Courses</a>
                    <div class="dropdown-menu">
                        <a href="courses.php" class="dropdown-item text-primary">Levles</a>
                        <a href="basic-grammar.php" class="dropdown-item text-primary">Basic Grammar</a>
                        <a href="#" class="dropdown-item text-primary">Advance Grammar</a>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link text-primary" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="log_in.php">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="sign_up.php">Sign Up</a>
                </li>
			</ul>
			
          </div>
        </nav>
	</header>

	<main>

    </main>
          

	<footer class="">
			<div class="container-fluid jumbotron footer text-center">
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
						<a href="https://www.linkedin.com/in/abbasrahim723/"><i class="fab fa-linkedin fa-2x social" title="Follow US on Linkedin"></i></a>
						<a href="https://www.instagram.com/abbasrahim723/"><i class="fab fa-instagram fa-2x social" title="Follow US on Instagram"></i></a>
					</div>
					<div class="col-sm-12">
						<div class="container newsletter">
							<div class="container">
								<h5>Subscribe to our Newsletter</h5>
									<p class="news_notes">
										When you subscribe to our Newsletter, you get emails whenever we have something new on 
										our website i.e. when new lecture is uploaded, notes are uploaded, or even you get 
										updates on when we change our <a href="privacy_policy.php" class="text-primary">  Privacy Policy.</a> Don't worry You can unsubscribe any time you want.
									</p>
							</div>
							<?php
                            if(isset($_SESSION['user_id'])){
                               echo '<form action="subscribe.php" method="post" id="form">
                               <input type="text" name="news_name" id="news_name" value="'.$_SESSION['user_name'].'" size="40" required/><br>
                               <input type="email" name="news_email" id="news_email" value="'.$_SESSION['user_email'].'" size="40" required/><br> 
                               <input type="submit" name="subscribe" id="subscribe" class="btn btn-success" value="Subscribe"/>
                           </form>'; 
                            }else{
                                echo '<form action="subscribe.php" method="post" id="form">
								<input type="text" name="news_name" id="news_name" placeholder=" Name" size="40" required/><br>
								<input type="email" name="news_email" id="news_email" placeholder=" Email Address" size="40" required/><br> 
								<input type="submit" name="subscribe" id="subscribe" class="btn btn-success" value="Subscribe"/>
							</form>';
                            }
                            ?>
						</div>
				    </div>
				</div>
				</div>
			</div>
	</footer>

    <script src="script.js"></script>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>