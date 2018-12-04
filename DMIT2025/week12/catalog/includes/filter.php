<?php
    $displayby = $_GET['displayby'];
    $displayvalue = $_GET['displayvalue'];
    $justrandom = $_GET['justrandom'];
    $israndom = $_GET['israndom'];
    $orderby = $_GET['orderby'];
    $displayonlyby = $_GET['displayonlyby'];
    $displayonly = $_GET['displayonly'];
    $displaybyrange = $_GET['displaybyrange'];
    $minrange = $_GET['minrange'];
    $maxrange = $_GET['maxrange'];
    $searchlimit = $_GET['searchlimit'];
    $sqlAddon = '';
    $hasOrderby = false;
    $searchQuery = $_GET['searchquery'];

    $baseQuery = parse_url($_SERVER['REQUEST_URI']);
    $eachQuery = explode("&", $baseQuery['query']);
    $queryArray = array();
    foreach ($eachQuery as $k => $v){
        $queryValue = explode("=", $v);
        if ($queryValue[0] != "pg"){
            $queryArray[$queryValue[0]] = $queryValue[1];
        }
    }
    $finalQuery = http_build_query($queryArray);
    // echo $finalQuery;

    if(isset($_POST['filter'])){
        
        $rating = trim($_POST['rating']);
        $seriesSrc = trim($_POST['seriessrc']);

        $gAction = trim($_POST['genre_action']);
        $gAdven = trim($_POST['genre_adventure']);
        $gComedy = trim($_POST['genre_comedy']);
        $gFantasy = trim($_POST['genre_fantasy']);
        $gGame = trim($_POST['genre_game']);
        $gMagic = trim($_POST['genre_magic']);
        $gMystery = trim($_POST['genre_mystery']);
        $gSchool = trim($_POST['genre_school']);
        $gSports = trim($_POST['genre_sports']);
        $gSuper = trim($_POST['genre_super']);
        
        $andAppend = array();
        if ($rating != ""){
            array_push($andAppend, "jye_rating like '$rating'");
            $rateQuery = strtoupper($rating);
            $searchQuery .= "Rated: $rateQuery";
        }
        if ($seriesSrc != ""){
            array_push($andAppend, "jye_series_source like '$seriesSrc'");
            switch($seriesSrc){
                case "ln":
                $srcQuery = "Light Novel";
                break;
                case "vn":
                $srcQuery = "Visual Novel";
                break;
                case "game":
                $srcQuery = "Video Game";
                break;
                default:
                $srcQuery = ucfirst($seriesSrc);
                break;
            }
            if ($searchQuery != "") $searchQuery .= " and ";
            $searchQuery .= "Source: $srcQuery";
        }

        $genreQuery = array();
        $genreAppend = array();
        if ($gAction){
            array_push($genreAppend, "jye_genre_action like '1'");
            array_push($genreQuery, "Action");
        }
        if ($gAdven){
            array_push($genreAppend, "jye_genre_adventure like '1'");
            array_push($genreQuery, "Adventure");
        }
        if ($gComedy){
            array_push($genreAppend, "jye_genre_comedy like '1'");
            array_push($genreQuery, "Comedy");
        }
        if ($gFantasy){
            array_push($genreAppend, "jye_genre_fantasy like '1'");
            array_push($genreQuery, "Fantasy");
        }
        if ($gGame){
            array_push($genreAppend, "jye_genre_game like '1'");
            array_push($genreQuery, "Game");
        }
        if ($gMagic){
            array_push($genreAppend, "jye_genre_magic like '1'");
            array_push($genreQuery, "Magic");
        }
        if ($gMystery){
            array_push($genreAppend, "jye_genre_mystery like '1'");
            array_push($genreQuery, "Mystery");
        }
        if ($gSchool){
            array_push($genreAppend, "jye_genre_school like '1'");
            array_push($genreQuery, "School");
        }
        if ($gSports){
            array_push($genreAppend, "jye_genre_sports like '1'");
            array_push($genreQuery, "Sports");
        }
        if ($gSuper){
            array_push($genreAppend, "jye_genre_super like '1'");
            array_push($genreQuery, "Supernatural");
        }

        $queryFilter = "";
        foreach($genreAppend as $k => $v){
            if($k == 0){ //if this is the first array item
                $queryFilter .= " WHERE (" . $v;
            }else{
                $queryFilter .= " OR " . $v;
            }
        }
        if ($queryFilter != "") $queryFilter .= ")";

        foreach($andAppend as $k => $v){
            if($k == 0 && $queryFilter == ""){ //if this is the first array item
                $queryFilter .= " WHERE " . $v;
            }else{
                $queryFilter .= " AND " . $v;
            }
        }
        
        foreach($genreQuery as $k => $v){
            if($k == 0){ //if this is the first array item
                if ($searchQuery != ""){
                    $searchQuery .= " and ";
                }
                $searchQuery .= "Genre: " . $v;
            }else{
                $searchQuery .= " or " . $v;
            }
        }
        // echo "$searchQuery";
        $sqlAddon = $queryFilter; 
    }

    if($displaybyrange && $minrange && $maxrange){
        $sqlAddon = " WHERE $displaybyrange BETWEEN '$minrange' AND '$maxrange' ";
    }

    if($displayonlyby && $displayonly){
        $sqlAddon = " WHERE $displayonlyby = '$displayonly' ";
    }
    if($displayby && $displayvalue){
        if ($israndom){
            $hasOrderby = true;
            $sqlAddon = " WHERE $displayby LIKE '$displayvalue' ORDER BY RAND() ";
        }else{
            $sqlAddon = " WHERE $displayby LIKE '$displayvalue' ";
        }
    }
    if ($justrandom){
        $hasOrderby = true;
        $sqlAddon = " ORDER BY RAND() ";
    }
    if (isset($orderby)) {
        $hasOrderby = true;
        $sqlAddon = " ORDER BY $orderby ";
    }
    if ($searchlimit){
        $sqlAddon .= " LIMIT $searchlimit";
    }
    if (!$hasOrderby){
        $sqlAddon .= " ORDER BY $id ";
    }


?>