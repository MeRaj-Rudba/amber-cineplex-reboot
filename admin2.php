<?php
session_start();

include 'config.php';
include 'databaseQuery.php';
$conn = OpenCon();
$msg = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/0aae940090.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
    <title>Document</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light  theme-bg">
  <div class="container">
            <a class="navbar-brand" href="index.php">Amber Cineplex</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    
                    
                    <a class="nav-item nav-link" href="notice.php">Notice</a>
                    
                    <a class="nav-item nav-link" href="contactUs.php">About Us</a>
                    <?php
                    if (!isset($_SESSION["username"])) {
                        echo '<a class="nav-item nav-link" href="login.php">Sign In</a>';
                    } else {


                        echo '
                <div class="media">
                    
                    <div class="media-body">';
                        if ($_SESSION["username"] === 'Admin') {
                            # code...
                            echo '<a class="nav-item nav-link" href="admin.php"><i class="fas fa-user-secret"></i> ' .$_SESSION["username"].'</a>';
                        } else {
                            # code...
                            echo '<a class="nav-item nav-link" href="profile.php"><i class="fas fa-user"></i> ' .$_SESSION["username"].'</a>';
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

    <div class="container carousel-container">
        <div class="container container2 title-border">
            <h1>Admin Panel</h1>
        </div>
        <div class="card-deck justify-content-center w-100">
            <div class="card ">
                <div class="card-body">
                    <div class="card-body d-flex justify-content-between">
                        <h4 class="card-title">Welcome to your panel</h4>
                        <a href="logout.php"><button class="">Sign Out <i class="fas fa-sign-out-alt"></i></button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container carousel-container mb-5">
        
            <div class="d-flex justify-content-between row">

                <div class="card text-center  admin-card movie-card  	col-lg-3 col-5">
                    <div class="card-body p-3">
                        <h1 class="admin-panel-card-icon"><i class="fas fa-user-tie"></i></h1>
                        <a href=""><h4 class="admin-card-text">Profile</h4></a>
                    </div>
                </div>
                <div class="card text-center  admin-card movie-card  	col-lg-3 col-5">
                    <div class="card-body p-3">
                        <h1 class="admin-panel-card-icon"><i class="fas fa-film"></i></h1>
                        <a href=""><h4 class="admin-card-text">Movie</h4></a>
                    </div>
                </div>
                <div class="card text-center  admin-card movie-card  	col-lg-3 col-5">
                    <div class="card-body p-3">
                        <h1 class="admin-panel-card-icon"><i class="fas fa-theater-masks"></i></h1>
                        <a href=""><h4 class="admin-card-text">Theatre</h4></a>
                    </div>
                </div>
                <div class="card text-center  admin-card movie-card  	col-lg-3 col-5">
                    <div class="card-body p-3">
                        <h1 class="admin-panel-card-icon"><i class="far fa-calendar-alt"></i></h1>
                        <a href=""><h4 class="admin-card-text">Schedule</h4></a>
                    </div>
                </div>

                <div class="card text-center  admin-card movie-card  	col-lg-3 col-5">
                    <div class="card-body p-3">
                        <h1 class="admin-panel-card-icon"><i class="far fa-clipboard"></i></h1>
                        <a href=""><h4 class="admin-card-text">Notice</h4></a>
                    </div>
                </div>
                <div class="card text-center  admin-card movie-card  	col-lg-3 col-5">
                    <div class="card-body p-3">
                        <h1 class="admin-panel-card-icon"><i class="fas fa-users"></i></h1>
                        <a href=""><h4 class="admin-card-text">Users</h4></a>
                    </div>
                </div>
            </div>


        

    </div>







    <footer>
        <small>©2020. Amber Cineplex | Dhaka, Bangladesh</small>
    </footer>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>