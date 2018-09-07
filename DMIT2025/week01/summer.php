<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Summer Vacation Echo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <style>
    body{
        background-color: #777;
    }
    img{
        width: 40rem;
    }
    h1{
        text-style:italic bold;
    }
    .container{
        margin-left: 5rem;
        padding: auto;
    }
    li{
        list-style: none;
    }
    .content{
        /* margin: 0 auto; */
        margin-left: 5rem;
        width: 60rem;
        background-color: #fff;
        border: 2px solid black;
        padding: 1.5rem;
        margin-bottom: 3rem;
        /* border: 2px dotted black; */
        text-align: center;
    }
    h3{
        border: 2px solid black;
        width: 30rem;
        color: blue;
        background-color:#fff;
        padding: 1rem;
    }
    </style>
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php
        echo "<div class=\"container\">";
            echo "<h1>My Summer Vacation</h1>";
            echo "<div class=\"content\">";
                echo "<h2>Learning Unreal Engine</h2>";
                echo "<p>During the summer I worked at a programming job, and learned about the Unreal Engine.</p>";
                echo "<img src=\"ue.png\" alt=\"Unreal Engine\">";
                echo "<p>That is where majority of my summer is spent.</p>";
                echo "<p>Some things that I learned over the summer:</p>";
                echo "<ul>";
                echo "<li>Creating and managing a project</li>";
                echo "<li>How to work with the engine's UI</li>";
                echo "<li>Coding with Unreal Engine</li>";
                echo "<li>Finishing and releasing a project</li>";
                echo "</ul>";
            echo "</div>";
            echo "<div class=\"content\">";
                echo "<h2>Vacation at Vancouver</h2>";
                echo "<p>During one week during the summer, my family and some relatives drove to Vancouver.<br /> It was during one of the few weeks when Edmonton was covered in smoke and it served nicely for a break from work.</p>";
                echo "<img src=\"vancouver.jpg\" alt=\"Vancouver Vacation\">";
                echo "<p>My most enjoyable part of the trip was enjoying the cruise from Vancouver to Victoria.</p>";
                echo "<img src=\"cruise.jpg\" alt=\"Cruise to Victoria\">";
                echo "<p>During the cruise back from Victoria to Vancouver I enjoyed the dark night sky while being feeling the night breeze on the bow of the ship.</p>";
            echo "</div>";
            echo "<h3>And that was what I did over the summer.</h3>";
        echo "</div>";
        ?>
    <script src="" async defer></script>
</body>

</html>