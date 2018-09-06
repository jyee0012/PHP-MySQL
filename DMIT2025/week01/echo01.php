<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PHP Echo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <style>
        .highlite{
            color:red;
        }
        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <h1>PHP Echo</h1>
        <?php
        
        /* here us a PHP comment */
        // The instruction terminator (;) MUST conclude every line of code
        // If we want cleaner output to help debug our client side, we can use the new line chars (\n)
        // If we want to tab something over then we use \t
        echo "here is a text string written by someone.";
        echo "<p> We can even mix in <b>HTML tags</b> with our PHP code</p>";
        // We can escape a character by preceding it with the \
        echo "\n\t\t\t<p>What if we want \"qutoes\" within a text string?</p>";
        echo "\n<p>here is some <span class=\"highlite\">more HTML</span></p>";
        
        ?>
        <script src="" async defer></script>
    </body>
</html>