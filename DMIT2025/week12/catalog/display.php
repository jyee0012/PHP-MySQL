<?php include("includes/admin-check.php"); ?>
<?php include("includes/header.php"); ?>
<?php include("includes/filter.php"); ?>
<?php
	//////////// pagination
	$getcount = mysqli_query ($con,"SELECT COUNT(*) FROM $database $sqlAddon");
	$postnum = mysqli_result($getcount,0);// this needs a fix for MySQLi upgrade; see custom function below
	$limit = 18;
	if($postnum > $limit){
		$tagend = round($postnum % $limit,0);
		$splits = round(($postnum - $tagend)/$limit,0);

		if($tagend == 0){
			$num_pages = $splits;
		}else{
			$num_pages = $splits + 1;
		}

		if(isset($_GET['pg'])){
			$pg = $_GET['pg'];
		}else{
			$pg = 1;
		}
		$startpos = ($pg*$limit)-$limit;
		$limstring = "LIMIT $startpos,$limit";
	}else{
		$limstring = "LIMIT 0,$limit";
	}

	$pgNum = trim($_GET['pg']);
    $pgNum = filter_var($pgNum, FILTER_SANITIZE_NUMBER_INT);

?>
<style>
	#myBtn {
		display: none; /* Hidden by default */
		position: fixed; /* Fixed/sticky position */
		bottom: 2rem; /* Place the button at the bottom of the page */
		right: 3rem; /* Place the button 30px from the right */
		z-index: 99; /* Make sure it does not overlap */
		border: none; /* Remove borders */
		outline: none; /* Remove outline */
		background-color: red; /* Set a background color */
		color: white; /* Text color */
		cursor: pointer; /* Add a mouse pointer on hover */
		padding: 1rem 2rem; /* Some padding */
		border-radius: 1rem; /* Rounded corners */
		font-size: 2rem; /* Increase font size */
	}

	#myBtn:hover {
		background-color: #555; /* Add a dark-grey background on hover */
	}
	.contacts{
		margin-left: 2rem;
	}
</style>
<div class="row">
	<div class="col-md-8">
		<h1>Anime - Catalog <?php if ($pgNum) echo "Page $pgNum";?></h1>
		<?php
			$sql = "SELECT * from $database $sqlAddon DESC $limstring";
			$result = mysqli_query($con, $sql) or die(mysqli_error($con));
		?>
			<div class="gallery">
			<?php while ($row = mysqli_fetch_array($result)): ?>
				<?php
					$displayTitle = $row['jye_series_name'];
					$displayDescrip = $row['jye_description'];
					$displayImg = $row['jye_series_image'];
					$animid = $row[$id];
				?>
				<!-- this is for quick and dirty layout; best to not use the well for your labs -->
				<a href="single.php?anim=<?php echo $animid; ?>">
					<div class="image">
						<div class="thumbs"> 
								<img class="center" src="imagefiles/thumbs/<?php echo $displayImg; ?>" alt="<?php echo $displayTitle; ?>" title="<?php echo $displayImg; ?>">
						</div>
						<div class="imgtitle">
							<h4><?php echo $displayTitle; ?></h4>
						</div>
					</div>
				</a>
				
			<?php endwhile; ?>
			</div>

			<!-- Good place for pagination links here -->
			<?php			
					///////////////// pagination links: perhaps put these BELOW where your results are echo'd out.
					if($postnum > $limit){
						echo "<ul class=\"pagination gallerypg\">";	
						// echo "<strong>Pages:</strong> &nbsp;&nbsp;&nbsp;";
						$n = $pg + 1;
						$p = $pg - 1;
						$thisroot = $_SERVER['PHP_SELF']; // use REQUEST_URI instead of PHP_SELF
						if ($finalQuery != "") $filterQuery = "&$finalQuery";
						if($pg > 1){
							echo "<li class=\"page-item\">";
							echo "<a class=\"page-link\" href=\"$thisroot?pg=$p$filterQuery\"><< prev</a>"; //&nbsp;&nbsp;
							echo "</li>";
						}
						for($i=1; $i<=$num_pages; $i++){
							echo "<li class=\"page-item\">";
							if($i!= $pg){
								echo "<a class=\"page-link\" href=\"$thisroot?pg=$i$filterQuery\">$i</a>"; //&nbsp;&nbsp;
							}else{
								echo "<a class=\"page-link\">$i</a>"; //&nbsp;&nbsp;
							}
							echo "</li>";
						}
						if($pg < $num_pages){
							echo "<li class=\"page-item\">";
							echo "<a class=\"page-link\" href=\"$thisroot?pg=$n$filterQuery\">next >></a>";
							echo "</li>";
						}
						// echo "&nbsp;&nbsp;";

						echo "</ul>";
					}
					////////////// end pagination
			?>
	</div>
	<div class="col-md-4">
		<div style="padding-top:60px"></div>
		<h3>Catalog Filter</h3>
		<form id="myform" name="myform" class="formwidth" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		
			<div class="form-group">
				<label for="rating">Rating:</label>
				<!-- <input type="text" class="form-control" id="rating" name="rating" value="<?php //if ($rating) echo $rating ?>"> -->
				<select name="rating" id="rating" class="form-control select-rate">
					<option value="" >Any Rating</option>
					<option value="g" <?php if ($rating == "g") echo "selected";?>>G - General Audiences</option>
					<option value="pg" <?php if ($rating == "pg") echo "selected";?>>PG - Parental Guidance Suggested</option>
					<option value="pg-13" <?php if ($rating == "pg-13") echo "selected";?>>PG-13 - Parents Strongly Cautioned</option>
					<option value="r" <?php if ($rating == "r") echo "selected";?>>R - Restricted</option>
					<option value="nc-17" <?php if ($rating == "nc-17") echo "selected";?>>NC-17 - Adults Only</option>
				</select>
				<?php if ($ratingValidate){echo "<div class=\"alert alert-warning\">" .$ratingValidate. "</div>"; } ?>
			</div>
			<div class="form-group">
				<label for="seriessrc">Series Source:</label>
				<!-- <input type="text" class="form-control" id="seriessrc" name="seriessrc" value="<?php //if ($seriesSrc) echo $seriesSrc ?>"> -->
				<select name="seriessrc" id="seriessrc" class="form-control select-src">
					<option value="" >Any Source</option>
					<option value="ln" <?php if ($seriesSrc == "ln") echo "selected";?>>Light Novel</option>
					<option value="manga" <?php if ($seriesSrc == "manga") echo "selected";?>>Manga</option>
					<option value="vn" <?php if ($seriesSrc == "vn") echo "selected";?>>Visual Novel</option>
					<option value="game" <?php if ($seriesSrc == "game") echo "selected";?>>Video Game</option>
					<option value="original" <?php if ($seriesSrc == "original") echo "selected";?>>Original</option>
					<option value="other" <?php if ($seriesSrc == "other") echo "selected";?>>Other</option>
				</select>
				<?php if ($seriesSrcValidate){echo "<div class=\"alert alert-warning\">" .$seriesSrcValidate. "</div>"; } ?>
			</div>
			<div class="form-group" style="padding-bottom: 140px;">
				<div class="col-md-5">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_action" id="genre_action" value="1" <?php if ($gAction) echo "checked"; ?>>
						<label class="form-check-label" for="genre_action">Action</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_adventure" id="genre_adventure" value="1" <?php if ($gAdven) echo "checked"; ?>>
						<label class="form-check-label" for="genre_adventure">Adventure</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_comedy" id="genre_comedy" value="1" <?php if ($gComedy) echo "checked"; ?>>
						<label class="form-check-label" for="genre_comedy">Comedy</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_fantasy" id="genre_fantasy" value="1" <?php if ($gFantasy) echo "checked"; ?>>
						<label class="form-check-label" for="genre_fantasy">Fantasy</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_game" id="genre_game" value="1" <?php if ($gGame) echo "checked"; ?>>
						<label class="form-check-label" for="genre_game">Game</label>
					</div>
				</div>
				
				<div class="col-md-5">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_magic" id="genre_magic" value="1" <?php if ($gMagic) echo "checked"; ?>>
						<label class="form-check-label" for="genre_magic">Magic</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_mystery" id="genre_mystery" value="1" <?php if ($gMystery) echo "checked"; ?>>
						<label class="form-check-label" for="genre_mystery">Mystery</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_school" id="genre_school" value="1" <?php if ($gSchool) echo "checked"; ?>>
						<label class="form-check-label" for="genre_school">School</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_sports" id="genre_sports" value="1" <?php if ($gSports) echo "checked"; ?>>
						<label class="form-check-label" for="genre_sports">Sports</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_super" id="genre_super" value="1" <?php if ($gSuper) echo "checked"; ?>>
						<label class="form-check-label" for="genre_super">Supernatural</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="filter">&nbsp;</label>
				<input type="submit" name="filter" class="btn btn-secondary" value="Filter">
			</div>
		</form>
		<h3>Default Filters</h3>
		<div class="base-filters">
			<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>">All Series</a>
			<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displayby=jye_airing&displayvalue=1">Currently Airing</a>
			<div class="btn-group-vertical">
				<h4>Series Length (Amount of Episodes)</h4>
				<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displaybyrange=jye_series_length&minrange=10&maxrange=14">Quarter Season (10-14)</a>
				<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displaybyrange=jye_series_length&minrange=20&maxrange=26">Half Season (20-26)</a>
				<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displaybyrange=jye_series_length&minrange=48&maxrange=56">Full Season (48-56)</a>
			</div>
			<div class="btn-group-vertical">
				<h4>Episode Length (Amount of Minutes)</h4>
				<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displaybyrange=jye_episode_length&minrange=10&maxrange=14">Short (10-14)</a>
				<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displaybyrange=jye_episode_length&minrange=20&maxrange=26">Regular (20-26)</a>
				<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displaybyrange=jye_episode_length&minrange=30&maxrange=60">Long (30-60)</a>
			</div>
			<div class="btn-group">
				<div class="btn-group-vertical">
					<h4>Series Source</h4>
					<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displayby=jye_series_source&displayvalue=ln">Light Novel</a>
					<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displayby=jye_series_source&displayvalue=manga">Manga</a>
				</div>
				<div class="btn-group-vertical">
					<h4>Ratings</h4>
					<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displayby=jye_rating&displayvalue=r">Restricted</a>
					<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displayby=jye_rating&displayvalue=pg-13">PG-13</a>
					<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displayby=jye_rating&displayvalue=g">General Audience</a>
				</div>
			</div>
		</div>
	</div>
    <!-- <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button> -->
</div>

<script>
        // When the user scrolls down 20px from the top of the document, show the button
        // window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
<?php include ("includes/footer.php"); ?>