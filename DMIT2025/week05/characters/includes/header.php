<?php include("includes/connect.php"); ?>
<?php
    $thisFile = basename($_SERVER['PHP_SELF']);
    $title = ucwords(str_replace(".php","",$thisFile));
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

        <style type="text/css">
            .formstyle{ /* optional: in case you don't like the really wide form */
                max-width:450px;
            }
            a{
                color: #333;
            }
            a:hover{
                text-decoration:none;
            }
            .character{
                border: 1px solid black;
                border-radius: 1rem;
                background-image: linear-gradient(up, #333, #777);
                width: 60rem;
                margin: 0 auto;
                padding: 0.5rem 2rem;
                padding-bottom: 3rem;
                margin-bottom: 3rem;
            }
            .character .series{
                margin-top: 0.5rem;
                float: left;

            }
            .character a{
                /* margin-top: 0rem; */
                float: right;

            }
            .character-list{
                width: 100%;
                padding: 1rem;
            }
            .character-list h1{
                text-align:center;
                /* margin: 0 auto; */
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Home</a>
            <a class="navbar-brand" href="list.php">List</a>
            <a class="navbar-brand" href="create.php">Create</a>
            <a class="navbar-brand" href="update.php">Update</a>
            <a class="navbar-brand" href="search.php">Search</a>
        </nav>