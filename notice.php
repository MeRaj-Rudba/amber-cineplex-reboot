<?php
session_start();
include 'config.php';
include 'databaseQuery.php';

$conn = OpenCon();
$limit = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM notice limit $start, $limit";
$result = mysqli_query($conn, $sql);

$sqlCount = "SELECT count(id) AS id FROM notice";
$resultCount = mysqli_query($conn, $sqlCount);
$noticeCount = $resultCount->fetch_all(MYSQLI_ASSOC);
$total = $noticeCount[0]['id'];
$pages = ceil($total / $limit);

$Previous = $page - 1;
$Next = $page + 1;





CloseCon($conn);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0aae940090.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="purchase.css">
    <title>Amber Cineplex | Notice</title>
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
        <?php
        while ($row = mysqli_fetch_assoc($result)) {

            echo '
            
            <div  class="card notice-card">
            
                <div  class="card-body">
                <h3 class="card-title">' . $row['title'] . '</h3>
                <h5 class="card-text"><b>Date : </b>' . $row['date'] . '</h5>
                <h5 class="card-text"><b>Posted By : </b>' . $row['post_by'] . '</h5>
                <p class="card-text">' . $row['post_details'] . '</p>';
            if ($_SESSION["username"] === 'Admin') {
                echo '<button id="' . $row['title'] . '" onclick="noticeSelect(this.id);" class=""><i class="far fa-trash-alt"></i> Delete</button>';
            }




            echo '
                </div>
                </div>
            
            ';
        }




        ?>
    </div>
    <nav aria-label="Page navigation example pagination-style">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if($page==1){
                echo 'disabled';
            }?>">
                <a class="page-link" href="notice.php?page=<?= $Previous; ?>" tabindex="-1" aria-disabled="true"><i class="fas fa-arrow-left"></i></a>
            </li>
            <?php for ($i = 1; $i <= $pages; $i++) {
                echo '<li class="page-item"><a class="page-link" href="notice.php?page=' . $i . '">' . $i . '</a></li>';
            } ?>
            <li class="page-item <?php if($page==$pages){
                echo 'disabled';
            }?>">
                <a class="page-link" href="notice.php?page=<?= $Next; ?>"><i class="fas fa-arrow-right"></i></a>
            </li>
        </ul>
    </nav>


    <footer>
        <small>©2020. Amber Cineplex | Dhaka, Bangladesh</small>
    </footer>











    <script src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>