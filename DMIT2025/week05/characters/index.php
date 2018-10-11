<?php include("includes/header.php"); ?>
    <style type="text/css">
        .welcome-text{
            padding: 2rem;
            width: 50rem;
        }
    </style>
    <h1>Home Page</h1>
    <div class="container">
    <div class="welcome-text">
        <h3>Welcome to the Fictional Character Database of Jyee12</h3>
        <p>This is where many different characters across many different series may be stored. 
            Each character only needs a first name, series and source.</p>
        <p>Please use the character below as an example.
            Here is a random character from within the database.</p>
    </div>
    <h2>Random Character</h2>
<?php
    $sql = "SELECT * from $database ORDER BY RAND() LIMIT 1;";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($result)){
        //  echo $row['sid'] . "<br>";
        // echoChar($row)
        echoChar($row);
    }
?>
    </div>
<?php include("includes/footer.php"); ?>