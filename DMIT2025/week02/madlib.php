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
					<option>plain hoodie</option>
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
				<!-- <div class="radio">
					<label><input type="radio" name="gender" value="other">Other</label>
				</div> -->
		  </div>

		  <div class="form-group">
				<label for="personality">Personality:</label>
		    <div class="radio">
					<label><input type="radio" name="personality" value="polite">Polite</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="personality" value="rude">Rude</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="personality" value="shy">Shy</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="personality" value="kind">Kind</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="personality" value="sarcastic">Sarcastic</label>
				</div>
				<!-- <div class="radio">
					<label><input type="radio" name="gender" value="other">Other</label>
				</div> -->
		  </div>

			<div class="form-group">
				<label for="end">Ending:</label>
				<select class="form-control" id="end" name="end">
					<option>happy</option>
					<option>sad</option>
					<option>bad</option>
					<option>.....</option>
				</select>
			</div>

			
			<div class="form-group">
			<label for="hobby">Your Hobby:</label>
			<input type="text" class="form-control" id="hobby" name="hobby">
		</div>

		  <input type="submit" class="btn btn-default" name="mysubmit">

		</form>

		<?php
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$color = $_POST["color"];
			$garment = $_POST["garment"];
			$gender = $_POST["gender"];
			$personality = $_POST["personality"];
			$end = $_POST["end"];
			$hobby = $_POST["hobby"];
			$bHaveInfo = ($fname != "" && $lname != "" && $gender != "");
			//echo "$fname, $lname, $color, $garment, $gender";
			//echo $end;
			if ($hobby == ""){
				$hobby = "write stories";
			}

			switch($gender){
				case "male":
				$pref = "girl";
				$gender = "boy";
				$playerG = "his";
				$genderO = "man";
				$playerS = "He";
				break;
				case "female":
				$pref = "boy";
				$gender = "girl";
				$playerG = "her";
				$genderO = "woman";
				$playerS = "She";
				break;
				default:
				$pref = "it";
				break;
			}

			switch($personality){
				case "polite":
				$response = "Thanks for noticing my $garment, and I agree it may be quite ridiculous.";
				break;
				case "shy":
				$response = "Umm......thanks.";
				break;
				case "rude":
				$response = "How dare you ridicule my $garment, it is one of my favorites!";
				break;
				case "kind":
				$response = "I was simply on my way, until I encounter such a beautiful $pref on my stroll.";
				break;
				case "sarcastic":
				$response = "Oh thank you, you are too kind to compliment me on my $garment.";
				break;
			}
			
			switch($end){
				case "happy":
				$ending = "The $pref decided to shakehands and exchange parting words before they split up. <br>";
				$ending .= "Then $fname, and the $pref lived happily ever after.";
				break;
				case "sad":
				$ending = "The $pref grabbed ahold of $fname's hand and whispers a dark secret into $playerG's ear. <br>";
				$ending .= "Then $fname cried $playerG heart out for the poor $pref.";
				break;
				case "bad":
				$ending = "The $pref then suddenly smacked $fname across the face and ran into the night. <br>";
				$ending .= "The $pref left $fname and never came back or spoke to $fname ever again.";
				break;
				case ".....":
				$ending = "Then all of a sudden $fname woke up.";
				$end = "a dream";
				break;
			}


			if (isset($_POST['mysubmit']))
			{
				//echo "submit";
				// story needs to have 8 variables and 12 sentences of content.
				// $fname, $lname, $color, $garment, $gender, $pref, $ending 
				$story = "Once upon a time, there was a $gender name $fname $lname. One fine day, $fname was out and about wearing a $color $garment and looking for something to do. <br>";
				
				$story .= "Then, $fname saw a cute $pref walk by. \"Hey Cutie\" said $fname. <br>";
				$story .= "The $pref looked in the direction of $fname, and fell down laughing. \"What are you doing wearing that ridiculous $color $garment\" said the $pref. <br>";
				$story .= $response . "<br>";
				$story .= "$fname and the $pref continued the conversation for hours until the sun went down. <br>";
				$story .= "While in the middle of the night, people could still hear catter happening. <br>";
				$story .= "It was $fname and the $pref who were still conversing at night. <br>";
				$story .= $ending . "<br>";
				$story .= "<br>";
				$story .= "There once was a $genderO, who likes to $hobby. <br>";
				$story .= "$playerS once wrote a story about $fname and a $pref. <br>";
				$story .= "Where they went a little adventure while $fname wore a $color $garment and $fname was a little bit $personality. <br>";
				$story .= "The ending of the story was $end. <br>";
				
				echo "<br>";
				echo "<p>";
				// on your own, finish the story......
				if ($bHaveInfo){
					echo $story;
				}else{
					echo "Please fill in all information above.";
				}
				echo "</p>";
			}
			
		?>

	</div><!-- / .container -->

</body>
</html>