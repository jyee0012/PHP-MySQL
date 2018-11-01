<?php include("includes/mysql_connect.php"); ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Gallery</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <style type="text/css">
            .thumbs{
                float: left;
                padding: 0.4rem;
                border-radius: 0.5rem;
                height: 8rem;
                width: 10rem;
                background-color: #cdcdcd;
                margin: 1rem;
                
            }
            .thumbs img{
                max-height: 8rem;
            }
            img.center {
                display: block;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <?php
            $sql = "SELECT * from $database";
            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            
            echo "\n<div class=\"gallery\">";
            while ($row = mysqli_fetch_array($result)){
                $filename = $row['filename'];
                $imgid = $row['id'];
                echo "\n<div class=\"thumbs\">";
                echo "\n<a href=\"single.php?img=$imgid\"><img class=\"center\" src=\"uploadedfiles/thumbs/$filename\"></a>";
                echo "</div>";
            }
            echo "</div>";
        ?>

        <a href="04-Upload_Validation_Thumbs_DB.php"><button>Upload</button></a>

        <script src="" async defer></script>
    </body>
</html>