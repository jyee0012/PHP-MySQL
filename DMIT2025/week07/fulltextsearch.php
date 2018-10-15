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
        <form action="fulltextsearch.php" method="post">
            <input type="text" name="search" value="<?php if ($searchterm) echo $searchterm; ?>">
            <input type="submit" name="mysubmit">
        </form>
        <?php
            if (isset($_POST['mysubmit']))
            {
                $searchterm = trim($_POST['search']);
                echo "<p>searching for \"$searchterm\"....</p>";
                $con=mysqli_connect("localhost","jyee12","dgsAAh8X2jl1dO7","jyee12_dmit2025");
                $sql = "SELECT * FROM fictional_characters WHERE MATCH (jye_fname,jye_lname,jye_description) AGAINST ('$searchterm' IN BOOLEAN MODE)";
                $result = mysqli_query($con, $sql);
                // if there are no results, let's tell the user
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        echo "<hr>";
                        echo $row['jye_fname'] . " " . $row['jye_lname'] . "<br>";
                        echo "From: " . $row['jye_series'] . "<br>";
                    }
                }else{
                    echo "<b>No results</b>";
                }
            }
        ?>
        <script src="" async defer></script>
    </body>
</html>