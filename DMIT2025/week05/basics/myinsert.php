<?php
// on your own... retrieve and test input values then, detect is user has click the button..and echo to test
$thisDept = $_GET['dept'];

if (isset($_POST['submit'])){
    $con=mysqli_connect("localhost","jyee12","dgsAAh8X2jl1dO7","jyee12_dmit2025");
    // Check connection
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	$name = trim($_POST['user']);
	$address = trim($_POST['address']);
    $occ = trim($_POST['occ']);
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $address = filter_var($address, FILTER_SANITIZE_STRING);
    $occ = filter_var($occ, FILTER_SANITIZE_STRING);
    $boolValidateOK = true; //user has succesfully filled out the form; when we test for this further down, if its still 1, we can go ahead and do whatever this form is meant to do. Any validation rule can veto this by setting it to 0.
    $stringValidate = "";
    // $ip = $_SERVER['REMOTE_ADDR'];

    if ($name != "" && $address != "" && $occ != "")
    {
        // CREATE: aka. insert
        mysqli_query($con, "INSERT INTO basics (the_name, address, occupation) VALUES ('$name', '$address', '$occ')") or die(mysqli_error($con));
        $stringValidate = "<p>Thank you for inserting data</p>";

    }else{
        $boolValidateOK = false;
        $stringValidate = "<p>Please fill in all information</p>";
    }


} // if submit

?>
<!DOCTYPE html>
<html>
<head>
	<title>Email Department</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- These must be in place to use Bootstrap ! -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
		.formstyle{ /* optional: in case you don't like the really wide form */
			max-width:450px;
		}
	</style>
</head>
<body>
	<div class="container">

		<h1>Form Validation</h1>
		<?php if ($errorMsg && $useErr) echo "<h2 class=\"red\">$errorMsg</h2>"; ?>


		<form name="myform" class="formstyle" method="post" action="#">
			
		<!-- you can copy/paste one of these form-groups, then change the form element and label within -->
		  <div class="form-group">
		    <label for="user">Name:</label>
		    <input type="text" class="form-control" id="user" name="user" value="<?php if ($name) echo $name ?>">
            <?php if ($nameValidate){echo "<div class=\"alert alert-warning\">" .$nameValidate. "</div>"; } ?>
		  </div>
		 <!-- / form-group -->

		  <div class="form-group">
		    <label for="address">Address:</label>
		    <input type="text" class="form-control" id="address" name="address" value="<?php if ($address) echo $address ?>">
            <?php if ($addressValidate){echo "<div class=\"alert alert-warning\">" .$addressValidate. "</div>"; } ?>
          </div>
          
		  <div class="form-group">
		    <label for="occ">Occupation:</label>
		    <input type="text" class="form-control" id="occ" name="occ" value="<?php if ($address) echo $address ?>">
            <?php if ($occValidate){echo "<div class=\"alert alert-warning\">" .$occValidate. "</div>"; } ?>
          </div>
          

		  <input type="submit" class="btn btn-default" name="submit" value="Insert">
            <?php if ($stringValidate){echo "<div class=\"alert alert-warning\">" .$stringValidate. "</div>"; } ?>
		</form>


	</div><!-- / .container -->

</body>
</html>