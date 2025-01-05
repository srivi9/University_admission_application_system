<?php

    $servername = "10.0.19.74";
    $username = "kad08203";
    $password = "kad08203";
    $dbname = "db_kad08203";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }
    echo("Connected successfully <br/><br/>");


?>
