<?php include("includes/connect.php"); ?>
<?php
    $thisFile = basename($_SERVER['PHP_SELF']);
    $title = ucwords(str_replace(".php","",$thisFile));
    
    function echoChar($row){
        
        $fname = $row['jye_fname']; 
        $lname = $row['jye_lname'];
        $descrip = nl2br($row['jye_description']);
        $charinfo = nl2br($row['jye_charinfo']);
        $series = $row['jye_series'];
        $source = $row['jye_source'];
        $useSource = $source;

        echo "<div class=\"character\">";
        echo "<h3>$fname $lname</h3>";
        
        if ($charNum){
            echo "<h4 class=\"float-right\">#$charNum</h4>";
        }

        if ($descrip){
            echo "<br><h4>Description:</h4>";
            echo "<p>$descrip</p>";
        }
        if ($charinfo){
            echo "<br><h4>Character Info:</h4>";
            echo "<p>$charinfo</p>";
        }

        echo "<p class=\"series\">from </p>";
        echo "<h4 class=\"series series-left\">$series</h4>";
        // for $fname $lname
        if ($source == "Personal Source"){
            $useSource = "";
        }
        echo "<a href=\"$useSource\" class=\"btn btn-secondary\">Source </a>";
        
        echo "</div>";
    }
    $sourcePlaceholder = "Wiki Link or Personal Source";
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Fictional Characters - <?php echo "$title"; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <style type="text/css">
            
        </style>
    </head>
    <body>
        <div> 
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">Home</a>
                <a class="navbar-brand" href="list.php">List</a>
                <a class="navbar-brand" href="create.php">Create</a>
                <a class="navbar-brand" href="update.php">Update</a>
                <a class="navbar-brand" href="search.php">Search</a>
            </nav>