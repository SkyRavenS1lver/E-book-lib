<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "library";

    // Create connection
    $conn = mysqli_connect($servername,$username,$password,$database);
    $connection = new mysqli($servername,$username,$password,$database);
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }

    ?>