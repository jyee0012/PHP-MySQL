<?php
// on your own... retrieve and test input values then, detect is user has click the button..and echo to test

if (isset($_POST['submit'])){
	$name = trim($_POST['user']);
	$email = trim($_POST['email']);
    $msg = trim($_POST['msg']);
    $boolValidateOK = true; //user has succesfully filled out the form; when we test for this further down, if its still 1, we can go ahead and do whatever this form is meant to do. Any validation rule can veto this by setting it to 0.
    $stringValidate = "";
    if (strlen($name < 3)){
        $boolValidateOK = false;
        $stringValidate = "Please enter your name";
    }
    if ($boolValidateOK){
        $stringValidate = "SUCCESS";
    }

    if ($name == "" || $email == ""){
        $errorMsg = "Please fill in your information";
    }else{
        if (strlen($name) < 2){
            $errorMsg = "Please enter an actual name";
        }
        if ($email != ""){
            $email = filter_var($email, FILTER_SANITIZE_EMAIL); // removes unwanted characters
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errorMsg = "Please fill in CORRECT EMAIL format";
                exit();
            }
        }
    }

    // echo "$name, $email, $msg";
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
		<?php if ($errorMsg && $useErr) echo "<h2 class=\"red\">$errorMsg</h2>"; ?>


		<form name="myform" class="formstyle" method="post" action="#">
			
		<!-- you can copy/paste one of these form-groups, then change the form element and label within -->
		  <div class="form-group">
		    <label for="user">Name:</label>
		    <input type="text" class="form-control" id="user" name="user">
		  </div>
		 <!-- / form-group -->

		  <div class="form-group">
		    <label for="email">Email:</label>
		    <input type="email" class="form-control" id="email" name="email">
          </div>
          
          <div class="form-group">
              <label for="msg">Message</label>
              <textarea class="form-control" name="msg" id="msg" cols="30" rows="3"></textarea>
          </div>

		  <input type="submit" class="btn btn-default" name="submit">
            <?php
            if ($strValidationMsg){
                echo "<h3 class=\"alert alert-warning\">" .$strValidationMsg. "</h3>";
            }
            ?>
		</form>


	</div><!-- / .container -->

</body>
</html>