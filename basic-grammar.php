<?php
include_once('pdo.php');
include_once ('util.php');
// include_once('log_in.php');
 session_start();
//check whether the user is logged in or not
if(! isset($_SESSION['user_id'])){
    die("Access Denied! Please Log in first!");
    return;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- For internet explorer -->
    <meta http-equiv="X-UA Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Using Font Awesome -->
    <script src="https://kit.fontawesome.com/3d9f0ba563.js" crossorigin="anonymous"></script>
    <!-- Title Icon -->
    <link rel="icon" type="image/png" href="images/logo.png">
    <!-- custom Stylesheet -->
    <link rel="stylesheet" href="styles/style.css">
    	<!-- Syling notification -->
	<link rel="stylesheet" href="styles/notification.css">
    <title>Basic Grammar</title>
</head>
<body>
    <header>
         <?php
         //loading header file from util.php
             top_header();
        ?>
    </header>
   
    <main>
        <div class="container-fluid">
            <nav class="bdcrumb pt-3 mt-5">
                <ol class="list-unstyled">
                    <li class=""><a href="index.php">Home </a>>></li>
                    <li class=""><a href="courses.php">Courses </a>>></li>
                    <li class="">Basic-grammar</li>
                </ol>
            </nav>
       <!--  -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 mt-5">
                    <!-- <h3 class="mt-5">Basic English Grammar Topics</h3> -->
                    <button class="btn btn-primary d-md-none" type="button" data-toggle="collapse" data-target="#topics" aria-expanded="false" aria-controls="collapseExample">
                        Grammar Topics
                      </button>
                    <div class="card d-md-block" id="topics" style="width: 100%;">
                        <div class="card-body">
                            <div class="card-header">Topics</div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="#noun"><h5>Noun</h5></a></li>
                                <li class="list-group-item"><a href="#pronoun"><h5>Pronoun</h5></a></li>
                                <li class="list-group-item"><a href="#adjective"><h5>Adjective</h5></a></li>
                                <li class="list-group-item"><a href="#verb"><h5>Verb</h5></a></li>
                                <li class="list-group-item"><a href="#adverb"><h5>Adverb</h5></a></li>
                                <li class="list-group-item"><a href="#conjunction"><h5>Conjunction</h5></a></li>
                                <li class="list-group-item"><a href="#interjuction"><h5>Interjuction</h5></a></li>
                                <li class="list-group-item"><a href="#preposition"><h5>Prepostion</h5></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 mt-5 ">
                    <h4>Using "For" in Sentences</h4>
                    <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/OfS1jFck8YQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    </div>
                   <h3 id="noun">What is a Noun?</h3> 
                   <p>
                    noun (noun): a word (except a pronoun) that identifies a person, place or thing, or names one of them (proper noun)
                    The simple definition is: a person, place or thing. Here are some examples:
                    
                    person: man, woman, teacher, John, Mary
                    place: home, office, town, countryside, America
                    thing: table, car, banana, money, music, love, dog, monkey
                    Note that any of the above can also be referred to by a pronoun. And note that names like John or America are called "proper nouns".
                    The problem with the simple definition above is that it does not explain why "love" is a noun but can also be a verb.
                    
                    Another (more complicated) way of recognizing a noun is by its:
                    
                    ending
                    position
                    function
                    1. Noun ending
                    There are certain word endings that show that a word is a noun, for example:
                    
                    -ity → nationality
                    -ment → appointment
                    -ness → happiness
                    -ation → relation
                    -hood → childhood
                    But this is not true for the word endings of all nouns. For example, the noun "spoonful" ends in -ful, but the adjective "careful" also ends in -ful.
                   </p>

                </div>
            </div>

        </div>
           
    </main>
    <footer>
    <?php
       //loading footer from util.php
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