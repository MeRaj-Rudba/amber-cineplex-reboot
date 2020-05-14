<?php
session_start();
include 'config.php';
include 'databaseQuery.php';
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
    <link rel="stylesheet" href="purchase.css">
    <title>Amber Cineplex | Purchase </title>
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

    <div class="container carousel-container ">
        <div class="ticket  row">
            <div class="card ticket-card  col-8">
                <div class="ticket-head">
                    <h1>Amber Cineplex</h1>
                </div>
                <div class="ticket-body">
                    <table class="ticket-table">

                        <tr>
                            <td>
                                <h3><b>Movie:<b> <?php echo $_SESSION['movieName']; ?></h3>

                            </td>
                        </tr>

                        <br>
                        <tr>
                            <td>
                                <p><b>Date : </b> <?php echo $_SESSION['showDate']; ?></p>
                            </td>
                            <td>
                                <p><b>Time : </b> <?php echo $_SESSION['showTime']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><b>Theatre : </b> <?php echo $_SESSION['theatreName'] ;?></p>
                            </td>
                            <td>
                                <p><b>Quantity : </b> <?php echo $_SESSION['quantity']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><b>Price : </b> <?php echo $_SESSION['price'].' BDT'; ?></p>
                            </td>
                            <td>
                                <p><b>Amount : </b> <?php echo $_SESSION['amount'].' BDT'; ?></p>
                            </td>
                        </tr>

                    </table>

                </div>
                <div class="ticket-footer">
                    <p class="caution"><b>Please Make sure to bring this ticket with you</b></p>
                </div>

            </div>
            <div class=" card ticket-card col-3">
                <div class="ticket-head">
                    <h1>Logo</h1>
                </div>
                <div class="ticket-body">
                    <p><b>Movie : </b> <?php echo $_SESSION['movieName']; ?></p>
                    <p><b>Theatre : </b> <?php echo $_SESSION['theatreName']; ?></p>
                    <p><b>Date : </b> <?php echo $_SESSION['showDate']; ?></p>
                    <p><b>Time : </b> <?php echo $_SESSION['showTime']; ?></p>
                    <p><b>Quantity : </b> <?php echo $_SESSION['quantity']; ?></p>
                    <p><b>Amount : </b> <?php echo $_SESSION['amount'].' BDT'; ?></p>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>