<?php
// session_start();
require_once "pdo.php";
require_once "util.php";
//  $token = 'aa20a2b24491c35b7b6beddab42cdf7077349945d473a2864812da4195f3c699a29fa1dcfa9dd1135dbb82551091dd6d94b1';
 
//  //checking if token parameter is present or not
//  if(isset($_GET['vkey']))
//  {
// $token = $_GET['vkey'];
// }

// 	function verifyUserToken($token)
//     {
//         // global $pdo;
// 		$count = $pdo->query("SELECT * from user_table where vkey ='$token' limit 1");
//         $user = $count->fetch(PDO::FETCH_ASSOC);

//         if( isset($user)){
//             echo $user;
//         }else{
//             echo"empty";
//         }
        
// 		if($count > 0 ){
// 			$update_user = "UPDATE user_table set verfied=1 where vkey='$token'";
//             $_SESSION['verification'] ="Your Email has been verified, Now Log in to continue";
// 			$_SESSION['user_id'] = htmlentities($user['user_id']);
// 			$_SESSION['user_name'] = htmlentities($user['user_name']);
// 			$_SESSION['user_email'] = htmlentities($user['user_email']);
// 			$_SESSION['user_dob'] = htmlentities($user['user_dob']);
// 			$_SESSION['user_gender'] = htmlentities($user['user_gender']);
// 			$_SESSION['user_password'] = htmlentities($user['user_password']);
// 			$_SESSION['user_image'] = htmlentities($user['user_image']);
// 			$_SESSION['user_verification'] = htmlentities($user['verfied']);

// 			header('location:index.php');
// 			return;
// 		  }else{
//               header('location:thank_you.php');
//               return;

//           }
		  
         
// 	}
//     verifyUserToken($token);

function verify_password_link($password_token){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM user_table where vkey = :vkey');
    $stmt->execute(array(':vkey' => $password_token));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user_email'] = htmlentities($row['user_email']);
    $_SESSION['user_id'] = htmlentities($row['user_id']);
    header('location:reset_password.php');
    return;

}
