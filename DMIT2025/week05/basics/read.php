<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
        // Every time we are working with MySQL, we MUST first connect to the DB
            $con=mysqli_connect("localhost","jyee12","dgsAAh8X2jl1dO7","jyee12_dmit2025");
            // Check connection
            if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            // * means all columns available
            // could also have SELECT the_name, address, occupation, bid from basics

            $result = mysqli_query($con, "SELECT * from basics") or die(mysqli_error($con));
            
            while ($row = mysqli_fetch_array($result)){
                echo "<hr>";
                echo $row['the_name'] . "<br>";
                echo $row['address'] . "<br>";
                echo $row['occupation'] . "<br>";
                echo $row['bid'] . "<br>";
                // echo "</hr>";
            }
        ?>
        <script src="" async defer></script>
    </body>
</html>