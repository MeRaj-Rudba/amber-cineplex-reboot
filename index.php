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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="profile.css">
  <title>Amber Cineplex | Home </title>
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
          <a class="nav-item nav-link" href="index.php#">Pricing</a>
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
  <!--NavBar-Ends-->







  <!--Carousel-Starts-->
  <div class="container container2 carousel-container">
    <div id="carouselExampleCaptions" class="carousel slide justify-content-center w-100" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/banner1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>First slide label</h3>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/banner2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>Second slide label</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/banner3.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>Third slide label</h3>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/banner4.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>Third slide label</h3>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/banner5.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>Third slide label</h3>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/banner6.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>Third slide label</h3>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
          </div>
        </div>


      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!--Carousol-Ends-->

  <!--Schedule Starts-->
  <div class="container container2" id="schedule">
    <div class="container container2 title-border">
      <h1>Schedule</h1>
    </div>
    <div>
      <!--Schedule Data Table-->
      <h2 class="date-h2"><?php echo date("D, d M Y"); ?></h2>
      <?php
      $conn = OpenCon();
      $sql = "SELECT * FROM theatre;";

      $result = mysqli_query($conn, $sql);
      $rowCount = "";
      if ($result) {
        // it return number of rows in the table. 
        $rowCount = mysqli_num_rows($result);
      }
      if ($rowCount < 1) {
        echo '<div class="container container2 title-border">
                <h3>No Schedule to show!</h3>
              </div>';
      } else {
        echo
          '
              <table class="table table-hover theme-bg">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Movie</th>
                    <th scope="col">Theatre</th>
                    <th scope="col">First Show</th>
                    <th scope="col">Second Show</th>
                    <th scope="col">Third Show</th>
                  </tr>
                </thead>
              ';
        $sl = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo
            '
              
                  <tbody>
                    <tr>
                      <th scope="row">' . $sl . '</th>
                      <td>' . $row['movie'] . '</td>
                      <td>' . $row['theatre_name'] . '</td>
                      <td>' . $row['show_1'] . '</td>
                      <td>' . $row['show_2'] . '</td>
                      <td>' . $row['show_3'] . '</td>
                    </tr>
                  </tbody>';

          $sl++;
        }
        echo '</table>';
      }
      CloseCon($conn);
      ?>






    </div>

  </div>
  <!--Schedule Ends-->




  <!--Showing now Starts-->
  <div class="container container2" id="booking">
    <div class="container container2 title-border">
      <h1>Now Showing</h1>
    </div>
    <div class="card-deck">
      <?php
      $conn = OpenCon();

      $sqlMovieCheck = "SELECT mv_name, director, genre, release_date, runtime, cast, poster FROM movies WHERE status = 'Now Showing'";
      $result = mysqli_query($conn, $sqlMovieCheck);
      $rowCount = "";
      $searchName = "";

      if ($result) {
        // it return number of rows in the table. 
        $rowCount = mysqli_num_rows($result);
      }


      if ($rowCount < 1) {
        echo '<h3>No Movies to show</h3>';
      } else {

        while ($row = mysqli_fetch_assoc($result)) {
          
            echo '
                  
                  <div  class="card ">
                  <img src="' . $row['poster'] . '" class="card-img-top" alt="...">
                    <div id="movie_card" class="card-body">
                      <h3 class="card-title">' . $row['mv_name'] . '</h3>
                      <p class="card-text"><b>Director : </b>' . $row['director'] . '</p>
                      <p class="card-text"><b>Genre : </b> ' . $row['genre'] . '</p>
                      <p class="card-text"><b>Release Date : </b>' . $row['release_date'] . '</p>
                      <p class="card-text"><b>Runtime : </b>' . $row['runtime'] . '</p>
                      <p class="card-text"><b>Cast : </b>' . $row['cast'] . '</p>
                    </div>
                    <div class="card-footer">
                      <button id="' . $row['mv_name'] . '" onclick="movieSelect(this.id);" class="ghost">Watch now</button>
                    </div>
                    
                  </div>
                  
                  ';
          }
        }
      
      CloseCon($conn);
      ?>





    </div>

  </div>
  <!--Showing now Ends-->


  <!--Upcoming starts-->
  <div class="container container2" id="upcoming">
    <div class="container container2 title-border">
      <h1>Coming Soon</h1>
    </div>
    <div class="card-deck">
      <!--PHP code here for dynamic-->
      <?php
      $conn = OpenCon();

      $sqlMovieCheck = "SELECT mv_name, director, genre, release_date, runtime, cast, poster FROM movies WHERE status = 'Coming Soon'";
      $result = mysqli_query($conn, $sqlMovieCheck);
      $rowCount = "";
      $searchName = "";

      if ($result) {
        // it return number of rows in the table. 
        $rowCount = mysqli_num_rows($result);
      }


      if ($rowCount < 1) {
        echo '<h3>No Movies to show</h3>';
      } else {

        while ($row = mysqli_fetch_assoc($result)) {
          
            echo '
                  
                  <div  class="card ">
                  <img src="' . $row['poster'] . '" class="card-img-top" alt="...">
                    <div id="movie_card" class="card-body">
                      <h3 class="card-title">' . $row['mv_name'] . '</h3>
                      <p class="card-text"><b>Director : </b>' . $row['director'] . '</p>
                      <p class="card-text"><b>Genre : </b> ' . $row['genre'] . '</p>
                      <p class="card-text"><b>Release Date : </b>' . $row['release_date'] . '</p>
                      <p class="card-text"><b>Runtime : </b>' . $row['runtime'] . '</p>
                      <p class="card-text"><b>Cast : </b>' . $row['cast'] . '</p>
                    </div>
                    <div class="card-footer">
                      <h3>Coming Soon</h3>
                    </div>
                    
                  </div>
                  
                  ';
          }
        }
      
      CloseCon($conn);
      ?>




    </div>

  </div>
  <!--Upcoming  Ends-->


  <footer>
    <small>©2020. Amber Cineplex | Dhaka, Bangladesh</small>
  </footer>






  <!--JavaScript-->
  <script src="movieSelection.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>