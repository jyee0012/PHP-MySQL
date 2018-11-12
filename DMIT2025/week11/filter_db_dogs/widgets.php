

<?php
// all these will be completed in class


///////////////////////////////////////// RANDOM
// echo "<a href=\"index.php?justrandom=1\">";
echo "<h3>Random Dogs</h3>";
$randomDog = mysqli_query($con, "SELECT * FROM dogs ORDER BY RAND() LIMIT 1");
while($row = mysqli_fetch_array($randomDog)){
    $breed = $row['breed'];
    $pooch_id = $row['pooch_id'];
    $poochimg = $row['image_file']; 
    echo "<a href=\"breed.php?pooch_id=$pooch_id\"><img src=\"images/thumbs100/$poochimg\"><br>$breed</a>";
}
// echo "</a>";

// echo "<a href=\"index.php?israndom=1&displayby=size&displayvalue=large\">";
echo "<h3>Random Dogs from a certain Category (Large Dogs)</h3>";

$randomDog = mysqli_query($con, "SELECT * FROM dogs WHERE size LIKE 'large' ORDER BY RAND() LIMIT 1");
while($row = mysqli_fetch_array($randomDog)){
    $breed = $row['breed'];
    $pooch_id = $row['pooch_id'];
    $poochimg = $row['image_file']; 
    echo "<a href=\"breed.php?pooch_id=$pooch_id\"><img src=\"images/thumbs100/$poochimg\"><br>$breed</a>";
}
// echo "</a>";
///////////////////////////////////////

///////////////////////////////////////// POPULAR DOGS
echo "<h3>Popular Dogs</h3>";
//// there must  an UPDATE query in index.php that sets this column value, and we just ORDER BY popularity DESC here to get most popular views
$topDog = mysqli_query($con, "SELECT * FROM dogs ORDER BY popularity DESC LIMIT 2");
while($row = mysqli_fetch_array($topDog)){
    $breed = $row['breed'];
    $pooch_id = $row['pooch_id'];
    $poochimg = $row['image_file']; 
    $img = "<img src=\"images/thumbs100/$poochimg\"><br>";
    echo "<a href=\"breed.php?pooch_id=$pooch_id\">$img $breed</a>";
}
///////////////////////////////////////

//////////////////////////////////////// ALPHABETICAL LIST WITH HEADINGS
// from http://www.webhostingtalk.com/showthread.php?t=717692
// user "bigfan"

echo "<a href=\"index.php?orderby=breed\">";
echo "<h3>Alphabetical List</h3>";
echo "</a>";

/*Mysql Left Function is used to return the leftmost string character from the string.
Column Alias: 
http://www.geeksengine.com/database/basic-select/column-alias.php

*/

///////////////////////////////////////////

////////////////////////////////////////// ALPHABETICAL A - Z LINKS
echo "<h3>Alphabetical A - Z Links only</h3>";



?>

