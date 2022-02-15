<?php

//starting session
    session_start(); 

//getting user entered email
    $user_email = $_POST['news_email'];

//making connection to the mail API
    require_once 'emailController.php'; 

//Making connection to the database
    require_once "pdo.php";

// Now first checking if name and email fields are filled
if(isset($_POST['news_name']) && isset($_POST['news_email'])){
    // now if fields are filled assigning them to the variables
    $name = $_POST['news_name'];
    $email = $_POST['news_email'];
    // making a query in order to check if that email already exists
    $count = $pdo->query("SELECT * FROM news_letter where news_email='$email'")->fetchColumn();
    // checking to see if the entered email already exists
   if(! $count == 0){
       $_SESSION['exist'] = "You have already Subscribed to our news letter";
       header('location:index.php#footer');
       return;
   }
//    if it doesn't exist, then making a query and saving that email in database
    $sql = "INSERT INTO news_letter(news_name,news_email) values (:name,:email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['news_name'],
        ':email' => $_POST['news_email']
    ));
    // now sending the user a confirmation email using Email API
    sendSubscribtionEmail($user_email);
    // And heading back to welcome page
    header('location: welcome.php');
    return;
}
?>