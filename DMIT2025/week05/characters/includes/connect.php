<?php
    $con=mysqli_connect("localhost","jyee12","dgsAAh8X2jl1dO7","jyee12_dmit2025");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    //This stops SQL Injection in POST vars 
    foreach ($_POST as $key => $value) { 
        $_POST[$key] = mysqli_real_escape_string($con, $value); 
    } 

    //This stops SQL Injection in GET vars 
    foreach ($_GET as $key => $value) { 
        $_GET[$key] = mysqli_real_escape_string($con, $value); 
    }
    $database = "fictional_characters";
?>