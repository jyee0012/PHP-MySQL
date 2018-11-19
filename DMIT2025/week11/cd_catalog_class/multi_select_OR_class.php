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
#widgets{
	
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



$y1999 = $_GET['y1999'];
$y2000 = $_GET['y2000'];
$y2001 = $_GET['y2001'];
$y2002 = $_GET['y2002'];
$y2003 = $_GET['y2003'];
$y2004 = $_GET['y2004'];
$y2005 = $_GET['y2005'];

//echo "$y1999 | $y2000 | $y2001";

/*

Here we will create a new variable to be used as a filter (WHERE...)within our query below
Done in class.
*/
$queryAppend = array();
if ($y1999){
	array_push($queryAppend, "year like '1999'");
}
if ($y2000){
	array_push($queryAppend, "year like '2000'");
}
if ($y2001){
	array_push($queryAppend, "year like '2001'");
}
if ($y2002){
	array_push($queryAppend, "year like '2002'");
}
if ($y2003){
	array_push($queryAppend, "year like '2003'");
}
if ($y2004){
	array_push($queryAppend, "year like '2004'");
}
if ($y2005){
	array_push($queryAppend, "year like '2005'");
}
foreach($queryAppend as $k => $v){
	if($k == 0){ //if this is the first array item
		$queryFilter .= " WHERE " . $v;
	}else{
		$queryFilter .= " OR " . $v;
	}
}

$result = mysqli_query($con,"SELECT * FROM cd_catalog_class $queryFilter") or die (mysqli_error($con));
	
	


/************************** ECHO OUT YOUR RESULTS

*************************************************/
while ($row = mysqli_fetch_array($result)) {
// be careful that these vars do NOT overlap (have the same names) as the GET vars, as they will interfer with usinging them to prepop below.
	$cd_id = ($row['cd_id']);
	$thisArtist = ($row['artist']);
	$thisTitle = ($row['title']);
	$thisYear = ($row['year']);
	$thisGenre = ($row['genre']);
	$thisLabel = ($row['label']);
	$artwork = $row['artwork'];
	$thisDescription = nl2br($row['description']);
	echo "<div class=\"thisCD\">\n";
	if($displayby == "cd_id"){
		$artImage = "<img src=\"artwork/thumbs150/$artwork\" class=\"cdImage\" />";	
	}else{
	
		$artImage = "<img src=\"artwork/thumbs100/$artwork\" class=\"cdImage\" />";
	}
	echo $artImage;

	echo "<span class=\"displayCategory\">Title:</span> <span class=\"displayInfo\">". $thisTitle ."</span><br />\n";
echo "<span class=\"displayCategory\">Artist:</span> <span class=\"displayInfo\">". $thisArtist ."</span><br />\n";
echo "<span class=\"displayCategory\">Year:</span> <span class=\"displayInfo\">". $thisYear ."</span><br />\n";
echo "<span class=\"displayCategory\">Genre:</span> <span class=\"displayInfo\">". $thisGenre ."</span><br />\n";
echo "<span class=\"displayCategory\">Label:</span> <span class=\"displayInfo\">". $thisLabel ."</span><br />\n";
	

echo "<div class=\"clearFix\"></div>\n";
echo "\n</div>\n";
}

?>
</div>
<div id="widgets">
<h2>Multiple Filter</h2>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>">ALL</a>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
	Year:<br />
	1999: <input type="checkbox" name="y1999" value="1" <?php if($y1999 == "1"){echo "checked=\"checked\"";} ?> /><br />
	2000: <input type="checkbox" name="y2000" value="1" <?php if($y2000 == "1"){echo "checked=\"checked\"";} ?> /><br />
	2001: <input type="checkbox" name="y2001" value="1" <?php if($y2001 == "1"){echo "checked=\"checked\"";} ?> /><br />
	2002: <input type="checkbox" name="y2002" value="1" <?php if($y2002 == "1"){echo "checked=\"checked\"";} ?> /><br />
	2003: <input type="checkbox" name="y2003" value="1" <?php if($y2003 == "1"){echo "checked=\"checked\"";} ?> /><br />
	2004: <input type="checkbox" name="y2004" value="1" <?php if($y2004 == "1"){echo "checked=\"checked\"";} ?> /><br />
	2005: <input type="checkbox" name="y2005" value="1" <?php if($y2005 == "1"){echo "checked=\"checked\"";} ?> /><br />
	
	
	<input type="submit" name="submit" />
</form>


</div>

</body>
</html>

