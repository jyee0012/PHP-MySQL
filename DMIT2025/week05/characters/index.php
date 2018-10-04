<?php include("includes/header.php"); ?>

    <h1>The Simpsons</h1>
    
<?php
     $result = mysqli_query($con, "SELECT * from simpsons") or die(mysqli_error($con));
            
     while ($row = mysqli_fetch_array($result)){
        echo "<div class=\"\">";
        echo "<hr>";
        //  echo $row['sid'] . "<br>";
        $fname = $row['fname']; 
        $lname = $row['lname'];
        $descrip = nl2br($row['description']);
        echo "<h3>$fname $lname</h3>";
        echo "<br><p>$descrip</p>";
        echo "</div>";
     }
?>

<?php include("includes/footer.php"); ?>