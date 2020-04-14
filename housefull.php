<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amber Cineplex | Housefull</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
</head>

<body>
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
                    
                    <a class="nav-item nav-link" href="booking.php">Booking</a>
                    <a class="nav-item nav-link" href="index.php#upcoming">Upcoming</a>
                    <a class="nav-item nav-link" href="index.php#">Contact Us</a>
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
    <div class=" justify-content-center container carousel-container ">
        <h1 class="p-2">Sorry we've ran out of seats you have requested!</h1><br>
        <h4 class="p-2">You can change the quantity or select another show time</h4>
    </div>

</body>

</html>