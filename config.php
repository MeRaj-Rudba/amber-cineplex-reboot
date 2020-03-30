<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "rudba";
 $dbpass = "";
 $db = "project_amber";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>