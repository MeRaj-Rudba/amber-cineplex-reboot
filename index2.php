<?php

session_start();
include 'config.php';

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
      <a class="navbar-brand" href="#">Amber Cineplex</a>
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
                  <div class="media-body">
                    <a class="nav-item nav-link" href="profile.php">Welcome ' . $_SESSION["username"] . '</a>
                  </div>
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
      <h2 class="date-h2">Friday,6 March,2020</h2>
      <table class="table table-hover theme-bg">
        <thead>

        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Birds of Prey</td>
            <td>12.30PM</td>
            <td>2.30PM</td>
            <td>4.30PM</td>
            <td>7.00PM</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Frozen 2</td>
            <td>11.00AM</td>
            <td>1.30PM</td>
            <td>4.00PM</td>
            <td>6.30PM</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Maleficent 2</td>
            <td>12.00PM</td>
            <td>NONE</td>
            <td>3.00PM</td>
            <td>6.00PM</td>
          </tr>
        </tbody>
      </table>
      <!--Day 2-->
      <h2 class="date-h2">Saturday,7 March,2020</h2>
      <table class="table table-hover theme-bg">
        <thead>

        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Birds of Prey</td>
            <td>12.30PM</td>
            <td>2.30PM</td>
            <td>4.30PM</td>
            <td>7.00PM</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Frozen 2</td>
            <td>11.00AM</td>
            <td>1.30PM</td>
            <td>4.00PM</td>
            <td>6.30PM</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Maleficent 2</td>
            <td>12.00PM</td>
            <td>NONE</td>
            <td>3.00PM</td>
            <td>6.00PM</td>
          </tr>
        </tbody>
      </table>
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

      $sqlUserCheck = "SELECT * FROM now_showing";
      $result = mysqli_query($conn, $sqlUserCheck);
      $rowCount = "";
      $searchName="";
      
      if ($result) {
        // it return number of rows in the table. 
        $rowCount = mysqli_num_rows($result);
      }


      if ($rowCount < 1) {
        echo '<h3>No Movies to show</h3>';
      } 
      else {

        while ($row = mysqli_fetch_assoc($result)) {
          $searchName=$row['mv_name'];
          $sqlUserCheckMovie = "SELECT mv_name, director, genre, release_date, runtime, cast, poster FROM movies WHERE mv_name = '$searchName'";
          $resultMovie = mysqli_query($conn, $sqlUserCheckMovie);
          if ($resultMovie) {
            // it return number of rows in the table. 
            $count = mysqli_num_rows($resultMovie);
          }
          if ($count !== 0) {
            $movieRow = mysqli_fetch_assoc($resultMovie);
            echo '
                  
                  <div class="card">
                    <img src="'.$movieRow['poster'].'" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h3 class="card-title">'.$movieRow['mv_name'].'</h3>
                      <p class="card-text"><b>Director:</b>'.$movieRow['director'].'</p>
                      <p class="card-text"><b>Genre:</b> '.$movieRow['genre'].'</p>
                      <p class="card-text"><b>Release Date:</b>'.$movieRow['release_date'].'</p>
                      <p class="card-text"><b>Runtime:</b>'.$movieRow['runtime'].'</p>
                      <p class="card-text"><b>Cast:</b>'.$movieRow['cast'].'</p>
                    </div>
                    <div class="card-footer">
                      <button class="ghost">Watch now</button>
                    </div>
                  </div>
                  
                  ';
          } 
          
          
        
        
        
          
        }
      




      }
      CloseCon($conn);
      ?>
    
  </div>
  <!--Showing now Ends-->


  <!--Upcoming starts-->
  <div class="container container2" id="upcoming">
    <div class="container container2 title-border">
      <h1>Coming Soon</h1>
    </div>
    <div class="card-deck">
      <div class="card">
        <img src="images/poster3.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h3 class="card-title">Wonder Women 1984</h3>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
          <h3>Coming Soon</h3>
        </div>
      </div>
      <div class="card">
        <img src="images/poster1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h3 class="card-title">No Time To die</h3>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer">
          <h3>Coming Soon</h3>
        </div>
      </div>
      <div class="card">
        <img src="images/poster6.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h3 class="card-title">Fast & Furious 9</h3>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer">
          <h3>Coming Soon</h3>
        </div>
      </div>

    </div>

  </div>
  <!--Upcoming  Ends-->


  <footer>
    <small>©2020. Amber Cineplex | Dhaka, Bangladesh</small>
  </footer>






  <!--JavaScript-->

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>