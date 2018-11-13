<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CD Collection - Details</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <a href="display.php"><h2>CD Collection - Details</h2></a>
        <?php
            require("mysql_connect.php");
            $cdid = $_GET['cd_id'];

            $sql = "SELECT * FROM cd_catalog_class WHERE cd_id = $cdid";        
            $result = mysqli_query($con,$sql) or die (mysql_error());
            /************************** ECHO OUT YOUR RESULTS ***********************/
            while ($row = mysqli_fetch_array($result)) {
                $cd_id = ($row['cd_id']);
                $artist = ($row['artist']);
                $title = ($row['title']);
                $year = ($row['year']);
                $genre = ($row['genre']);
                $label = ($row['label']);
                $artwork = $row['artwork'];
                $description = nl2br($row['description']);
                echo "<div class=\"thisCD\">\n";

                echo "<img src=\"artwork/thumbs150/$artwork\" class=\"cdImage\" /> <br>";

                echo "<span class=\"displayCategory\">Title:</span> <span class=\"displayInfo\">". $title ."</span><br />\n";
                echo "<span class=\"displayCategory\">Artist:</span> <span class=\"displayInfo\">". $artist ."</span><br />\n";
                echo "<span class=\"displayCategory\">Year:</span> <span class=\"displayInfo\">". $year ."</span><br />\n";
                echo "<span class=\"displayCategory\">Label:</span> <span class=\"displayInfo\">". $label ."</span><br />\n";
                echo "<span class=\"displayCategory\">Genre:</span> <span class=\"displayInfo\">". $genre ."</span><br />\n";
                
                echo "<p class=\"displayCategory\">Description:</span> <span class=\"displayInfo\">". $description ."</p><br />\n";
                echo "<div class=\"clearFix\"></div>\n";
                echo "\n</div>\n";
            }
        
        ?>
        
        <script src="" async defer></script>
    </body>
</html>