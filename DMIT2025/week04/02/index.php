<?php
// on your own... retrieve and test input values then, detect is user has click the button..and echo to test

if (isset($_POST['submit'])){
	$name = trim($_POST['user']);
	$email = trim($_POST['email']);
    $msg = trim($_POST['msg']);
    $msg = filter_var($msg, FILTER_SANITIZE_STRING);
    $boolValidateOK = true; //user has succesfully filled out the form; when we test for this further down, if its still 1, we can go ahead and do whatever this form is meant to do. Any validation rule can veto this by setting it to 0.
    $stringValidate = "";
    
    if (strlen($name < 3) || strlen($name > 50)){
        $boolValidateOK = false;
        $nameValidate .= "<p>Please enter your name that is between 3 and 50 characters</p>";
    }

    if ($email != ""){
        $email = filter_var($email, FILTER_SANITIZE_EMAIL); // removes unwanted characters
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $boolValidateOK = false;
            $emailValidate .= "<p>Please enter in a CORRECT EMAIL format</p>";
        }
    }else{
        $emailValidate .= "<p>Please enter an email</p>";
    }
    if (strlen($msg < 5) || strlen($msg > 2000)){
        $boolValidateOK = false;
        $msgValidate .= "<p>Please enter a message that is between 5 to 2000 characters</p>";
    }

    if ($boolValidateOK){
        $stringValidate = "<h3>SUCCESS</h3>";
    }

    // echo "$name, $email, $msg";
} // if submit

?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Validation</title>
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
		    <label for="email">Email:</label>
		    <input type="email" class="form-control" id="email" name="email" value="<?php if ($email) echo $email ?>">
            <?php if ($emailValidate){echo "<div class=\"alert alert-warning\">" .$emailValidate. "</div>"; } ?>
          </div>
          
          <div class="form-group">
              <label for="msg">Message</label>
              <textarea class="form-control" name="msg" id="msg" cols="30" rows="3"><?php if ($msg) echo $msg ?></textarea>
            <?php if ($msgValidate){echo "<div class=\"alert alert-warning\">" .$msgValidate. "</div>"; } ?>
          </div>

		  <input type="submit" class="btn btn-default" name="submit">
            <?php if ($stringValidate){echo "<div class=\"alert alert-warning\">" .$stringValidate. "</div>"; } ?>
		</form>


	</div><!-- / .container -->

</body>
</html>