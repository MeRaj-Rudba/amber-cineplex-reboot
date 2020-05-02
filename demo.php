<?php
      $conn = OpenCon();

      $sqlMovieCheck = "SELECT * FROM movies WHERE status = 'Now Showing'
      OR status = 'Upcoming'";
      $result = mysqli_query($conn, $sqlMovieCheck);
      $rowCount = "";
      $searchName = "";

      if ($result) {
        
        $rowCount = mysqli_num_rows($result);
      }


      if ($rowCount < 1) {
        echo '<h3>No Movies to show</h3>';
      } else {

        while ($row = mysqli_fetch_assoc($result)) {
          echo'
          
              <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="' . $row['banner'] . '" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h3>' . $row['mv_name'] . '</h3>
                  <p>Starring: ' . $row['cast'] . '</p>
                </div>
              </div>
          
         
          ';

          }  
        
    }
CloseCon($conn);
?>
    

























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