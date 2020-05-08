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
    <script src="https://kit.fontawesome.com/0aae940090.js" crossorigin="anonymous"></script>
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
                    <a class="nav-item nav-link" href="contactUs.php">About Us</a>
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
        <div class="line-bar"></div>
    </div>

    <div class="container container2 carousel-container">
        <div class="developers">
            <div class="title-box">
                <h1 class="text-center">Developer Team</h1>
            </div>
            <div class="profile d-flex justify-content-between">
                <div class="col-4">
                    <div class="card bio-pic-card ">
                        <img class="card-img-top bio-pic" src="images/us/nowshin.jpg" alt="Card image cap">

                    </div>
                </div>
                <section class="biography col-6">
                    <article>
                        <div class="top-of-article">
                            <p class="bio-title">Nowshin Sabrin</p>
                            <p class="bio-designation">BSc.CSE in American International University Bangladesh</p>
                            <p class="bio-writings">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis minus minima culpa maiores repudiandae? A aspernatur quo, reiciendis sed magnam vero? Quia perferendis qui molestiae ratione ut ipsa, impedit velit.</p>
                        </div>

                        <div class="contact-dev d-flex justify-content-between">
                            

                            <span class="icons-bio">
                                <i class="far fa-envelope"><span class="info-bio"> nowshinsabrin908@gmail.com</span></i>

                            </span>

                            <span class="icons-bio">
                                <i class="fab fa-github"><span class="info-bio"> +abrakadabra</span></i>

                            </span>
                        </div>

                    </article>
                </section>
            </div>
            <div class="profile d-flex justify-content-between">
                <section class="biography col-6">
                    <article>
                        <div class="top-of-article">
                            <p class="bio-title">Fahad Khandoker</p>
                            <p class="bio-designation">BSc.CSE in American International University Bangladesh</p>
                            <p class="bio-writings">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias assumenda cupiditate voluptatum, voluptatem asperiores vitae qui consequuntur placeat eum exercitationem magnam labore quod in veritatis ea numquam voluptas voluptate odit.</p>
                        </div>

                        <div class="contact-dev d-flex justify-content-between">
                            
                            <span class="icons-bio">
                                <i class="far fa-envelope"><span class="info-bio"> amberCineplex@gmail.com</span></i>

                            </span>

                            <span class="icons-bio">
                                <i class="fab fa-github"><span class="info-bio"> +8801234567889</span></i>

                            </span>
                        </div>

                    </article>
                </section>
                <div class="col-4">
                    <div class="card bio-pic-card">
                        <img class="card-img-top " src="images/us/fahad.jpg" alt="Card image cap">

                    </div>
                </div>

            </div>

            <div class="profile d-flex justify-content-between">
                <div class="col-4">
                    <div class="card bio-pic-card">
                        <img class="card-img-top " src="images/us/rudba.JPG" alt="Card image cap">

                    </div>
                </div>
                <section class="biography col-6">
                    <article>
                        <div class="top-of-article">
                            <p class="bio-title">MeRaj Rudba </p>
                            <p class="bio-designation">BSc.SE in American International University Bangladesh</p>
                            <p class="bio-writings">Courteous and enthusiastic, I am interested in IT and everything in its orbit. I recently began to be fascinated by *web programming*, e.g. *developing apps* and *building websites*. Invited to join my friend's start-up company as a *front-end developer*, I gained experience of working in this area.</p>
                        </div>

                        <div class="contact-dev d-flex justify-content-between">
                            
                            <span class="icons-bio">
                                <i class="far fa-envelope"><span class="info-bio"> mrudba@gmail.com</span></i>

                            </span>

                            <span class="icons-bio">
                                <i class="fab fa-github"><span class="info-bio"> github.com/MeRaj-Rudba</span></i>

                            </span>
                        </div>

                    </article>
                </section>
            </div>


        </div>

    </div>


    <div class="container container2 carousel-container">
        <div class="line-bar"></div>
    </div>


    <div class="container container2 carousel-container">
        <div class="title-box">
            <h1 class="text-center">Contact Us</h1>
        </div>
        <div class="d-flex justify-content-between">
            <span class="icons">
                <i class="fab fa-facebook-square"><span class="info"> facebook.com/amberCineplex</span></i>

            </span>

            <span class="icons">
                <i class="far fa-envelope"><span class="info"> amberCineplex@gmail.com</span></i>

            </span>

            <span class="icons">
                <i class="fab fa-github"><span class="info-bio"> +8801234567889</span></i>

            </span>
        </div>

    </div>
    <footer>
        <small>©2020. Amber Cineplex | Dhaka, Bangladesh</small>
    </footer>


</body>

</html>