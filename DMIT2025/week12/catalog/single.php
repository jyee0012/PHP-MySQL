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
                }
                
            }
        ?>
        <div class="gallery">
            <div class="imgbtn">
                <?php
                    if ($prevImg) { echo "<a class=\"btn btn-default prevbtn\" href=\"single.php?anim=$prevImg\"><<</a>";}
                    echo "<p>$displayTitle</p>";
                    if ($nextImg) { echo "<a class=\"btn btn-default nextbtn\" href=\"single.php?anim=$nextImg\">>></a>";}
                    echo "<a class=\"editbtn\" href=\"admin/update.php?animid=$anim\">Edit</a>"
                ?>
            </div>
            <div class="display">
                <img class="center" src="<?php echo $imgUrl ?>" alt="<?php echo $displayTitle ?>" title="<?php echo $displayImg ?>">
            </div>
            <div class="description">
                <p><?php echo $displayDescrip; ?></p>
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
