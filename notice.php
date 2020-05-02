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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="purchase.css">
    <title>Amber Cineplex | Notice </title>
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

                    <a class="nav-item nav-link" href="notice.php">Notice</a>
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
        <h1>This is notice section</h1>
        <?php
        $conn = OpenCon();

        $sqlMovieCheck = "SELECT * FROM notice ";
        $result = mysqli_query($conn, $sqlMovieCheck);
        $rowCount = "";
        $searchName = "";

        if ($result) {
            // it return number of rows in the table. 
            $rowCount = mysqli_num_rows($result);
        }


        if ($rowCount < 1) {
            echo '<h3>No Notice to show</h3>';
        } else {

            while ($row = mysqli_fetch_assoc($result)) {

                echo '
                   
                   <div  class="card ">
                   
                     <div  class="card-body">
                       <h3 class="card-title">' . $row['title'] . '</h3>
                       <h5 class="card-text"><b>Date : </b>' . $row['date'] . '</h5>
                       <h5 class="card-text"><b>Posted By : </b>' . $row['post_by'] . '</h5>
                       <p class="card-text">' . $row['post_details'] . '</p>';
                if ($_SESSION["username"] === 'Admin') {
                    echo '<button id="' . $row['title'] . '" onclick="noticeSelect(this.id);" class="ghost">Delete</button>';
                }




                echo '
                       </div>
                    </div>
                   
                   ';
            }
        }

        CloseCon($conn);


        ?>

    </div>

    <script>
        function noticeSelect(notice) {
            
            window.location.href = "dataLoad.php?noticeToDelete=" + notice;

        }
    </script>
</body>

</html>