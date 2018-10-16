<?php include("../includes/header.php"); ?>

<?php
if (isset($_POST['login'])){
	$user = trim($_POST['user']);
    $pass = trim($_POST['pwd']);
	
	if (($user == "jum") && ($pass == "thing")){
		// SUCCESS
		session_start();
		$_SESSION['squeezwatgoodbyeotterpopspicyboyfriendshawnwasabithingfeaturinghollisraychaeljayandvocaloidnottomentionomfg'] = session_id();
		if ($_SESSION['ref']){
			$currentRef = $_SESSION['ref'];
			header("Location:$currentRef");
		}else{
			header("Location:insert.php");
		}
	}else if($user == "" || $pass == ""){
		$errorMsg = "Please fill in your information to login";
	}else{
		// FAILURE
		$errorMsg = "Incorrect Login";
	}
} // if submit

?>
<div class="container">

<h1>Login</h1>

<form name="myform" class="formstyle" method="post" action="login.php">
    
  <div class="form-group">
    <label for="user">Username:</label>
    <input type="text" class="form-control" id="user" name="user">
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd">
  </div>

  <input type="submit" class="btn btn-info" name="login" value="Login">
<?php if ($errorMsg) {echo "<div class=\"alert alert-warning\">" . $errorMsg . "</div>"; } ?>

</form>


</div><!-- / .container -->

<?php include("../includes/footer.php"); ?>