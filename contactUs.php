<?php

session_start();
include 'config.php';
include 'databaseQuery.php';
$conn = OpenCon();

$sqlUserCheck = "SELECT * FROM now_showing";
$result = mysqli_query($conn, $sqlUserCheck);
$rowCount = "";





CloseCon($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
    <title>Amber Cineplex | Contact Us </title>
</head>

<body>

    <!--Navbar-Starts-->

    <nav class="navbar navbar-expand-lg navbar-default fixed-top theme-bg">
        <div class="container">
            <a class="navbar-brand" href="index.php">Amber Cineplex</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="index.php#schedule">Schedule</a>

                    <a class="nav-item nav-link" href="notice.php">Notice</a>
                    <a class="nav-item nav-link" href="index.php#upcoming">Upcoming</a>
                    <a class="nav-item nav-link" href="contactUs.php">Contact Us</a>
                    <?php
                    if (!isset($_SESSION["username"])) {
                        echo '<a class="nav-item nav-link" href="login.php">Sign In</a>';
                    } else {


                        echo '
              <div class="media">
                  <img class="mr-3 placeholder-image"  src="images/placeholder.jpg" alt="Generic placeholder image">
                  <div class="media-body">';
                        if ($_SESSION["username"] === 'Admin') {
                            # code...
                            echo '<a class="nav-item nav-link" href="admin.php">Welcome ' . $_SESSION["username"] . '</a>';
                        } else {
                            # code...
                            echo '<a class="nav-item nav-link" href="profile.php">Welcome ' . $_SESSION["username"] . '</a>';
                        }


                        echo '</div>
              </div>
              
              ';
                    }


                    ?>

                </div>
            </div>
        </div>
    </nav>
    <div class="container container2 carousel-container">

        <div>
            <div class="container container2 title-border">
                <h1 class="new-title">Welcome</h1>
                <p class="aboutUs ">We are Amber Cineplex.</p>
                <p class="aboutUs ">This Website is to reach out to you beautiful people so that you can buy our movie tickets easily.</p>
            </div>
            <div class="container container2 quotes-box ">

                <p class="text-center quote ">"Cinema’s characteristic forte is its ability to capture and communicate the intimacies of the human mind"</p>
                <p class="text-right writer">-Satyajit Ray</p>
            </div>

        </div>
    </div>

    <div class="container container2 carousel-container">

        <div>
            <div class="container container2 title-border">
                <h1 class="new-title">Welcome</h1>
                <p class="aboutUs ">We are Amber Cineplex.</p>
                <p class="aboutUs ">This Website is to reach out to you beautiful people so that you can buy our movie tickets easily.</p>
            </div>
            <div class="container container2 quotes-box ">

                <p class="text-center quote ">"Cinema’s characteristic forte is its ability to capture and communicate the intimacies of the human mind"</p>
                <p class="text-right writer">-Satyajit Ray</p>
            </div>

        </div>
    </div>


</body>

</html>