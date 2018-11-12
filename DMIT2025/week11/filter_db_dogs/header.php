<?php
include("mysql_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Filtering a Database</title>
<style type="text/css">

body{
	font-family: verdana;
	font-size:90%;
	padding:20px;
	background-color: #ccc;
}
#container{
	width: 1160px;
	margin: auto;
	background-color: #fff;
	padding: 10px;
	
}
#links{
	width: 220px;
	margin:10px;
	padding: 7px;

	float:left;
	
}
#results{
	width: 600px;
	margin:10px;
	padding: 7px;
	
	float:left;
	
	
}
/**/
#widgets{
	width: 220px;
	margin:10px;
	padding: 7px;

	float:left;
	
}

#results a, #widgets a{
font-size: 11px;
}
h2{
	font-family: georgia;
	color: #444;
	font-size: 20px;	
}
h3{
	font-family: georgia;
	color: #900;
	font-size: 16px;	
}
.thumb{
	width: 122px;
	padding:5px;
	height: 104px;
	float:left;
	overflow:hidden;
	font-size: 11px;
	/* Sexy Thumbnails...but only if you think you are worthy 
	margin:8px;
	background-color: #fff;
	box-shadow: 0px 0px 2px #000;*/
}
.thumb img{
	/* border: 1px solid #000; */
}
.thumb a{
	text-decoration:none;
}
</style>
</head>

<body>
<div id="container">
<h1><a href="index.php">Filtering a Database</a></h1>


<div id="links">
	<h2>HTML Links with Query String</h2>
	<h3>Default: No filter</h3>
	<a href="index.php">ALL Dogs </a><br />

	<h3>Filter by a Column = Value</h3>
	
	<a href="index.php?displayby=size&displayvalue=small">Small Dogs </a><br />
	<a href="index.php?displayby=guard&displayvalue=1">Guard Dogs </a><br />
	<a href="index.php?displayby=children&displayvalue=yes">Good Children Dogs </a><br />
	<a href="index.php?displayby=lowshedding&displayvalue=yes">Lowshedding Dogs </a><br />
	
	<h3>Filter by an ID=Value, so 1 result Only</h3>
	
	<a href="index.php?displayonlyby=pooch_id&displayonly=1">First Dog </a><br />
	<a href="index.php?displayonlyby=pooch_id&displayonly=5">Fifth Dog </a><br />
	<a href="index.php?displayonlyby=pooch_id&displayonly=10">Tenth Dog </a><br />
	<a href="index.php?displayonlyby=intelligence&displayonly=10&searchlimit=1">Smartest Dog </a><br />

	<h3>Filter using BETWEEN: </h3>
	<p>This would be great for price ranges</p>
	<a href="index.php?displaybyrange=intelligence&minrange=1&maxrange=3">Dumb Dogs </a><br />
	<a href="index.php?displaybyrange=intelligence&minrange=4&maxrange=7">Average Dogs </a><br />
	<a href="index.php?displaybyrange=intelligence&minrange=8&maxrange=10">Smart Dogs </a><br />
	

</div>

