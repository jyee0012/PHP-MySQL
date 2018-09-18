<?php
// on your own... retrieve form elements
session_start();
if (!isset($_SESSION['squeezwatgoodbyeotterpopspicyboyfriendshawnwasabithingfeaturinghollisraychaeljayandvocaloidnottomentionomfg'])){
    //echo "Logged in";
    header("Location:login.php");
}

if (isset($_POST['insert'])){
	$title = $_POST['title'];
	$entry = $_POST['entry'];
	//echo $title, $entry;

	$timedate = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
	//echo $timedate;
	$newEntry .= "\n<div class=\"newEntry\">";
		$newEntry .= "\n\t<div class=\"title\">" . $title . "</div>";
		$newEntry .= "\n\t<div class=\"timedate\">" . $timedate . "</div>";
		$newEntry .= "\n\t<div class=\"entry\">" . $entry . "</div>";
	$newEntry .= "\n</div>";
	//$newEntry = "Title: [" . $title . "] / Entry: [" . $entry . "] / Time: [" . $timedate . "]";
	
	// to get blog entries in reverse order (newest first), let's get all existing entries, memorize them, put the newest at the top, then rewrite the DB
	
    $handle = fopen("blogfile.txt", "r"); // open the file for reading
	if ($handle){
        while(!feof($handle)){
            $buffer = fgets($handle, 4096); // each line of your text file
            $existingText .= $buffer; // we use the append method to create a cumulative variable with the whole value of all the lines.

        }// \ while
        
    }
	$allEntries = $newEntry . $existingText;
	// overwite the DB
	$handle = fopen("blogfile.txt", "w");
	fwrite($handle, $allEntries); // write to file
	fclose($handle); // close the resource
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Blog Entry</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- These must be in place to use Bootstrap ! -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
		.formstyle{ /* optional: in case you don't like the really wide form */
			max-width:450px;
		}
		.red{
			color: red;
		}
		.ta{
			margin-top:3rem;
		}
	</style>
</head>
<body>
	<div class="container">

		<h1>Insert Blog Entry</h1>


		<form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			
		<!-- you can copy/paste one of these form-groups, then change the form element and label within -->
		  <div class="form-group">
		    <label for="title">Title:</label>
		    <input type="text" class="form-control" id="title" name="title">
		  </div>
		 <!-- / form-group -->

		  <div class="form-group ta">
		    <label for="entry">Entry:</label>
			<textarea class="form-control" name="entry" id="entry" cols="30" rows="10"></textarea>
		  </div>

		  <input type="submit" class="btn btn-default" name="insert">

		</form>


	</div><!-- / .container -->

</body>
</html>