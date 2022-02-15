<?php
session_start();
include_once "util.php";
include_once "pdo.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
<header>
	<?php
	if(isset($_SESSION['user_id'])){
		echo'
	<div class="nav">
    <!-- Nav menu with side menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light pmd-navbar pmd-z-depth fixed-top">
      
      <button class="navbar-toggler pmd-navbar-toggle" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php">English Language for Everyone</a>
	  <div class="pmd-sidebar-overlay"></div>
      <div class="collapse navbar-collapse pmd-navbar-sidebar bg-light p-2 notify-menu" id="navbarSupportedContent" >
          <ul class="navbar-nav mr-auto items">
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
                  <a class="nav-link text-primary" href="#">About Us</a>
              </li>
              
              <li class="nav-item">
                  <a class="nav-link text-primary " href="#">Log Out</a>
              </li>
			  <li class="nav-item">
			  
			 	 <!-- <div class="pmd-navbar-right-icon ml-auto">
         			 	<a class="btn btn-md text-white pmd-btn-fab pmd-btn-flat pmd-ripple-effect" href="#">Search <i class="fas fa-search"></i></a>
     			 </div> -->
			  </li>
	</ul>
			  <ul class="navbar-nav ml-auto">
				<li class="nav-item d-none d-lg-block ">
					<a class="nav-link icon text-dark" href="#" style="display:inline;font-size:20px"> <i class="fas fa-bell" onclick="toggle_notify()" style="cursor:pointer;" title="Show Notifications"></i><span>new</span></a>
					<!-- <a class="nav-link mr-3 text-white" href="#" style="display:inline;font-size:20px"> <i class="fas fa-comment-dots" onclick="show_notification()" style="cursor:pointer;" title="Show Messages"></i></a> -->
				</li>
				<li class="nav-item d-block d-lg-none">
					<a class="nav-link icon-text text-primary" href="#" onclick="toggle_notify()">Notifications<span>6</span></a>
					<!-- <a class="nav-link  text-primary" href="#">Messages</a> -->
				</li>
				
          
		  <div class="dropdown pmd-dropdown pmd-user-info ">
              <a href="#" class="btn-user dropdown-toggle media align-items-center text-primary"  data-toggle="dropdown" data-sidebar="true" aria-expanded="false">
                  <img class="mr-2 profile_Pic" src="'.$_SESSION['user_image'].'" width="40" height="40" alt="Profile">
                  <div class="media-body">
                      Hello! '.$_SESSION['user_name'].'
                  </div>
                  <i class="material-icons md-light ml-2 pmd-sm"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right" role="menu">
                <a class="dropdown-item" href="dashboard.php"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a><hr>
                <a class="dropdown-item" href="profile.php"><i class="fas fa-user mr-3"></i>My Profile</a>
                <a class="dropdown-item" href="change_password.php" target="_blank"><i class="fas fa-key mr-3"></i>Change Password</a>
                <a class="dropdown-item" href="#" target="_blank"><i class="fas fa-bell mr-3"></i>Notifications</a>
                <a class="dropdown-item" href="#" target="_blank"><i class="fas fa-comment-dots mr-3"></i>Messages</a>
                <a class="dropdown-item" href="courses.php"><i class="fab fa-discourse mr-3"></i>My Courses</a>
                <a class="dropdown-item" href="log_out.php"><i class="fas fa-sign-out-alt mr-3"></i>Log Out</a>
               </ul> 
			   <!-- <form class="navbar-form" role="search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search">
						<span class="input-group-btn">
							<button type="reset" class="btn btn-default">
								<span class="glyphicon glyphicon-remove">
									<span class="sr-only">Close</span>
								</span>
							</button>
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search">
									<span class="sr-only">Search</span>
								</span>
							</button>
						</span>
					</div>
				</form> -->
			   <div class="notification-box" style="" id="notification-box">
					<h4>Notifications <span>17</span></h4>
					<div class="notification-item">
						<img src="images/default_Image.png"  alt="img1">
						<div class="notification">
							<h6>Abbas Rahim</h6>
							<p>Liked your photo</p>
						</div>
					</div>
					<div class="notification-item">
						<img src="images/default_Image.png"  alt="img1">
						<div class="notification">
							<h6>Ihsan Ullah</h6>
							<p>Liked your photo</p>
						</div>
					</div>
					<div class="notification-item">
						<img src="images/default_Image.png"  alt="img1">
						<div class="notification">
							<h6>Saeed Ullah</h6>
							<p>Liked your photo</p>
						</div>
					</div>
					<div class="notification-item">
						<!-- <img src="images/default_Image.png"  alt="img1"> -->
						<div class="notification">
						<a href="#">See All Notifications</a>

							<!-- <h6>M Adil</h6>
							<p>Liked your photo</p> -->
						</div>
					</div>
					
				</div>
				
          </div>
         
          </ul> 
      </div>
     
      <div class="pmd-sidebar-overlay"></div>
  </nav>
  </div>
  				<!-- <div class="search-box">
				   <input type="search" name="search" id="search" placeholder="Search">
				   <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
			  	 </div> -->';
	}else{
		echo('
		<div class="nav">
		<!-- Nav menu with side menu -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light pmd-navbar pmd-z-depth fixed-top">
		  
		  <button class="navbar-toggler pmd-navbar-toggle" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-target="#navbarSupportedContent">
			  <span class="navbar-toggler-icon"></span>
		  </button>
		  <a class="navbar-brand" href="index.php">English Language for Everyone</a>
		  <div class="pmd-sidebar-overlay"></div>
		  <div class="collapse navbar-collapse pmd-navbar-sidebar bg-light p-2 notify-menu" id="navbarSupportedContent" >
			  <ul class="navbar-nav ml-auto items">
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
					  <a class="nav-link text-primary " href="log_in.php">Log In</a>
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
		');
	}
				   ?>
</header>
<main>
				
		<div class="container-fluid">
			<div class="row">
				<div class="jumbotron mt-5 col-sm-12">
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

    <footer>
        <?php
        footer();
        ?>
    </footer>
	<script src="script.js"></script>
<!-- jquery cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>