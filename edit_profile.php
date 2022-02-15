<?php
require_once "pdo.php";
require_once "util.php";
session_start();
if(! isset($_SESSION['user_id'])){
    echo("ACCESS DENIED");
    return;
}
else{
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    $user_email = $_SESSION['user_email'];
    $user_dob = $_SESSION['user_dob'];
    $user_gender = $_SESSION['user_gender'];
	$user_image = $_SESSION['user_image'];
}


if(isset($_FILES['image'])){
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
	echo "File is an image - " . $check["mime"] . ".";
	$uploadOk = 1;
  } else {
	echo "File is not an image.";
	$uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not updated.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
	echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been updated.";
	$_SESSION['updated_image'] =  htmlspecialchars( basename( $_FILES["image"]["name"]));
	// Insert image file name into database
	// $stmt = $pdo->prepare("INSERT into u (file_name, uploaded_on) VALUES ('".$target_file."', NOW())");
	// $stmt->execute(array());
  } else {
	echo "Sorry, there was an error uploading your file.";
  }
}
}


if(isset($_POST['user_name']) && isset($_POST['user_email']) &&  
isset($_POST['user_gender']) && isset($_POST['user_dob']))
{
		$up_user_name = $_POST['user_name'];
		$up_user_email = $_POST['user_email'];
		$up_user_dob = $_POST['user_dob'];
		$up_user_gender = $_POST['user_gender'];
		//$up_user_image = $_SESSION['user_image'];

    $sql = "UPDATE user_table SET user_name = :u_name, user_email = :u_email, user_dob = :u_dob, 
    user_gender = :u_gender, user_image = :u_image WHERE user_id=:u_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
  ':u_id' => $_SESSION['user_id'],
  ':u_name' => $up_user_name,
  ':u_email' => $up_user_email,
  ':u_dob' => $up_user_dob,
  ':u_gender' => $up_user_gender,
  ':user_image' =>$_SESSION['updated_image']
  ));
  $_SESSION['user_name'] = $up_user_name;
  $_SESSION['user_email'] = $up_user_email;
  $_SESSION['user_dob'] = $up_user_dob;
  $_SESSION['user_gender'] = $up_user_gender;
  $_SESSION['user_image'] = $_SESSION['updated_image'];

  $_SESSION['profile'] = "Profile Updated";
  header('location: profile.php');
  return;
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
    main{
      margin-top: 10%;
    }
	</style>
</head>

<body style="background:lightgray;">
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
                      <form action="edit_profile.php" method="post">
                        <!-- User image  -->
                      <div class="form-group text-center col-sm-12">
                                <input type="file" name="image" accept="image/*" style="display: none;" id="image" onchange="loadFile(event)">
                                <img id="output_Image" width="200" src="<?= $_SESSION['user_image']?>" title="Change Image" />
                                <label for="image" style="cursor: pointer; display:block;">Change Image</label>
                            </div>
                        <!-- User Bio data -->
                        <div class="form-group">
                        <label for="user_name" class="">Full Name</label>
                          <input type="text" name="user_name" id="user_name" class="form-control form-control-md" width="10%" value="<?=$user_name?>">
                        </div>

                      </form>
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
	<main >
       <div class="container border border-dark mt-5 text-center">
               
                   <h2>Edit My Profile</h2>
              
                    <a href="profile.php" class="btn btn-primary" style="margin-left:6rem;">View Profile</a>
               
              <form action="edit_profile.php" method="post"  >
                  <h3>Introduction</h3>
                  <p>Let Our community and other learners and instructors recognize you.</p>
                            <div class="form-group text-center col-sm-12">
                                <input type="file" name="image" accept="image/*" style="display: none;" id="image" onchange="loadFile(event)">
                                <img id="output_Image" width="200" src="<?= $_SESSION['user_image']?>" title="Change Image" />
                                <label for="image" style="cursor: pointer; display:block;">Change Image</label>
                            </div>
                  <div class="form-group">
                  <label for="user_name">Full Name</label>
                    <input type="text" name="user_name" id="user_name"  value="<?=$user_name?>">
                  </div>
                  <div class="form-group ">
                  <label for="user_email" class="" >Email </label>
                    <input type="email" class="" name="user_email" id="user_email" class="form-control" value="<?=$user_email ?>">
                  </div>
                  <div class="form-group">
                  <label for="user_dob" class="">DOB</label>
                    <input type="date" class="" name="user_dob" id="user_dob" class="form-control" value="<?=$user_dob?>">
                  </div>
                  <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="radio" name="user_gender" id="male" class="form-check-input" value="Male" <?php if($user_gender == 'Male'){ echo 'checked';} ?>>
                  Male
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="radio" name="user_gender" id="female" class="form-check-input" value="Female"  <?php if($user_gender == 'Female'){ echo 'checked';} ?>>
                  Female
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="radio" name="user_gender" id="prefer_not_to_say" class="form-check-input" value="Prefer Not to Say"  <?php if($user_gender == 'Prefer Not to Say'){ echo 'checked';} ?>>
                  Prefer Not to Say
                </label>
              </div>
              <input type="submit" class="btn btn-primary btn-block" value="Update profile">

              </form>
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