<?php include("includes/header.php"); ?>

    <h1>Fictional Characters</h1>
    <div class="character-list">
<?php
     $result = mysqli_query($con, "SELECT * from $database") or die(mysqli_error($con));

     while ($row = mysqli_fetch_array($result)){
        echo "<div class=\"character\">";
        //  echo $row['sid'] . "<br>";
        $fname = $row['jye_fname']; 
        $lname = $row['jye_lname'];
        $descrip = nl2br($row['jye_description']);
        $charinfo = nl2br($row['jye_charinfo']);
        $series = $row['jye_series'];
        $source = $row['jye_source'];
        echo "<h3>$fname $lname</h3>";
        echo "<br><p>$descrip</p>";
        echo "<br><p>$charinfo</p>";
        echo "<h4 class=\"series\">$series</h4>";
        echo "<a href=\"$source\" class=\"btn btn-secondary\">Source for $fname $lname</a>";
        echo "</div>";
     }
?>
    </div>
<?php include("includes/footer.php"); ?>