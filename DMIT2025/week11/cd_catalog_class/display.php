<!DOCTYPE html>

<html>
<head>
<title>CD Collection</title>
<style type="text/css">
body {
	font-family: verdana, arial;
	font-size: 90%;
}
.thisCD {
	border: 1px solid #999;
	padding: 10px;
	margin-top:10px;
	/*
	height: 150px;*/
	width: 400px;
	
}
.displayCategory {

	font-weight: bold;
	color: #009;
}
.displayInfo{

	font-weight: normal;
	color: #900;
}
.cdImage {
	float: right;
}
.displayDescription {
	font-size: 85%;
	padding: 7px;
}
.clearFix {
	clear: both;
}
#main{
	width: 500px;
	float:left;
}
#rightcol{
	float:left;
	top: 0px;
	border: 1px solid #900;	
	width: 400px;
	padding: 7px;
}
</style>

</head>
<body>

<div id="main">

<?php

require("mysql_connect.php");


// DEFAULT QUERY: RETRIEVE EVERYTHING
$sql = "SELECT * FROM cd_catalog_class";
$result = mysqli_query($con,$sql) or die (mysql_error());

// FILTERING YOUR DB
$displayby = $_GET['displayby'];
$displayvalue = $_GET['displayvalue'];

$justrandom = $_GET['justrandom'];
$israndom = $_GET['israndom'];
$orderby = $_GET['orderby'];
$displayonlyby = $_GET['displayonlyby'];
$displayonly = $_GET['displayonly'];
$displaybyrange = $_GET['displaybyrange'];
$minrange = $_GET['minrange'];
$maxrange = $_GET['maxrange'];
$searchlimit = $_GET['searchlimit'];


if(isset($displayby) && isset($displayvalue)) {
	// HERE IS THE MAGIC: WE TELL OUR DB WHICH COLUMN TO LOOK IN, AND THEN WHICH VALUE FROM THAT COLUMN WE'RE LOOKING FOR
	$sql = "SELECT * FROM cd_catalog_class WHERE $displayby LIKE '$displayvalue' ";
	if ($israndom){
		$sql = "SELECT * FROM cd_catalog_class WHERE $displayby LIKE '$displayvalue' ORDER BY RAND()";
	}
}

if($displaybyrange && $minrange && $maxrange){
	$sql = "SELECT * FROM cd_catalog_class WHERE $displaybyrange BETWEEN '$minrange' AND '$maxrange'";
}

if($displayonlyby && $displayonly){
	$sql = "SELECT * FROM cd_catalog_class WHERE $displayonlyby = '$displayonly'";
}
if ($justrandom){
	$sql = "SELECT * FROM cd_catalog_class ORDER BY RAND()";
}
if (isset($orderby)) {
	$sql = "SELECT * FROM cd_catalog_class ORDER BY $orderby";
}
if ($searchlimit){
	$sql .= " LIMIT $searchlimit";
}

$result = mysqli_query($con,$sql) or die (mysql_error());
/************************** ECHO OUT YOUR RESULTS ***********************/
while ($row = mysqli_fetch_array($result)) {
	$cd_id = ($row['cd_id']);
	$artist = ($row['artist']);
	$title = ($row['title']);
	$year = ($row['year']);
	$genre = ($row['genre']);
	$label = ($row['label']);
	$artwork = $row['artwork'];
	$description = nl2br($row['description']);
	echo "<div class=\"thisCD\">\n";

	echo "<img src=\"artwork/thumbs100/$artwork\" class=\"cdImage\" />";

	echo "<span class=\"displayCategory\">Title:</span> <span class=\"displayInfo\">". $title ."</span><br />\n";
	echo "<span class=\"displayCategory\">Artist:</span> <span class=\"displayInfo\">". $artist ."</span><br />\n";
	echo "<span class=\"displayCategory\">Year:</span> <span class=\"displayInfo\">". $year ."</span><br />\n";
	echo "<span class=\"displayCategory\">Label:</span> <span class=\"displayInfo\">". $label ."</span><br />\n";
	
	
	// CREATE A "detail.php" PAGE FOR A SINGLE ITEM VIEW; SHOW ALL INFO FOR THIS CD
	echo "<a href=\"detail.php?cd_id=$cd_id\">More info...</a><br />";
	
echo "<div class=\"clearFix\"></div>\n";
echo "\n</div>\n";
}




?>
</div>
<div id="rightcol">
<h2>SideBar</h2>

<a href="display.php">ALL CD's</a><br />
<h3>Genres</h3>
<a href="display.php?displayby=genre&displayvalue=Blues">Blues</a><br />
<a href="display.php?displayby=genre&displayvalue=Rock">Rock</a><br />
<a href="display.php?displayby=genre&displayvalue=World">World</a><br />
<a href="display.php?displayby=genre&displayvalue=Pop">Pop</a><br />
<a href="display.php?displayby=genre&displayvalue=Jazz">Jazz</a><br />
<h3>Years</h3>
<a href="display.php?displayby=year&displayvalue=199%">90's Music</a><br />
<a href="display.php?displaybyrange=year&minrange=1000&maxrange=1979">Pre 80's Music</a><br />
<h3>Labels</h3>
<a href="display.php?displayby=label&displayvalue=%Epic%">All Epic Labels</a><br />
<a href="display.php?displayby=label&displayvalue=Atlantic">Atlantic</a><br />
<h2>Widgets</h2>
<?php
echo "<h3>Random CD</h3>";
$randomCD = mysqli_query($con, "SELECT * FROM cd_catalog_class ORDER BY RAND() LIMIT 1");
while($row = mysqli_fetch_array($randomCD)){
    $title = $row['title'];
    $id = $row['cd_id'];
    $img = $row['artwork']; 
    echo "<a href=\"detail.php?cd_id=$id\"><img src=\"artwork/thumbs100/$img\"><br>$title</a>";
}
// Try storing all the labels into an array then only echo the array afterwards
$allLabels = array();
echo "<h3>Alphabetical List</h3>";
$qry = "SELECT *, LEFT(label, 1) AS first_char FROM cd_catalog_class 
        WHERE UPPER(label) BETWEEN 'A' AND 'Z'
        ORDER BY label";
$result = mysqli_query($con,$qry);
$current_char = '';
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['first_char'] != $current_char) {
        $current_char = $row['first_char'];
        echo '<br /><b>' . strtoupper($current_char) . '</b><br />';
    }
    //echo $row['breed'] . '<br />';
	$title = $row['label'];
	if (in_array($title, $allLabels)){
		array_push($allLabels, $title);
	}
	echo "<a href=\"display.php?displayby=label&displayvalue=$title\">$title Labels</a><br />";
}
// for($i = 0; i< sizeof($allLabels); i++){
// 	echo $allLabels[i];
// }
?>
 <!--
TASK: Here, create several links for the following:
 - 3 more genre links
 - One year that is represented by several CD's in the collection
 - One link to a certain record label that is represented by several CD's in the collection
 - Links to each decade (1950's - 2000's): How to do a decade? Think of how to do a single year...but then think of a wildcard (%).
-->

<?php
/*****************************
Challenge: 
 - Try creating a couple "widgets": These are items that are generated by a MySQL query when the page loads.
 		- random CD
		- random from a certain genre
		- alphabetical list OR dynamically generated A | B | C | D links
		
 - Mastery Challenge: Create a dynamic menu of Record Labels. Using a MSQL SELECT query with a GROUP BY operator , write record label links that then show those CD's belonging to a certain label in your filtered results.
	- If the "A & M" records value causes a hissy-fit with your project, try using "urlencode()" on your values.
	- Research any terms I'm using here to understand them better and try to figure out how to create a dynamic menu (created by the items in your DB) that can then link to those labels in your filtered results.

 
****************************/




?>



</div>

</body>
</html>

