<?php

session_start();
include 'config.php';
include 'databaseQuery.php';


$conn = OpenCon();

if(isset($_POST['limitValue'])){
  $lv = $_POST['limitValue'];
  $sql = "select username, comment_text from comments limit $lv";
  $result = mysqli_query($conn, $sql);
}
else if(isset($_POST['searchedKeyWord'])){
  $sk = $_POST['searchedKeyWord'];
  $sql = "select username, comment_text from comments where comment_text like '%$sk%'";
  $result = mysqli_query($conn, $sql);
}
else if(isset($_POST['startingValue'])){
  $sv = $_POST['startingValue'];
  $sql = "select username, comment_text from comments limit $sv, 2";
  $result = mysqli_query($conn, $sql);
}

?>

<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    
    <?php
      while($row = mysqli_fetch_assoc($result)){
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
               
        <div  class="card notice-card">
        
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
    ?>
    
  </body>
</html>
