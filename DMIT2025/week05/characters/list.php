<?php include("includes/header.php"); ?>

    <div class="container">
    <h1>Fictional Characters</h1>
<?php
     $result = mysqli_query($con, "SELECT * from $database") or die(mysqli_error($con));

     while ($row = mysqli_fetch_array($result)){
        //  echo $row['sid'] . "<br>";
        // echoChar($row)
        echoChar($row);
     }
?>
    </div>
<?php include("includes/footer.php"); ?>