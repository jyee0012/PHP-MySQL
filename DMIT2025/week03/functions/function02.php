<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Functions 02</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <?php
    // Here we are talking about "custom functions", ones that you can create and define.
    $word = $_GET['input'];
    // one of the limits of custom functions is that script wide variables are not available within them. 
    // Therefore, we must pass info to them as parameters (arguments) which are local vars just within that functions.
    function createURL($txt){
        $URL = "http://www.".$txt.".com";
        return $URL;
    }
    if ($word != ""){
        echo "<a href=". createURL($word). ">".$word."</a>";
    }

    ?>
    <button><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">Go Home</a></button>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <label for="input">Some Word: </label>
    <input type="text" id="input" name="input">
    <br>
    <input type="submit" name="mysubmit">
    </form>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>
    </body>
</html>