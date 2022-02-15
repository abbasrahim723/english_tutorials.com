<?php

require_once 'vendor/autoload.php';
require_once 'config/constants.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);



    function sendVerificationEmail($user_email,$vkey)
    {

        global $mailer;
        $body = '   <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Verify Email</title>
        </head>
        <body>
            <div class="wrapper">

                <h3>English Language for Everyone</h3>
                <p>Hi! thank you for signing up. Please click on the link below to complete the sign up process.</p>
                <a href="http://localhost/old/capstone/App/index.php?vkey='. $vkey .'">
                    Verify Email Address
                </a>
                 <h5>Contact</h5>
                <a href="mailto:abbasrahim723@gmail.com">Email Us at : abbasrahim723@gmail.com</a><br>
                <a href="https://www.facebook.com/abbasrahim723"><i class="fab fa-facebook fa-2x social" title="Follow US on Facebook"></i></a>
                <a href="https://twitter.com/AbbasRahim9"><i class="fab fa-twitter fa-2x social" title="Follow US on Twitter"></i></a>
                <a href="https://www.linkedin.com/in/abbas-rahim-a23a371b3/"><i class="fab fa-linkedin fa-2x social" title="Follow US on Linkedin"></i></a>
                <a href="https://www.instagram.com/abbasrahim723/"><i class="fab fa-instagram fa-2x social" title="Follow US on Instagram"></i></a>
            </div>
            </div>
        </body>
        </html>';
        // Create a message
        $message = (new Swift_Message('Verify Email Address'))
        ->setFrom(EMAIL)
        ->setTo($user_email)
        ->setBody($body, 'text/html')
        ;

        // Send the message
        $result = $mailer->send($message);
    }

    //sending subscribtion mail
    function sendSubscribtionEmail($user_email){

        global $mailer;
        $body = '  
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            <title>Verify Email</title>
        </head>
        <body>
            <div class="wrapper">

                <h3>English Language for Everyone</h3>
                <p>Hi! thank you for subscribing our chanel. Now you will recieve our weekly news letter. Don\'t worry you can unsubscibe any time.</p>
                <a href="#" class="btn btn-primary">
                    Unsubscribe
                </a>
            </div>
        </body>
        </html>';
        // Create a message
        $message = (new Swift_Message('Thaks for Subscribing'))
        ->setFrom(EMAIL)
        ->setTo($user_email)
        ->setBody($body, 'text/html')
        ;

        // Send the message
        $result = $mailer->send($message);
    }

    //function for reseting password
    function sendPasswordResetLink($user_email,$token)
    {
        global $mailer;
        $body = '  
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            <title>Verify Email</title>
        </head>
        <body>
            <div class="wrapper">

                <h3>English Language for Everyone</h3>
                <p>Hi! Please click on the link below to reset your password.</p>
                <a href="http://localhost/old/capstone/App/index.php?password_token='.$token.'" class="btn btn-primary">
                    Reset your password
                </a>
            </div>
        </body>
        </html>';
        // Create a message
        $message = (new Swift_Message('Reseting your password'))
        ->setFrom(EMAIL)
        ->setTo($user_email)
        ->setBody($body, 'text/html')
        ;

        // Send the message
        $result = $mailer->send($message);
    }
?>