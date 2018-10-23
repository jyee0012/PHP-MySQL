<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>
<?php include("../includes/header.php"); ?>

<?php
	if (isset($_POST['insert'])){
		$btitle = trim($_POST['title']);
		$msg = trim($_POST['msg']);

        $btitle = filter_var($btitle, FILTER_SANITIZE_STRING);
        $msg = filter_var($msg, FILTER_SANITIZE_STRING);
		$boolValidateOK = true;
		$stringValidate = "";
		$alertString = "success";
		

		if ((strlen($btitle) < 2 && strlen($btitle) > 50) || $btitle == ""){
            $boolValidateOK = false;
            $btitleValidate .= "<p>Please enter a title between 2 and 50 characters</p>";
		}
		if (strlen($msg) < 10 && strlen($msg) > 1000){
            $boolValidateOK = false;
            $msgValidate .= "<p>Please enter a message between 10 and 1000 characters</p>";
		}
		

		if ($boolValidateOK){
			
            $sql = "INSERT INTO $database 
			(jye_title, jye_message) VALUES 
			('$btitle', '$msg')";

            mysqli_query($con, $sql) or die(mysqli_error($con));
			$stringValidate = "<p>Thank you for posting \"$btitle\" into the Blog</p>";

			$btitle = "";
			$msg = "";
			
		}else{
			$alertString = "danger";
			$stringValidate = "<p>Please fill in the information below</p>";
		}
	}

?>

<h2>Insert</h2>
<form id="myform" name="myform" class="formwidth" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<?php if ($stringValidate){echo "<div class=\"alert alert-$alertString\">" .$stringValidate. "</div>"; } ?>
		<div class="form-group">
			<label for="title">* Title:</label>
			<input type="text" class="form-control" id="title" name="title" value="<?php if ($btitle) echo $btitle ?>">
			<?php if ($btitleValidate){echo "<div class=\"alert alert-warning\">" .$btitleValidate. "</div>"; } ?>
		</div>

		<div class="form-group">
			<label for="msg">Message:</label>
			<textarea name="msg" id="myMsg" class="form-control textarea-height"><?php if ($msg) echo $msg ?></textarea>
			<?php if ($msgValidate){echo "<div class=\"alert alert-warning\">" .$msgValidate. "</div>"; } ?>
		</div>
				
		<!-- Emoticon Editor -->
		<div class="form-group">
			<?php massEmoticonPlacer(); ?>
			<!-- <a href="javascript:emoticon(':)')"><img src="../emoticons/icon_smile.gif"></a> -->
		</div>
		<!-- <div class="form-group">
			<label for="date">Date:</label>
			<input type="date" name="date" class="form-control">
		</div> -->
		
		<div class="form-group">
			<label for="insert">&nbsp;</label>
			<input type="submit" name="insert" class="btn btn-info" value="Post">
		</div>



</form>


<?php
	include("../includes/footer.php");
?>