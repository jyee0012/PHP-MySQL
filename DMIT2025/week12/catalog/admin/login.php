<?php include("../includes/mysql_connect.php"); ?>
<?php
// echo phpversion();
if (isset($_COOKIE['lastLogin'])){
	$lastLogin = $_COOKIE['lastLogin'];
}
if (isset($_POST['login'])){
	$user = trim($_POST['user']);
    $pass = trim($_POST['pwd']);
	
	$user = filter_var($user, FILTER_SANITIZE_STRING);
	$pass = filter_var($pass, FILTER_SANITIZE_STRING);

	setcookie("lastLogin", $user);
	if (($user == "jum") && ($pass == "thing")){
		// SUCCESS
		$backupUrl = BASE_URL . "index.php";		
		
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		$_SESSION['squeezwatgoodbyeotterpopspicyboyfriendshawnwasabithingfeaturinghollisraychaeljayandvocaloidnottomentionomfg'] = session_id();
		if ($_SESSION['ref']){
			$currentRef = BASE_URL . $_SESSION['ref'];	
			//echo $currentRef;		
			try{
				header("Location:$currentRef");
			}catch(Exception $e){
				header("Location:$backupUrl");
			}
		}else{
			header("Location:$backupUrl");
		}
	}else if($user == "" || $pass == ""){
		$errorMsg = "Please fill in your information to login";
	}else{
		// FAILURE
		$errorMsg = "Incorrect Login";
		$lastLogin = "";
	}
} // if submit

?>
<?php include("../includes/header.php"); ?>

<div class="container">
<div class="login-form">
<h1>Login</h1>

<form name="myform" class="formstyle" method="post" action="login.php">
    
  <div class="form-group">
    <label for="user">Username:</label>
    <input type="text" class="form-control" id="user" name="user" value="<?php if ($lastLogin) echo $lastLogin; ?>">
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd">
  </div>

  <input type="submit" class="btn btn-info" name="login" value="Login">
<?php if ($errorMsg) {echo "<div class=\"alert alert-warning\">" . $errorMsg . "</div>"; } ?>

</form>
</div>

</div><!-- / .container -->

<?php include("../includes/footer.php"); ?>