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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="purchase.css">
    <title>Amber Cineplex | Purchase </title>
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


</body>

</html>