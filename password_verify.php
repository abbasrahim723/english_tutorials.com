<?php
require_once "pdo.php";
// if(isset($_POST['pass']))
// {
//     $password = $_POST['pass'];
//     $options = [
//         'cost' => 11  
//     ];
    
//     $hashed_password=password_hash($password, PASSWORD_BCRYPT, $options);
    
//     echo $hashed_password;

//     $sql= "INSERT into password1 (pass) values (:pass)";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute(array(
//         ':pass' => $hashed_password
//     ));
// }

if(isset($_POST['check'])){
    $enterd = $_POST['check'];
    $stmt = $pdo->prepare("SELECT * from password1 where pass=':pass'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $hashed_password = htmlentities($row['pass']);
    echo "Password is: ";
    echo "$hashed_password";
    if(password_verify($enterd,$hashed_password))
{
  
  echo "Good";
  
}else{
  
  echo "Bad";
}
}
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passward Verify</title>
</head>
<body>
    <h1>Password Verification</h1>
    <form action="password_verify.php" method="post">
    <!-- <label for="pass">Password:</label>
    <input type="password" name="pass" id="pass"> -->
    <label for="check">Check</label>
    <input type="password" name="check" id="check">
    <input type="submit"  id="submit" value="Insert">
</form>
    
</body>
</html>