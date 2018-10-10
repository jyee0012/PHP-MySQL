<?php include("includes/header.php"); ?>

    <h1>Home Page</h1>
    <div class="container">
    <h2>Random Character</h2>
<?php
    $sql = "SELECT * from $database ORDER BY RAND() LIMIT 1;";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $times = 0;
    while ($row = mysqli_fetch_array($result)){
        //  echo $row['sid'] . "<br>";
        // echoChar($row)
        echoChar($row);
        $times++;
    }
?>
    </div>
<?php include("includes/footer.php"); ?>