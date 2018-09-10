<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Variables and Operators</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <h1>PHP Variables and Operators</h1>
        <?php
        // What is a variable? A container for a piece of info
        // we don't need to initialize or declare variables as a sperate step; by simply assigning them a value, they exist
        // PHP vars all use the variant data type. You don't have to declare the data type; PHP will figure based on how you use it.
        // Types:
        // Text strings
        // Numeric: Integers, decimals (floats)
        // Boolean: true/false, 1/0
        // Scope: A PHP var will exist for the duration of that script (page), but not between pages. It will exist between PHP blocks in one page.
        // But
        // Naming:
        // - must start with a $
        // - case-sensitive
        // - no spcaes
        // - cannot start with a number, but can use numbers.
        // - many devs use camelCase: $thisColor

        $firstName = "Dirk";
        $lastName = "Diggler";
        // unlike most other languages, in PHP you can use a var in a text string
        echo "<p>The name is $firstName $lastName.</p>";
        
        echo "<p>The name is " . $firstName . " " .  $lastName . ".</p>";
        // Opertators:
        // Concatenation: .
        // Assignment: =
        // Append: .= Adds to the current value of.

        $theName = "John ";
        echo "<p>The name is $theName</p>";
        $theName .= "Smith";
        echo "<p>The name is $theName</p>";

        echo "<h3>Numeric varibles and operators</h3>";
        // + addition
        // - subtraction
        // * multiplication
        // / division
        // % modulus
        // ++ increment: Add1 to current value
        // -- decrement: Subtract1 to current value
        $num1 = 3; 
        $num2 = 6; 
        $num3 = $num1 + $num2;
        echo "<p>When you take $num1 and $num2, you get the number.</p>";
        echo "<p>The number is $num3</p>";
        echo "<p>";
        $i = 5;
        $i++;
        echo "The number is $i</p>";

        echo "<h3>Logical or Comparison Operators</h3>";
        // == means "is the same as"
        // === means "is the same as and is the same data type as
        // != means "is NOT the same"
        // <,>, >=, <=
        // && means this AND this are true
        // || means this OR this is true
        // ! NOT
        //echo "<p>" . 5 === "5" . "</p>";
        
        ?>

        <script src="" async defer></script>
    </body>
</html>