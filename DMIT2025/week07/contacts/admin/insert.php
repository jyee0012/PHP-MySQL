<?php
	include("../includes/header.php");
?>
<h2>Insert</h2>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
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
			<input type="checkbox" name="sendletters" id="sendletters">Send Letters?
			</label>
		</div>
		
		<div class="form-group">
			<label for="submit">&nbsp;</label>
			<input type="submit" name="submit" class="btn btn-info" value="Submit">
		</div>



</form>
<?php
	include("../includes/footer.php");
?>