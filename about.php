<?php
session_start();
include_once('pdo.php');
include_once('util.php');

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
    <link rel="stylesheet" href="styles/about.css">
    	<!-- Syling notification -->
	<link rel="stylesheet" href="styles/notification.css">
    <title>About</title>
</head>
<body>
    <header>
         <?php
         //loading header file from util.php
             top_header();
        ?>
    </header>
    <main>
        <div class="container-fluid ">
            <nav class="bdcrumb pt-3">
                <ol class="list-unstyled">
                    <li class=""><a href="index.php">Home </a>>></li>
                    <li class=""><a href="about.php">About </a></li>
                    
                </ol>
            </nav>
        <div class="container-fluid">
            <h3 class="text-primary font-italic">We envision a world where anyone,
                anywhere can transform their life by 
                accessing the world’s best learning 
                experience.</h3>
            <div class="row">
                <div class=" col-md-6">
                        <h2>Courses</h2>
                        <p>Learn something new <br>
                            Every course on Coursera is taught by 
                            top instructors from world-class universities 
                            and companies, so you can learn something new
                             anytime, anywhere. Hundreds of free courses 
                             give you access to on-demand video lectures,
                              homework exercises, and community discussion
                               forums. Paid courses provide additional
                                quizzes and projects as well as a shareable
                                ourse Certificate upon completion.</p>
                                <ul>
                                   <li>100% online</li> 
                                   <li>Learn something new in 4-6 weeks</li>
                                   <li>Priced starting at $39 (USD)</li>
                                   <li>Earn a Course Certificate</li>
                                </ul>
                               <a href="courses.php"><button class="btn btn-primary">Find a Course</button></a> 
                        
                    </div>
                    <div class="col-md-6">
                        <img src="images/Phone.png" class="img-fluid" alt="phone">
                    </div>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="images/Guided-Projects.jpg" class=" img-fluid" alt="Guided-Projects" >
                </div>
                <div class="col-md-6">
                    <h2>Guided Projects</h2>
                    <p>Gain a job-relevant skill in under 2 hours
                        Enroll in Guided Projects to learn job-relevant
                         skills and industry tools in under 2 hours. 
                         Guided Projects are self-paced, require a smaller
                          time commitment, and provide practice using tools 
                          in real-world scenarios, so you can build the job
                           skills you need, right when you need them.</p>
                           <ul>
                               <li>100% online with no setup required
                            </li>
                            <li>Interactive learning experience with step-by-step,
                                 visual instruction from subject-matter experts</li>
                                 <li>Priced starting at $9.99 (USD)</li>
                                 <li>Earn a Guided Project certificate</li>
                           </ul>
                           <button class="btn btn-primary">Find a Project</button>
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