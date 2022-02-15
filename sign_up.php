<?php
session_start();
//linking to utility code
require_once "util.php";

//Making database connection
require_once "pdo.php";

//Linking mail file
require_once "emailController.php";

//declaring error vairable
$errors = array();

//setting time and date
date_default_timezone_set('Asia/karachi');
$date = date('d-m-y h:i:s');

//see if the user already has an account
if(isset($_POST['registered'])){
    header('location: log_in.php');
    return;
}


//first check to see if email already exist
if(isset($_POST['user_email'])){
  $user_email = $_POST['user_email'];
  // Making a query to see if the entered email alraedy exists in the database
  $count = $pdo->query("SELECT user_email FROM user_table where user_email='$user_email'")->fetchColumn();
  if($count > 0 ){
    $_SESSION['email_exist'] = "Emial already Exists";
    header('location:sign_up.php');
    return;
  }
}


//Now checking if form is filled
if(isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_password']) && 
isset($_POST['user_gender']) && isset($_POST['user_dob']) & isset($_FILES['image']))
{
    $user_email = $_POST['user_email']; 
    $target_dir = "images/"; //place where images are stored
    $target_file = $target_dir . basename($_FILES["image"]["name"]);//gettting the name of the image
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //getting the image type
    
    // Check if image file is a actual image or fake image
    
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        $errors['not_image'] = "File is not an image.";
        $uploadOk = 0;
      }
    
    
    // Check if file already exists
    if (file_exists($target_file)) {
      $errors['image_exists'] = "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["image"]["size"] > 1000000) {
      $errors['image_large']  = "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $errors['not_type']  = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $errors['image_error'] = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $_SESSION['success']  = "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
        // Insert image file name into database
        // $stmt = $pdo->prepare("INSERT into u (file_name, uploaded_on) VALUES ('".$target_file."', NOW())");
        // $stmt->execute(array());
      } else {
        $errors['image_error']  = "Sorry, there was an error uploading your file.";
      }
    }
    // now hashing user entered password
    $options = [
        'cost' => 12,
    ];
    
    $user_hashed_password = password_hash($_POST['user_password'],PASSWORD_BCRYPT, $options);

    //creating a random verification key
    $vkey = bin2hex(random_bytes(50));

    $sql = "INSERT INTO user_table(user_name,user_email,user_password,user_gender,user_dob,user_image,id_created_on,vkey,verfied) 
    VALUES(:user_name,:user_email,:user_password,:user_gender,:user_dob,:user_image,:id_c_on,:vkey,:verified)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':user_name' => $_POST['user_name'],
        ':user_email' => $_POST['user_email'],
        ':user_password' => $user_hashed_password,
        ':user_gender' => $_POST['user_gender'],
        ':user_dob' => $_POST['user_dob'],
        ':user_image'=> $target_file,
        ':id_c_on' => $date,
        ':vkey' => $vkey,
        ':verified' => 0
    ));
    $_SESSION['user_email'] = $_POST['user_email'];
    $user_email = $_POST['user_email'];
    $user_name = $_POST['user_name'];
    $user_dob = $_POST['user_dob'];
    // now sending user the verification email
    sendVerificationEmail($user_email,$vkey);
    
    // if($sql){
    //   $to = $_POST['user_email'];
    //   $subject = "Email Verification";
    //   $message = "<a href = 'http://localhost/old/capstone/verify.php?$vkey'>Verify Account</a>";
    //   $headers = "From:EnglishLanguageforEveryone@123gmail.com \r\n";
    //   $headers .= "MIME-Version: 1.0"."\r\n";
    //   $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
    //   mail($to,$subject,$message,$headers);

    // }else{

    // }
    $_SESSION['success'] = 'You have Successfuly Registered yourself, Now Log In ';
    header('location: thank_you.php');
    
    
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
    <!-- Syling notification -->
	  <link rel="stylesheet" href="styles/notification.css">
    <link rel="stylesheet" href="styles/log_in.css">
    <!-- Custom CSS -->
    <style>
        #back{
            background-color: lightblue;
        }
       .jumbotron{
         /* background:white; */
       }
       form{
         border: black;
       }
    </style>
    <title>Sign Up-EL4E</title>
</head>
<body>
    <header>
    <div class="nav">
		<!-- Nav menu with side menu -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light pmd-navbar pmd-z-depth fixed-top">
		  
		  <button class="navbar-toggler pmd-navbar-toggle" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-target="#navbarSupportedContent">
			  <span class="navbar-toggler-icon"></span>
		  </button>
		  <a class="navbar-brand" href="index.php">English Language for Everyone</a>
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
					  <a class="nav-link text-primary " href="log_in.php">Log In</a>
				  </li>
				  <li class="nav-item">

          <li class="nav-item">
					  <a class="nav-link text-primary active" href="sign_up.php">Sign Up</a>
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
     
        <div class="jumbotron jumbotron-fluid mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 offset-sm-2 offset-md-3 offset-lg-4  border border-dark rounded">
                        <h1 class="mb-3 text-center">Sign Up </h1>
                        <p class="lead text-center">It's free to get Registered!!!</p>
                        <form action="sign_up.php" class="mb-3" method="POST" name="form1" enctype="multipart/form-data">
                           <div class="form-group text-center col-sm-12">
                                <input type="file" name="image" accept="image/*" style="display: none;" id="image" onchange="loadFile(event)" required>
                                <img id="output_Image" width="200" src="images/default_Image.png" title="Upload Image" />
                                <label for="image" style="cursor: pointer; display:block;">Upload Image</label>
                            </div>
                            <?php
                              if(isset($_SESSION['email_exist']))
                              {
                                echo '<div class="alert alert-danger"><li>';
                                echo ($_SESSION['email_exist']);
                                echo'</li></div>';
                                unset($_SESSION['email_exist']);
                              }
                            ?>
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" class="form-control form-control-md" placeholder="Your Name Here" id="name" name="user_name"  required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email"  class="form-control form-control-md" placeholder="example@email.com" id="email" name="user_email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" class="form-control form-control-md" placeholder="Password"  id="password" name="user_password" required>
                                <small style="font-size: 10px">Must contain a Capital, small, numeric & a Special Char(@ # $ %)</small>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password" class="sr-only">Confirm Password</label>
                                <input type="password" class="form-control form-control-md" placeholder="Confrim password"  id="c_password"  onkeyup='check();' required>
                                <span id="message"></span>
                            </div>
                            
              <div class="row no-gutters">
              <div class="form-group col-4">
              <label for="user_dob" class="sr-only">Date of Birth:</label>
                <input type="date" name="user_dob" id="user_dob" class="user_dob form-control-md"  required>
                </div>
              </div> 
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="radio" name="user_gender" id="male" class="form-check-input" value="Male" checked>
                  Male
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="radio" name="user_gender" id="female" class="form-check-input" value="Female">
                  Female
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="radio" name="user_gender" id="prefer_not_to_say" class="form-check-input" value="Prefer Not to Say">
                  Prefer Not to Say
                </label>
              </div>
              <div class="alert alert-info small" role="alert">By clicking Sign Up you agree to our <a href="#" class="alert-link">Terms &amp; Conditions</a> and our <a href="#" class="alert-link">Privacy Policy</a>.</div>
                         <input type="submit" name="submit" class="btn btn-primary btn-block" value="Sign Up" id="submit" onclick=" return CheckPassword(document.form1.user_password)">
                          <!-- <a href="thank_you.php" class="btn btn-primary btn-block">Sign Up</a> -->
                        </form>
                        <div class="text-center">
                            <p>or.....</p>
                            <!-- <input type="submit" value="Already Have an Account" class="btn btn-success mb-3" name="registered"> -->
                            <a href="log_in.php" class="btn btn-success mb-3" name="registered">Already Have an Account</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php
        // getting footer from util page
        footer();
        ?>
    </footer>

    <script src="script.js"></script>
     <!-- Bootstrap JavaScript and Jquery -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>