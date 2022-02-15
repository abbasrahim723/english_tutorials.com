<?php
session_start();
require_once "pdo.php";
require_once "util.php";
//first check to see if fields are filled in in order to post a question
if(isset($_POST['name-question']) && isset($_POST['email-question']) && isset($_POST['question']))
{
  if(strlen($_POST['question']) > 3){
    $sql = "INSERT INTO questions(user_id,question) values (:user_id,:question)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':question' => $_POST['question'],
        ':user_id' => $_SESSION['user_id']
    ));
    $_SESSION['question-posted'] = "Your question has been posted";
    header('location: faq\'s.php');
    return;
  }else
  $_SESSION['not-valid-question'] = "Your question must be atleast 15 char long..";
}
//first check to see if answer box has been filled
if(isset($_POST['answer']))
{
  if(strlen($_POST['answer']) > 3){
    $sql = "UPDATE questions set answer = :answer, answer_replied_user_id = :u_id where question_id = :q_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':answer' => $_POST['answer'],
        ':q_id' => $_SESSION['ans_to_ques'],
        ':u_id' => $_SESSION['replied_user_id']
    ));
    $_SESSION['answer-posted'] = "Your answer has been posted";
    header('location: faq\'s.php');
    return;
  }else
  $_SESSION['not-valid-answer'] = "Your answer must be atleast 3 char long..";
}



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
         //loading header file from util.php
             top_header();
        ?>
    </header>
  	<main>
    
      <div class="container my-3 my-sm-5 ">
       <h1 class="text-center mb-3 mb-sm-5" style="margin-top:10%;">Frequently Asked Questions</h1>
      <div id="accordion" role="tablist" aria-multiselectable="true">
        <?php
        if(isset($_SESSION['question-posted'])){
          echo ('<p stye="color: green;">');
          echo ($_SESSION['question-posted']);
          echo ('</p>');
          unset($_SESSION['question-posted']);
        }
        if(isset($_SESSION['not-valid-question'])){
          echo ('<p stye="color: red;">');
          echo ($_SESSION['not-valid-question']);
          echo ('</p>');
          unset($_SESSION['not-valid-question']);
        }
        //retrieving data from table
          $stmt = $pdo->prepare('SELECT * FROM questions join user_table ON user_table.user_id = questions.answer_replied_user_id order by question_id');
          $stmt->execute(array());
          // $question = $stmt->fetch(PDO::FETCH_ASSOC);
          while ( $question = $stmt->fetch(PDO::FETCH_ASSOC) ) 
          { 
              $_SESSION['replied_user_id'] = htmlentities($question['user_id']);
              $_SESSION['replied_user_name'] = htmlentities($question['user_name']);
              $_SESSION['replied_user_image'] = htmlentities($question['user_image']);
              $_SESSION['question'] =  (htmlentities($question['question']));
              $_SESSION['answer'] =  (htmlentities($question['answer']));
              $_SESSION['question_id'] =  (htmlentities($question['question_id']));
              //checking to see if user is logged in      
               if( isset($_SESSION['user_id']))
              {
               echo '<div class="card my-1">
                          <div class="card-header" role="tab" id="question'.$_SESSION['question_id'].'">
                             <h5 class="mb-0" title="This question was asked by '.$question['user_name'].'"><a href="#collapse'.$_SESSION['question_id'].'" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapse'.$_SESSION['question_id'].'">'.$_SESSION['question'].'</a></h5>
                          </div>
                          <div id="collapse'.$_SESSION['question_id'].'" class="collapse" role="tabpanel" aria-labelledby="question'.$_SESSION['question_id'].'">';
                               
                                      if(strlen($_SESSION['answer']) > 1)
                                          {
                                            echo '<img class="profile_Pic" src="'.$_SESSION['replied_user_image'].'" alt="Profile Pic" title="'.$_SESSION['replied_user_name'].' is a top class instructor"/>
                                              <div class="profile card-block replied-container" ><a href="#" title="'.$_SESSION['replied_user_name'].' is a top class instructor">'.$_SESSION['replied_user_name'].'</a>';
                                            echo'<small> replied </small> <p class="">'.$_SESSION['answer'].'</p>';
                                          }else{
                                          echo '<img class="profile_Pic" src="'.$_SESSION['user_image'].'" alt="Profile Pic" title="'.$_SESSION['user_name'].' is a top class instructor"/>
                                              <div class="profile card-block replied-container" ><a href="#" title="'.$_SESSION['user_name'].' is a top class instructor">'.$_SESSION['user_name'].'</a>';
                                          }
                                           echo  '</div>';
                                        if(strlen($_SESSION['answer']) < 1)
                                        {
                                          $_SESSION['ans_to_ques'] = $_SESSION['question_id'];
                                          $_SESSION['replied_user_id'] = $_SESSION['user_id']; 
                                          echo '<form  action="faq\'s.php" method="post">
                                          <div class="row">
                                              <div class="col-md-9">
                                                  <textarea style="background: #ebe9e6; dispay:inline;"name="answer" id="answer" placeholder="This question hasn\'t been answerd yet, Wanna answer this question? Type here...." cols="40" rows="2" class="form-control question-container"></textarea>
                                              </div>
                                              <div class="col-md-3">
                                                   <button type="submit" name="replied" class="btn btn-primary">Post</button>
                                              </div>
                                          </div>
                                          </form>';
                                        }
                  echo'</div></div>';
                }
               //if user is logged in or not show all the questions with answers if available
              else
              {
               echo '<div class="card my-1">
                        <div class="card-header" role="tab" id="question'.$_SESSION['question_id'].'">
                          <h5 class="mb-0"><a href="#collapse'.$_SESSION['question_id'].'" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" 
                            aria-controls="collapse'.$_SESSION['question_id'].'">'.$_SESSION['question'].'</a></h5>
                        </div>';
                      echo '<div id="collapse'.$_SESSION['question_id'].'" class="collapse" role="tabpanel" aria-labelledby="question'.$_SESSION['question_id'].'">';
                      if(strlen($_SESSION['answer']) > 1)
                      {
                        echo' <img class="profile_Pic" src="'.$_SESSION['replied_user_image'].'" alt="Profile Pic" title="'.$_SESSION['replied_user_name'].' is a top class instructor">';
                        echo '<div class="profile card-block replied-container" ><a href="#" title="'.$_SESSION['replied_user_name'].' is a top class instructor">'.$_SESSION['replied_user_name'].'</a>';
                        echo'<small> replied </small> <p class="">'.$_SESSION['answer'].'</p></div>';    
                     }else{
                       echo'<small> This question hasn\'t been answered yet. If you want to answer, then  <a href="log_in.php">log in </a>first</small>';
                     }
                     echo' </div></div>';
                    }
                  }
        ?>
        </div>
      
    
<?php
  if(isset($_SESSION['user_id']))
  {
      echo '<div class="container text-center"  style="width: 80%;">
      <form action="faq\'s.php" method="post">
        <h2 class="text-center">Ask a question</h2>
        <div class="form-group row">
          <!-- <label for="name" class="col-sm-12 col-md-2">Full Name</label> -->
          <input type="text" name="name-question" id="name" class="form-control question-container" placeholder="Full Name" value="'.$_SESSION['user_name'].'">
        </div>
        <div class="form-group row">
          <!-- <label for="email" class="col-sm-12 col-md-2">Email</label> -->
          <input type="email" name="email-question" id="email" class="form-control question-container" placeholder="Email address here..." value="'.$_SESSION['user_email'].'">
        </div>
        <div class="form-group row">
          <!-- <label for="question" class="col-sm-12 col-md-2">Your Question</label> -->
          <!-- <input type="textarea" name="question" id="question" class="form-control col-sm-12 col-md-8" placeholder="Type your question here..."> -->
          <textarea name="question" id="question" placeholder="Type your question here...." cols="30" rows="10" class="form-control question-container"></textarea>
        </div>
        <button type="submit" name="ask-question" class="btn btn-primary question-container">Post Question</button>
      </form>
    </div>';
  }
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










