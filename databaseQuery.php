<?php
    
    
    
    function getResult($conn, $tableName, $username){
        $sqlUserCheck = "SELECT * FROM $tableName WHERE username = '$username'";
        $result = mysqli_query($conn, $sqlUserCheck);
        
        
        if ($result) {
             return $result;
        }
    }

    
    function getResultAll($conn, $tableName){
        $sqlUserCheck = "SELECT * FROM $tableName";
        $result = mysqli_query($conn, $sqlUserCheck);
        
        
        if ($result) {
            return $result;
        }
    }


   
?>