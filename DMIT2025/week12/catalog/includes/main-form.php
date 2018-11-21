
				<div class="form-group">
					<label for="seriesname">* Series Name:</label>
					<input type="text" class="form-control" id="seriesname" name="seriesname" value="<?php if ($seriesN) echo $seriesN ?>">
					<?php if ($seriesNValidate){echo "<div class=\"alert alert-warning\">" .$seriesNValidate. "</div>"; } ?>
				</div>
				<div class="form-group">
					<label for="altername">Alternate Name:</label>
					<input type="text" class="form-control" id="altername" name="altername" value="<?php if ($alterN) echo $alterN ?>">
					<?php if ($alterNValidate){echo "<div class=\"alert alert-warning\">" .$alterNValidate. "</div>"; } ?>
				</div>
				<div class="form-group">
					<label for="serieslength">Series Length:</label>
					<input type="text" class="form-control" id="serieslength" name="serieslength" value="<?php if ($seriesL) echo $seriesL ?>">
					<?php if ($seriesLValidate){echo "<div class=\"alert alert-warning\">" .$seriesLValidate. "</div>"; } ?>
				</div>
				<div class="form-group">
					<label for="episodelength">Episode Length:</label>
					<input type="text" class="form-control" id="episodelength" name="episodelength" placeholder="Number of minutes per episode" value="<?php if ($episodeL) echo $episodeL ?>">
					<?php if ($episodeLValidate){echo "<div class=\"alert alert-warning\">" .$episodeLValidate. "</div>"; } ?>
				</div>
				<div class="form-group">
					<label for="rating">Rating:</label>
					<!-- <input type="text" class="form-control" id="rating" name="rating" value="<?php //if ($rating) echo $rating ?>"> -->
					<select name="rating" id="rating" class="form-control select-rate">
						<option value="" selected disabled hidden>Please Select a Rating</option>
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
						<option value="" selected disabled hidden>Please Select a Series Source</option>
						<option value="ln" <?php if ($seriesSrc == "ln") echo "selected";?>>Light Novel</option>
						<option value="manga" <?php if ($seriesSrc == "manga") echo "selected";?>>Manga</option>
						<option value="vn" <?php if ($seriesSrc == "vn") echo "selected";?>>Visual Novel</option>
						<option value="game" <?php if ($seriesSrc == "game") echo "selected";?>>Video Game</option>
						<option value="original" <?php if ($seriesSrc == "original") echo "selected";?>>Original</option>
						<option value="other" <?php if ($seriesSrc == "other") echo "selected";?>>Other</option>
					</select>
					<?php if ($seriesSrcValidate){echo "<div class=\"alert alert-warning\">" .$seriesSrcValidate. "</div>"; } ?>
				</div>
				<div class="form-group">
					<label for="datasrc">Data Source:</label>
					<input type="text" class="form-control" id="datasrc" name="datasrc" placeholder="Source of info" value="<?php if ($dataSrc) echo $dataSrc ?>">
					<?php if ($dataSrcValidate){echo "<div class=\"alert alert-warning\">" .$dataSrcValidate. "</div>"; } ?>
				</div>

				<div class="form-check">
					<input type="checkbox" class="form-check=input" id="airing" name="airing" value="1" <?php if ($airing) echo "checked"; ?>>
					<label for="airing" class="form-check-label">Currently Airing</label>
					<?php if ($airingValidate){echo "<div class=\"alert alert-warning\">" .$airingValidate. "</div>"; } ?>
				</div>

				<div class="form-group">
					<label for="descrip">Description:</label>
					<textarea name="descrip" id="descrip" class="form-control textarea-height" placeholder="Synopsis"><?php if ($descrip) echo $descrip ?></textarea>
					<?php if ($descripValidate){echo "<div class=\"alert alert-warning\">" .$descripValidate. "</div>"; } ?>
				</div>
				<div class="form-group" style="padding-bottom: 140px;">
				<div class="col-md-4">
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
				
				<div class="col-md-4">
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
					<label for="imgfile">Thumbnail Image:</label>
					<input class="" type="file" name="imgfile">
						
					<?php if ($fileValidate){echo "<div class=\"alert alert-warning\">" .$fileValidate. "</div>"; } ?>
				</div>