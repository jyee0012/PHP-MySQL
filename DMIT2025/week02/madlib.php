<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Form Example</title>
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

		<h1>Bootstrap Form Example</h1>

		<form name="myform" class="formstyle" method="post" action="madlib.php">

		<!-- you can copy/paste one of these form-groups, then change the form element and label within -->
		  <div class="form-group">
		    <label for="fname">First Name:</label>
		    <input type="text" class="form-control" id="fname" name="fname">
		  </div>
		 <!-- / form-group -->

		 <div class="form-group">
			<label for="lname">Last Name:</label>
			<input type="text" class="form-control" id="lname" name="lname">
		</div>
			
		  <div class="form-group">
				<label for="color">Favorite Color:</label>
				<select class="form-control" id="color" name="color">
					<option>blue</option>
					<option>red</option>
					<option>aquamarine</option>
					<option>teal</option>
					<option>pink</option>
					<option>black</option>
					<option>white</option>
				</select>
			</div>

			<div class="form-group">
				<label for="garment">Garment:</label>
				<select class="form-control" id="garment" name="garment">
					<option>thong monokini</option>
					<option>Gap Spring catalog vest</option>
					<option>pair of Value Village special plaid pants</option>
					<option>pair of fisherman's wader</option>
					<option>ragged hipster sweater</option>
					<option>pair of Euro-style Speedo's</option>
				</select>
			</div>

		  <div class="form-group">
				<label for="gender">Gender:</label>
		    <div class="radio">
					<label><input type="radio" name="gender" value="male">Male</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="gender" value="female">Female</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="gender" value="other">Other</label>
				</div>
		  </div>

		  <input type="submit" class="btn btn-default" name="mysubmit">

		</form>

		<?php
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$color = $_POST["color"];
			$garment = $_POST["garment"];
			$gender = $_POST["gender"];
			echo "$fname, $lname, $color, $garment, $gender";

			if ($gender == "male")
			{
				$pref = "girl";
			}
			else
			{
				$pref = "boy";
			}

			if (isset($_POST['mysubmit']))
			{
				//echo "submit";
				$story = "Once upon a time, there was a $gender name $fname $lname. One fine day, $fname was out and about wearing a $color $garment and looking for something to do.";
				
				$story .= "Then, $fname saw a cute $pref walk by. \"Hey Cutie\" said $fname. <br>";
				$story .= "The $pref looked in the direction of $fname, and fell down laughing. \"What are you doing wearing that ridiculous $color $garment\" said the $pref. <br>";

				// on your own, finish the story......
				echo "<p>";
				echo $story;
				echo "</p>";
			}
			
		?>

	</div><!-- / .container -->

</body>
</html>