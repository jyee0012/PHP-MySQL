<?php include("includes/header.php"); ?>

        <?php
            $img = trim($_GET['img']);
            $img = filter_var($img, FILTER_SANITIZE_NUMBER_INT);

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
            (SELECT $id FROM $database WHERE $id <= $img ORDER BY $id DESC LIMIT 1,1)
            ORDER BY $id LIMIT 3";

            $idsql = "SELECT min($id) as $id from $database";
            $result = mysqli_query($con, $idsql) or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($result)){
                if ($img <= $row[$id]){
                    $sql = "SELECT * FROM $database 
                    WHERE $id >= $img
                    ORDER BY $id LIMIT 2";
                }
            }

            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($result)){
                $imgid = $row[$id];
                if ($imgid < $img){
                    $prevImg = $imgid;
                }else if ($imgid > $img){
                    $nextImg = $imgid;
                }else{
                    $displayTitle = $row['jye_title'];
                    $displayImg =  $row['jye_filename'];
                    $imgUrl = "galleryfiles/display/" . $displayImg;
                }
                
            }
        ?>
        <div class="gallery">
            <div class="imgbtn">
                <?php
                    if ($prevImg) { echo "<a class=\"btn btn-default\" href=\"single.php?img=$prevImg\"><<</a>";}
                    echo "<p>$displayTitle</p>";
                    if ($nextImg) { echo "<a class=\"btn btn-default\" href=\"single.php?img=$nextImg\">>></a>";}
                ?>
            </div>
            <div class="display">
                    <img class="center" src="<?php echo $imgUrl ?>" alt="<?php echo $displayTitle ?>" title="<?php echo $displayImg ?>">
            </div>
        </div>

        <br>

<?php include("includes/footer.php"); ?>
