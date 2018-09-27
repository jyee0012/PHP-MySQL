<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Query Receive</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
            $thisName = $_GET['person'];
            $thisDept = $_GET['dept'];

            if (isset($thisName)){
                echo "<p>The name is $thisName.</p>";
            }
            if (isset($thisDept)){
                echo "<p>The department is $thisDept.</p>";
            }

        ?>
            
        <script src="" async defer></script>
    </body>
</html>