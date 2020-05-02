<?php
session_start();
include 'config.php';
include 'databaseQuery.php';

$conn = OpenCon();
$noticeTitle = $_SESSION["noticeToDelete"];
$sql = "DELETE FROM notice WHERE title = '$noticeTitle'";

if (mysqli_query($conn, $sql)) {
    header("Location: notice.php");
    //echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

header("Location: notice.php");
CloseCon($conn);
?>