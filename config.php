<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "collegedb";

    $conn = mysqli_connect($servername,$username, $password,$database);

    if(!$conn){
        die ("failed to connect to the database due toh this error...".mysqli_connect_error());
    }
    else{
        // echo "connected succesfully"."<br>";
    }
?>