<?php include("includes/admin-check.php"); ?>
<?php include("includes/header.php"); ?>

        <?php
            $anim = trim($_GET['anim']);
            $anim = filter_var($anim, FILTER_SANITIZE_NUMBER_INT);

            // // previous record
            // $sql = "SELECT * from $database where $id < $img ORDER BY $id DESC LIMIT 1";
            // $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            // while ($row = mysqli_fetch_array($result)){
            //     $prevImg = $row['gid'];
            // }
            // // next record
            // $sql = "SELECT * from $database where $id > $img ORDER BY $id LIMIT 1";
            // $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            // while ($row = mysqli_fetch_array($result)){
            //     $nextImg = $row['gid'];
            // }
            // // actually get the database
            // $sql = "SELECT * from $database where $id = $img";
            
            $sql = "SELECT * FROM $database 
            WHERE $id >= 
            (SELECT $id FROM $database WHERE $id <= $anim ORDER BY $id DESC LIMIT 1,1)
            ORDER BY $id LIMIT 3";

            $idsql = "SELECT min($id) as $id from $database";
            $result = mysqli_query($con, $idsql) or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($result)){
                if ($anim <= $row[$id]){
                    $sql = "SELECT * FROM $database 
                    WHERE $id >= $anim
                    ORDER BY $id LIMIT 2";
                }
            }

            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($result)){
                $animid = $row[$id];
                if ($animid < $anim){
                    $prevImg = $animid;
                }else if ($animid > $anim){
                    $nextImg = $animid;
                }else{
                    $displayTitle = $row['jye_series_name'];
                    $displayImg =  $row['jye_series_image'];
                    $displayDescrip = nl2br($row['jye_description']);
                    $imgUrl = "imagefiles/display/" . $displayImg;

                    $alterN = $row['jye_alter_name'];
                    $seriesL = $row['jye_series_length'];
                    $episodeL = $row['jye_episode_length'];
                    $rating = $row['jye_rating'];
                    $seriesSrc = $row['jye_series_source'];
                    $dataSrc = $row['jye_data_source'];
                    $airing = $row['jye_airing'];
                    $descrip = $row['jye_description'];
            
                    $gAction = $row['jye_genre_action'];
                    $gAdven = $row['jye_genre_adventure'];
                    $gComedy = $row['jye_genre_comedy'];
                    $gFantasy = $row['jye_genre_fantasy'];
                    $gGame = $row['jye_genre_game'];
                    $gMagic = $row['jye_genre_magic'];
                    $gMystery = $row['jye_genre_mystery'];
                    $gSchool = $row['jye_genre_school'];
                    $gSports = $row['jye_genre_sports'];
                    $gSuper = $row['jye_genre_super'];
                    
                    $genreArray = array();
                    if ($gAction){
                        array_push($genreArray, "Action");
                    }
                    if ($gAdven){
                        array_push($genreArray, "Adventure");
                    }
                    if ($gComedy){
                        array_push($genreArray, "Comedy");
                    }
                    if ($gFantasy){
                        array_push($genreArray, "Fantasy");
                    }
                    if ($gGame){
                        array_push($genreArray, "Game");
                    }
                    if ($gMagic){
                        array_push($genreArray, "Magic");
                    }
                    if ($gMystery){
                        array_push($genreArray, "Mystery");
                    }
                    if ($gSchool){
                        array_push($genreArray, "School");
                    }
                    if ($gSports){
                        array_push($genreArray, "Sports");
                    }
                    if ($gSuper){
                        array_push($genreArray, "Supernatural");
                    }
                    
                    $seriesGenre = "";
                    foreach($genreArray as $k => $v){
                        if($k == 0){ //if this is the first array item
                            $seriesGenre .= $v;
                        }else{
                            $seriesGenre .= ", " . $v;
                        }
                    }
                    
                    $actualRating = strtoupper($rating);
                    $displayRating = "Not Rated";
                    $displaySrc = "Unknown";
                    switch($rating){
                        case "g":
                        $displayRating = "General Audience";
                        break;
                        case "pg":
                        $displayRating = "Parental Guidance";
                        break;
                        case "pg-13":
                        $displayRating = "Parents Strongly Cautioned";
                        break;
                        case "r":
                        $displayRating = "Restricted";
                        break;
                        case "nc-17":
                        $displayRating = "Adult Only";
                        break;
                    }
                    switch($seriesSrc){
                        case "ln":
                        $displaySrc = "Light Novel";
                        break;
                        case "vn":
                        $displaySrc = "Visual Novel";
                        break;
                        case "manga":
                        $displaySrc = "Manga";
                        break;
                        case "game":
                        $displaySrc = "Game";
                        break;
                        case "original":
                        $displaySrc = "Original";
                        break;
                        case "other":
                        $displaySrc = "Other";
                        break;
                    }


                }
                
            }
        ?>
        <div class="gallery row">
            <div class="imgbtn clearfix">
                <?php
                    echo "<div class=\"item-title\">";
                    echo "<p>$displayTitle</p>";
                    echo "<a class=\"editbtn\" href=\"admin/update.php?animid=$anim\">Edit</a>";
                    echo "</div>";
                    echo "<div class=\"item-btns\">";
                    if ($prevImg) { echo "<a class=\"btn btn-default prevbtn\" href=\"single.php?anim=$prevImg\"><<</a>";}
                    if ($nextImg) { echo "<a class=\"btn btn-default nextbtn\" href=\"single.php?anim=$nextImg\">>></a>";}
                    echo "</div>";
                ?>
            </div>
            <div class="col-md-7">
                <div class="display">
                <figure>
                    <img class="series-img" src="<?php echo $imgUrl ?>" alt="<?php echo $displayTitle ?>" title="<?php echo $displayImg ?>">
                    <?php if ($dataSrc != "") { echo "<figcaption class=\"series-url\">Data Source: <a href=\"$dataSrc\">$displayTitle</a></figcaption>"; } ?>
                </figure>
                </div>
                <!-- <div class="series-info">
                </div> -->
            </div>
            <div class="col-md-5">
                <?php
                    echo "<div class=\"description\">";
                    if ($alterN != "") {echo "<p><b>Also known as:</b> $alterN</p>"; }
                    if ($seriesGenre != "") {echo "<p><b>Genres:</b> $seriesGenre</p>"; }
                    if ($seriesL != ""|| $episodeL != "") { 
                        echo "<p>";
                        if ($seriesL){
                            echo "$seriesL episodes";
                        }
                        if ($seriesL && $episodeL){
                            echo ", ";
                        }
                        if ($episodeL){
                            echo "$episodeL minutes per episode";
                        }
                        echo "</p>"; 
                    }
                    echo "<p><b>Status:</b>";
                    if ($airing) { echo " Currently Airing</p>"; } else { echo " Finished/Not Yet Aired</p>"; }
                    if ($displaySrc != "") { echo "<p><b>Source:</b> $displaySrc</p>"; }
                    if ($displayRating != "") { echo "<p><b>Rating:</b> $displayRating ($actualRating)</p>"; }
                    echo "<br><br>";
                ?>
                <?php
                    if ($displayDescrip != "") {
                        // echo "<div class=\"description\">";
                        echo "<h5><b>Synopsis:</b></h5>";
                        echo "<p>$displayDescrip</p>";
                        // echo "</div>";
                    }
                    echo "</div>";
                ?>
            </div>
        </div>

        <br>
        <script>
            const evt = new MouseEvent('click'); //document.createEvent("MouseEvents");
            // evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
            function leftArrowPressed() {
                let prev = document.querySelector('.prevbtn');
                prev.dispatchEvent(evt);
            }

            function rightArrowPressed() {
                let next = document.querySelector('.nextbtn');
                next.dispatchEvent(evt);
            }

            document.onkeydown = function(evt) {
                evt = evt || window.event;
                switch (evt.keyCode) {
                    case 37:
                        leftArrowPressed();
                        break;
                    case 39:
                        rightArrowPressed();
                        break;
                }
            };
        </script>
<?php include("includes/footer.php"); ?>
