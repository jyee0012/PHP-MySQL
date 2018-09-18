<?php
// on your own... retrieve form elements

if (isset($_POST['login'])){
	$user = trim($_POST['user']);
	$pass = trim($_POST['pwd']);
	//echo "Hello, " . $user . " " . $pass . ". I see you have submitted";
	
	if (($user == "jum") && ($pass == "thing")){
		// SUCCESS
		session_start();
		$_SESSION['squeezwatgoodbyeotterpopspicyboyfriendshawnwasabithingfeaturinghollisraychaeljayandvocaloidnottomentionomfg'] = session_id();
		header("Location:insert.php");
	}else if($user == "" || $pass == ""){
		$errorMsg = "Please fill in your information to login";
	}else{
		// FAILURE
		$errorMsg = "Incorrect Login";
	}
} // if submit

?>
<!DOCTYPE html>
<html>
<head>
	<title>Secured Login</title>
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
	</style>
</head>
<body>
	<div class="container">

		<h1>Login</h1>
		<?php if ($errorMsg) echo "<h2 class=\"red\">$errorMsg</h2>"; ?>


		<form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			
		<!-- you can copy/paste one of these form-groups, then change the form element and label within -->
		  <div class="form-group">
		    <label for="user">Username:</label>
		    <input type="text" class="form-control" id="user" name="user">
		  </div>
		 <!-- / form-group -->

		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="password" class="form-control" id="pwd" name="pwd">
		  </div>

		  <input type="submit" class="btn btn-default" name="login">

		</form>


	</div><!-- / .container -->

</body>
</html>