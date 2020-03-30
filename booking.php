<?php
  session_start();

  


?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
    <title>Amber Cineplex | Booking </title>
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
            }
            else {

              
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
    <!--Booking Area Start-->
    <div class="booking row justify-content-around ">
        <div class="container3 col-lg-4 col-md-4 col-sm-12">
            <div class="card booking-card" >
                <img src="images/poster5.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h3 class="card-title">Birds of prey</h3>
                        <p class="card-text"><b>Director:</b> Cathy Yan.</p>
                        <p class="card-text"><b>Genre:</b> Action, Adventure, Crime.</p>
                        <p class="card-text"><b>Release Date:</b> 7 February 2020. </p>
                        <p class="card-text"><b>Runtime:</b> 1h 49min.</p>
                        <p class="card-text"><b>Cast:</b> Margot Robbie,Mary Elizabeth Winstead,Jurnee Smollett-Bell,Ewan McGregor.</p>
                </div>
              </div>
        </div>
        <div class="container3 col-lg-6 col-md-6 col-sm-12">
          <div class="card booking-card" id="selection-one">
            <div class="card-body">
              
                <h1>Fill the Form to Book Your Ticket</h1>
                <form class="form-group">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Movie</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option selected>Birds of Prey</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
    
                    <br>
                    <br>
                  
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Date</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
    
                    <br>
                    <br>
    
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Theater</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
    
                    <br>
                    <br>
    
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Time</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
    
                    <br>
                    <br>
    
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Class</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
    
                    <br>
                    <br>
    
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Quantity</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
    
                    <br>
                    <br>
    
                  
                    <button type="submit" class="ghost">Submit</button>
                  </form>
            </div>
          </div>
        </div>
      </div>

























        
        
   
    <!--Booking Area Ends-->
    




















    <!--JavaScript-->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>