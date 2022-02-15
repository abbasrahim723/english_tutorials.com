<?php
include_once "util.php";
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
    <title>intercom_book1</title>

	<style>
		.card1{
			margin: 0 auto;
			margin-top: 2%;
		}
	</style>
</head>
<body>
    <header>
    <header>
         <?php
         //loading header file from util.php
             top_header();
        ?>
    </header>
    </header>
    <main>
    <div class="row">
                <div class=" col-sm-6 col-md-4 col-lg-3">					
                        <details open>
                            <img src="images/book1.jpg" alt="intercom_book1">

                            <summary> Level One</summary>
                            <p>
                                <ul>
                                    <li>Contains 18 Units</li>
                                    <li>Quiz after 2 units</li>
                                    <li>Test after 6 units</li>
                                    <li>More than 60 vocabulary words before each Unit</li>
                                </ul>
                            </p>
                        </details>
                </div>
                <div class=" col-sm-6 col-md-4 col-lg-3">
                    <details open>
                        <img src="images/book2.jpg" alt="intercom_book2">
                        <summary>Level Two</summary>
                        <p>
                            <ul>
                                <li>Contains 15 Units</li>
                                <li>Quiz after 2 units</li>
                                <li>Test after 5 units</li>
                                <li>More than 60 vocabulary words before each Unit</li>
                            </ul>
                        </p>
                    </details>
                </div>
                <div class=" col-sm-6 col-md-4 col-lg-3">
                    <details title="Click to see details">
                        <img src="images/book3.jpg" alt="intercom_book3">

                        <summary>Level Three</summary>
                        <p>
                            <ul>
                                <li>Contains 12 Units</li>
                                <li>Quiz after 2 units</li>
                                <li>Test after 4 units</li>
                                <li>More than 60 vocabulary words before each Unit</li>
                            </ul>
                        </p>
                    </details>
                </div>
                <div class=" col-sm-6 col-md-4 col-lg-3">
                    <details title="Click to see details">
                        <img src="images/book4.jpg" alt="intercom_book4">

                        <summary>Level Four</summary>
                        <p>
                            <ul>
                                <li>Contains 9 Units</li>
                                <li>Quiz after 2 units</li>
                                <li>Test after 3 units</li>
                                <li>More than 60 vocabulary words before each Unit</li>
                            </ul>
                        </p>
                    </details>
                </div>
            </div>
        </div> 
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