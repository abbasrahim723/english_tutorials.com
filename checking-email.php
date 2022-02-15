<?php
session_start();
include_once "pdo.php";
if(isset($_POST['email'])){
    $user_email = $_POST['email'];
    $count = $pdo->query("SELECT* FROM user_table where user_email='$user_email'")->fetchColumn();
    if($count < 0 ){
      $_SESSION['email_exist'] = "Emial already taken";
      header('location:cheking-email.php');
      return;
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_SESSION['email_exist'])){
        echo $_SESSION['email_exist'];
    }
    var_dump($_SESSION);
    
    ?>
    <form action="checking-email.php" method="post">

    <label for="search">email</label>
    <input type="email" name="email" id="email">
    <!-- <input type="submit" name="" id="submit"> -->
    <button type="submit">Submit</button>
    </form>
    
</body>
</html>