<?php
    
    
    
    function getResult($conn, $tableName, $username){
        $sqlUserCheck = "SELECT * FROM $tableName WHERE username = '$username'";
        $result = mysqli_query($conn, $sqlUserCheck);
        $rowCount = "";
        
        if ($result) {
    
        


        return $result;}
    }


   
?>