<div class="container carousel-container ">
      <div class="container container2 title-border">
        <h2>Movies</h2>
      </div>
      <!-- Now Showing-->
      <div class="container container2 title-border">
        <h4>Now Showing Movies</h4>
      </div>
      <div class="card-deck justify-content-center w-100">
        <div class="card">

          <div class="card-body">

            <div class="card-body d-flex justify-content-between">

              <!-- Now Showing movie Table-->
              <?php
                $conn = OpenCon();
                $result=getResultAll($conn,'now_showing');
                if ($result) {
                  // it return number of rows in the table. 
                  $rowCount = mysqli_num_rows($result);
                }
                if ($rowCount < 1) {
                  echo '<div class="container container2 title-border">
                    <h3>No Movies Showing Now!</h3>
                  </div>';
                } else {
                  echo
                    '
                  <table class="table table-hover theme-bg">
                    <thead>
                      <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Movie</th>
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
                          <td>' . $row["mv_name"] . '</td>
                        </tr>
                      </tbody>';
            
                    $sl++;
                  }
                  CloseCon($conn);
              ?>


            </div>
          </div>
          <div class="card-footer">



          </div>
        </div>

      </div>
</div>