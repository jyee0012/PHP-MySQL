<?php include("includes/connect.php"); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>The Simpsons</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
        </style>
    </head>
    <body>
        <div class="form-group">
            <button class="btn btn-secondary"><a href="index.php">Home</a></button>
            <button class="btn btn-secondary"><a href="insert.php">Insert</a></button>
            <button class="btn btn-secondary"><a href="edit.php">Edit</a></button>
            <button class="btn btn-secondary"><a href="search.php">Search</a></button>
        </div>