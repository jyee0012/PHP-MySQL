<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PHP Conditionals</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <h1>PHP Conditionals</h1>
        <?php
        // if/then/else
        echo "<p>";
        if (5>3){
            echo "I am true";
        }else{
            echo "I am false";
        }
        echo "</p> <p>";
        if((5>3) &&(6<15)){
            echo "and I am true";
        }else{
            echo "and I am not true";
        }
        echo "</p>";
        echo "<hr>";

        echo "<p>";
        $x = 2;
        switch($x){
            case 0:
            echo "0";
            break;
            case 1:
            echo "1";
            break;
            case 2:
            echo "2";
            break;
            case 3:
            echo "3";
            break;
            default:
            echo "I am default";
            break;
        }
        echo "</p>";
        ?>
        <script src="" async defer></script>
    </body>
</html>