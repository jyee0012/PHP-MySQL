<?php include("includes/mysql_connect.php"); ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Original</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <style type="text/css">
            .gallery{
                width: 100%;
                padding: 1rem;
                /* margin: 0 auto; */
            }
            .display{
                /* float: left; */
                display: inline-block;
                padding: 0.4rem;
                background-color: #2230FF;
                margin: 1rem;
                border-radius: 0.5rem;
            }
        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <?php
            $img = trim($_GET['img']);
            $img = filter_var($img, FILTER_SANITIZE_NUMBER_INT);

            $sql = "SELECT * from $database where $id = $img";
            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            
            echo "\n<div class=\"gallery\">";
            while ($row = mysqli_fetch_array($result)){
                $filename = $row['filename'];
                $imgid = $row['id'];
                echo "\n<div class=\"display\">";
                echo "\n<img src=\"uploadedfiles/$filename\">";
                echo "</div>";
            }
            echo "</div>";
        ?>
            
        <a href="display.php"><button>Gallery</button></a>
        <script src="" async defer></script>
    </body>
</html>