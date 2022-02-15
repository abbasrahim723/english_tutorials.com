<?php
    require_once "pdo.php";
    require_once "util.php";
    session_start();
    if(! isset($_SESSION['user_id'])){
        die('ACCESS DENIED');
        return;
    }
    
    if(isset($_POST['verify_password']) && isset($_POST['new_email'])){
        //now check if the password matches or not
            if(password_verify($_POST['verify_password'], $_SESSION['user_password'])){
                //now let's change the email
                    $old_email = $_SESSION['user_email'];
                    $new_email = $_POST['new_email'];
                    $user_id = $_SESSION['user_id'];
                //updating  data 
                    $sql = "UPDATE user_table SET user_email = :u_email WHERE user_id=:u_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(
                    ':u_id' => $user_id,
                    ':u_email' => $new_email
                     ));
                     $_SESSION['user_email'] = $new_email;

                     $_SESSION['email_changed'] = "Email changed ";
                     echo('<script>alert("Emailed changed succesfully!");</script>');
                     header('location: profile.php');
                     return;

            }else{
                    $_SESSION['error_pass'] = "Password didn't match";
                    echo('<script>alert("Incorrect Password!");</script>');
                    header('location: change_email.php');

            }
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
		top_header();
		?>
	</header>

	<main>
        <div class="container change_password border border-primary rounded text-center" style="margin-top: 12%;margin-bottom: 5%;">
            <h3>Changing Email for <small><?= $_SESSION['user_email']?></small></h3>
            <hr>
            <form action="change_email.php" method="post" name="form1">
                <div class="form-group row">
                <label for="verify" class="col-md-2  col-sm-12 d-none d-md-block">First Verify It's You</label>
                <input type="password" class="form-control col-sm-9" name="verify_password" id="verify" placeholder="Enter Your Current Password" required>
                <?php 
                    if(isset($_SESSION['error_pass'])){
                        echo('<div style="color:red; text-align:center;">'.$_SESSION['error_pass'].'</div>');
                        unset($_SESSION['error_pass']);
                        
                    }
                ?>
                </div>
                <div class="form-group row">
                <label for="new_email" class="col-md-2 col-sm-12 d-none d-md-block">Enter New Email</label>
                <input type="email" class="form-control col-sm-9" name="new_email" id="new_email" placeholder="Enter New Email"  required> 
                </div>
                <button type="submit" class="btn btn-danger mb-3" >Update Email</button>
				<small style="display:block;" class="mb-3">...or...</small>
				<div><a href="change_password.php" >Change Password?</a></div>
				
            
            </form>
        </div>
        <?php
        // var_dump($_SESSION);
        ?>
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