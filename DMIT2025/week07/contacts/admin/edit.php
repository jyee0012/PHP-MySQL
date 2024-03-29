<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>
<?php include("../includes/header.php"); ?>

<?php
	echo "<script> let previousVal;</script>";
    $newContactId = trim($_GET['contactid']);
    $newContactId = filter_var($newContactId, FILTER_SANITIZE_NUMBER_INT);
    if ($newContactId != "")  {
        $newResult = mysqli_query($con, "SELECT * from $database WHERE cid = '$newContactId'") or die(mysqli_error($con));
        while ($fillContact = mysqli_fetch_array($newResult)){
			
			$bname = $fillContact['jye_bname'];
			$pname = $fillContact['jye_pname'];
			$email = $fillContact['jye_email'];
			$url = $fillContact['jye_url'];
			$phone = $fillContact['jye_phone'];
			$address = $fillContact['jye_address'];
			$city = $fillContact['jye_city'];
			$province = $fillContact['jye_province'];
			$descrip = $fillContact['jye_description'];
			$sendletters = $fillContact['jye_sendletters'];
        }
        echo "<script> previousVal = $newContactId;</script>";
    }
	if (isset($_POST['edit'])){
		$bname = trim($_POST['bname']);
		$pname = trim($_POST['pname']);
		$email = trim($_POST['email']);
		$url = trim($_POST['url']);
		$phone = trim($_POST['phone']);
		$address = trim($_POST['address']);
		$city = trim($_POST['city']);
		$province = $_POST['province'];
		$descrip = trim($_POST['descrip']);
		$sendletters = trim($_POST['sendletters']);
		$contactid = $_POST['contactid'];

        $bname = filter_var($bname, FILTER_SANITIZE_STRING);
        $pname = filter_var($pname, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $phone = filter_var($phone, FILTER_SANITIZE_STRING);
        $address = filter_var($address, FILTER_SANITIZE_STRING);
        $city = filter_var($city, FILTER_SANITIZE_STRING);
		$descrip = filter_var($descrip, FILTER_SANITIZE_STRING);
		$boolValidateOK = true;
		$stringValidate = "";
		$alertString = "success";
		
		if (!isset($contactid)){
			$boolValidateOK = false;
			$contactValidate .= "Please Select a Contact";
		}
		if (strlen($bname) > 250){
            $boolValidateOK = false;
            $bnameValidate .= "<p>Please enter the company name</p>";
		}
		
        if ($email != ""){
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$boolValidateOK = false;
                $emailValidate .= "<p>Please enter in a CORRECT EMAIL format</p>";
            }
        }else{
            $boolValidateOK = false;
			$emailValidate .= "<p>Please enter a email</p>";
		}

        if ($url != ""){
            if (!filter_var($url, FILTER_VALIDATE_URL)){
				$boolValidateOK = false;
                $urlValidate .= "<p>Please enter a VALID URL. <i>include \"https://\" beginning</i></p>";
            }
        }else{
            $boolValidateOK = false;
			$urlValidate .= "<p>Please enter a url</p>";
		}
		
		if (strlen($phone) < 2 || strlen($phone) > 50){
            $boolValidateOK = false;
            $phoneValidate .= "<p>Please enter a phone number</p>";
		}

		if ($boolValidateOK){
			
            $sql = "UPDATE $database SET 
			jye_bname = '$bname', 
			jye_pname = '$pname', 
			jye_email = '$email', 
			jye_url = '$url', 
			jye_phone = '$phone', 
			jye_address = '$address',
			jye_city = '$city',
			jye_province = '$province',
			jye_description = '$descrip',
			jye_sendletters = '$sendletters'
			WHERE cid = '$contactid'";

            mysqli_query($con, $sql) or die(mysqli_error($con));
			$stringValidate = "<p>Thank you for updating \"$bname's\" Info in the Contacts database</p>";
			
			// $bname = "";
			// $pname = "";
			// $email = "";
			// $url = "";
			// $phone = "";
			// $address = "";
			// $city = "";
			// $province = "";
			// $descrip = "";
			// $sendletters = "";
		}else{
			$alertString = "danger";
			$stringValidate = "<p>Please fill in the information below</p>";
		}
	}

?>

<h2>Edit</h2>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
		<?php if ($stringValidate){echo "<div class=\"alert alert-$alertString\">" .$stringValidate. "</div>"; } ?>

        <div class="form-group">
		    <label for="contactid">Contact List:</label>
            <select name="contactid" id="contactid" class="form-control select-contact">
                <option value="" selected disabled hidden >Please Select a Contact</option>
                <?php
                    $result = mysqli_query($con, "SELECT * from $database") or die(mysqli_error($con));
                    while ($row = mysqli_fetch_array($result)){
                        $displayName = $row['jye_bname']; 
                        $contactid = $row['cid'];
                        echo "<option value=\"$contactid\" "; 
                        if (isset($newContactId) && $newContactId == $contactid) echo "selected=\"selected\"";
                        echo ">$displayName</option>";
                    }
                ?>           
            </select>
			<?php if ($contactValidate){echo "<div class=\"alert alert-warning\">" .$contactValidate. "</div>"; } ?>
        </div>

		<div class="form-group">
			<label for="bname">* Business Name:</label>
			<input type="text" class="form-control" id="bname" name="bname" value="<?php if ($bname) echo $bname ?>">
			<?php if ($bnameValidate){echo "<div class=\"alert alert-warning\">" .$bnameValidate. "</div>"; } ?>
		</div>

		<div class="form-group">
			<label for="pname">Person Name:</label>
			<input type="text" class="form-control" id="pname" name="pname" value="<?php if ($pname) echo $pname ?>">
			<?php if ($pnameValidate){echo "<div class=\"alert alert-warning\">" .$pnameValidate. "</div>"; } ?>
		</div>

		<div class="form-group">
			<label for="email">* Email Address:</label>
			<input type="email" class="form-control" id="email" name="email" value="<?php if ($email) echo $email ?>">
			<?php if ($emailValidate){echo "<div class=\"alert alert-warning\">" .$emailValidate. "</div>"; } ?>
		</div>
		
		<div class="form-group">
			<label for="url">* Website URL:</label>
			<input type="text" class="form-control" id="url" name="url" value="<?php if ($url) echo $url ?>">
			<?php if ($urlValidate){echo "<div class=\"alert alert-warning\">" .$urlValidate. "</div>"; } ?>
		</div>

		<div class="form-group">
			<label for="phone">* Phone Number:</label>
			<input type="text" class="form-control" id="phone" name="phone" value="<?php if ($phone) echo $phone ?>">
			<?php if ($phoneValidate){echo "<div class=\"alert alert-warning\">" .$phoneValidate. "</div>"; } ?>
		</div>

		<div class="form-group">
			<label for="address">Address:</label>
			<input type="text" class="form-control" id="address" name="address" value="<?php if ($address) echo $address ?>">
			<?php if ($addressValidate){echo "<div class=\"alert alert-warning\">" .$addressValidate. "</div>"; } ?>
		</div>

		<div class="form-group">
			<label for="city">City:</label>
			<input type="text" class="form-control" id="city" name="city" value="<?php if ($city) echo $city ?>">
			<?php if ($cityValidate){echo "<div class=\"alert alert-warning\">" .$cityValidate. "</div>"; } ?>
		</div>

		<div>
			<label for="province">Province:</label>
			<select name="province" id="province" class="form-control">
				<option value="" selected disabled hidden >Please Select a Province</option>
				<option value="AB" <?php if ($province == "AB") echo "selected=\"selected\""; ?>>Alberta</option>
				<option value="MB" <?php if ($province == "MB") echo "selected=\"selected\""; ?>>Manitoba</option>
				<option value="ON" <?php if ($province == "ON") echo "selected=\"selected\""; ?>>Ontario</option>
				<option value="QC" <?php if ($province == "QC") echo "selected=\"selected\""; ?>>Quebec</option>
				<option value="BC" <?php if ($province == "BC") echo "selected=\"selected\""; ?>>British Columbia</option>
				<option value="SK" <?php if ($province == "SK") echo "selected=\"selected\""; ?>>Saskatchewan</option>
				<option value="NS" <?php if ($province == "NS") echo "selected=\"selected\""; ?>>Nova Scotia</option>
				<option value="NB" <?php if ($province == "NB") echo "selected=\"selected\""; ?>>New Brunswick</option>
				<option value="NL" <?php if ($province == "NL") echo "selected=\"selected\""; ?>>Newfoundland</option>
				<option value="PE" <?php if ($province == "PE") echo "selected=\"selected\""; ?> >Prince Edward Island</option>
				<option value="NT" <?php if ($province == "NT") echo "selected=\"selected\""; ?>>Northwest Territories</option>
				<option value="YT" <?php if ($province == "YT") echo "selected=\"selected\""; ?>>Yukon</option>
				<option value="NU" <?php if ($province == "NU") echo "selected=\"selected\""; ?>>Nanavut</option>
			</select>
		</div>

		<div class="form-group">
			<label for="descrip">Description:</label>
			<textarea name="descrip" id="descrip" class="form-control"><?php if ($descrip) echo $descrip ?></textarea>
			<?php if ($descripValidate){echo "<div class=\"alert alert-warning\">" .$descripValidate. "</div>"; } ?>
		</div>
		
		<div class="form-group">
			<label for="sendletters">
				<input type="checkbox" name="sendletters" id="sendletters" value="1" <?php if ($sendletters == "1") echo "checked"; ?>>Send Letters?
			</label>
		</div>
		
		<div class="form-group">
			<label for="edit">&nbsp;</label>
			<input type="submit" name="edit" class="btn btn-info" value="Update">
		    <a href="delete.php?contactid=<?php echo $contactid; ?>" class="btn btn-info deletebtn">Delete <i class="fas fa-trash-alt"></i></a>
		</div>



</form>
<script>
        document.querySelector('.deletebtn').addEventListener('click', (evt) => {
            <?php if ($newContactId != "") echo "let alertbool = confirm(\"Are you sure you wish to delete $bname?\");"; ?>
            if (!alertbool) evt.preventDefault();
        });
        document.querySelector('.select-contact').addEventListener('click', (evt) => {
            let options = document.querySelector('.select-contact');
            // console.log(options.value);
            if (options.value != "" && Number(options.value) != previousVal) {
                window.location.href = "edit.php?contactid=" + options.value;
            }
        });
</script>
<?php
	include("../includes/footer.php");
?>