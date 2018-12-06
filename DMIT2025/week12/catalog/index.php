<?php include("includes/admin-check.php"); ?>
<?php include("includes/header.php"); ?>
<style>
</style>
<div class="row">
	<div class="col-md-8">
		<h1>Anime - Main Page</h1>
        <p>
            This website is for the Catalog Project which is about creating a catalog a collection of items. The items will have to have similar information to compare by.
        </p>
        <p>
            For my Catalog assignment I have created an Anime Series Catalog that will store series with certain info that the user may search and filter by.
            Each item in my Anime Series catalog will have 2 potential names due to differing languages, Amount and Length of Episodes, whether it is currently airing or not 
            an Image to represent the series, what the story was based from, it's rating, a description or synopsis of the story, and where the information was retrieved from.
        </p>
        <p>
            You may filter the items by what it was rated and what the story was based from. I also have a list of genres that I have properly assigned to the items.
            You may also see the ones that are currently airing and those of certain amounts and lengths of episodes. 
        </p>
        <p>
            The list of genres consists of Action, Adventure, Comedy, Fantasy, Game, Magic, Mystery, School, Sports, and Supernatural.
            So far I have around 70 items that you may browse through.
        </p>
        <p>
            Some unique features that I feel like I have is the large amount of filters you may go through. The auto suggest search bar that is fully functional along with my items.
            Each single item view has buttons that allows the user to go through to the next and previous item ordered by update order.
        </p>
        <p>
            When inserting or updating, images are optional and you can modify the image by uploading a new image in the update. You will still be able to change other information without adding an image.
        </p>
        <p>
            I have some unique features that I have worked on and implemented through the duration of most of my projects. 
            One of them is that when you login, you will be sent back to the page you were on or where you intended to go.
        </p>
        <div class="random-items">
            <!-- <h3>Random Items from Categories</h3> -->
            <?php
                // echo "$sqlAddon";
		    ?>
			<div class="gallery">
                <?php
                    // Currently Airing
                    $sql = "SELECT * from $database WHERE jye_airing like '1' ORDER BY RAND() LIMIT 1;";
                    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                    renderListItem($result, "Currently Airing", "list.php?displayby=jye_airing&displayvalue=1&searchquery=Currently%20Airing");
                    // Genre: Action
                    $sql = "SELECT * from $database WHERE jye_genre_action like '1' ORDER BY RAND() LIMIT 1;";
                    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                    renderListItem($result, "Action Anime", "list.php?displayby=jye_genre_action&displayvalue=1&searchquery=Genre:%20Action");
                    // Quarter Season
                    $sql = "SELECT * from $database WHERE jye_series_length BETWEEN '10' AND '14' ORDER BY RAND() LIMIT 1;";
                    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                    renderListItem($result, "Quarter Season", "list.php?displaybyrange=jye_series_length&minrange=10&maxrange=14&searchquery=Quarter%20Season");
                    // Regular Episodes
                    $sql = "SELECT * from $database WHERE jye_episode_length BETWEEN '20' AND '30' ORDER BY RAND() LIMIT 1;";
                    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                    renderListItem($result, "Regular Episodes", "list.php?displaybyrange=jye_episode_length&minrange=20&maxrange=30&searchquery=Regular%20Episodes");
                    // Manga Source
                    $sql = "SELECT * from $database WHERE jye_series_source like 'manga' ORDER BY RAND() LIMIT 1;";
                    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                    renderListItem($result, "Manga Source", "list.php?displayby=jye_series_source&displayvalue=manga&searchquery=Source:%20Manga");
                    // Rated PG-13
                    $sql = "SELECT * from $database WHERE jye_rating like 'pg-13' ORDER BY RAND() LIMIT 1;";
                    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                    renderListItem($result, "Rated PG-13", "list.php?displayby=jye_rating&displayvalue=pg-13&searchquery=Rated:%20PG-13");

                ?>
			</div>
        </div>
    </div>
    <div class="col-md-4">
        <?php $thisroot = "/dmit2025/week12/catalog/list.php"; ?>
		<?php include("includes/filterbar.php"); ?>
    </div>
</div>
<?php include ("includes/footer.php"); ?>