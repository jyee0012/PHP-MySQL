<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PHP Alternative Syntax</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h1>PHP Alternative Syntax</h1>
        <h3>Example If/Then Statement</h3>
        <?php if (date("d") % 2 == 0): ?>
            <b>Today is EVEN</b>
        <?php else: ?>
            <b>Today is ODD</b>
        <?php endif; ?>
            <h3>Example While Loop from DB Query</h3>
        <?php 
            $con=mysqli_connect("localhost","jyee12","dgsAAh8X2jl1dO7","jyee12_dmit2025");
            $sql = "SELECT * FROM fictional_characters";
            $result = mysqli_query($con, $sql);
        ?>
        <?php while ($row = mysqli_fetch_array($result)): ?>
            <hr>
            <b>Name: </b> <?php echo $row['jye_fname'] . " " . $row['jye_lname'];?>
            <br>
            <b>From: </b> <?php echo $row['jye_series'];?>
        
        <?php endwhile; ?>
        <script src="" async defer></script>
    </body>
</html>