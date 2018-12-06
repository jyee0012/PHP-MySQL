
		<div style="padding-top:60px"></div>
		<h3>Catalog Filter</h3>
		<form id="myform" name="myform" class="formwidth" action="<?php echo htmlspecialchars($thisroot); ?>" method="post">
		
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
			<?php //$baseroot = $_SERVER['PHP_SELF']; ?>
			<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>">All Series</a>
			<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displayby=jye_airing&displayvalue=1&searchquery=Currently%20Airing">Currently Airing</a>
			<div class="btn-group-vertical">
				<h4>Series Length (Amount of Episodes)</h4>
				<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displaybyrange=jye_series_length&minrange=10&maxrange=14&searchquery=Quarter%20Season">Quarter Season (10-14)</a>
				<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displaybyrange=jye_series_length&minrange=20&maxrange=26&searchquery=Half%20Season">Half Season (20-26)</a>
				<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displaybyrange=jye_series_length&minrange=48&maxrange=56&searchquery=Full%20Season">Full Season (48-56)</a>
			</div>
			<div class="btn-group-vertical">
				<h4>Episode Length (Amount of Minutes)</h4>
				<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displaybyrange=jye_episode_length&minrange=10&maxrange=14&searchquery=Short%20Episodes">Short (10-14)</a>
				<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displaybyrange=jye_episode_length&minrange=20&maxrange=30&searchquery=Regular%20Episodes">Regular (20-30)</a>
				<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displaybyrange=jye_episode_length&minrange=30&maxrange=60&searchquery=Long%20Episodes">Long (30-60)</a>
			</div>
			<div class="btn-group">
				<div class="btn-group-vertical">
					<h4>Series Source</h4>
					<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displayby=jye_series_source&displayvalue=ln&searchquery=Source:%20Light%20Novel">Light Novel</a>
					<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displayby=jye_series_source&displayvalue=manga&searchquery=Source:%20Manga">Manga</a>
				</div>
				<div class="btn-group-vertical">
					<h4>Ratings</h4>
					<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displayby=jye_rating&displayvalue=r&searchquery=Rated:%20R">Restricted</a>
					<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displayby=jye_rating&displayvalue=pg-13&searchquery=Rated:%20PG-13">PG-13</a>
					<a class="btn btn-primary filterbtn" href="<?php echo $thisroot; ?>?displayby=jye_rating&displayvalue=g&searchquery=Rated:%20G">General Audience</a>
				</div>
			</div>
		</div>