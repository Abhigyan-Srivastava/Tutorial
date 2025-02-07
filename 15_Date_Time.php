<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Date Function -->
    <?php
        echo "Today is " .date("Y/m/d"). "<br>";
        echo "Today is " .date("Y.m.d"). "<br>";
        echo "Today is " .date("Y-m-d"). "<br>";
        echo "Today is " . date("l"); # Will return the name of week day 
    ?>

    <br>

    &copy; 2010-<?php echo date("Y");?>

    <br>

    <!-- Time Function -->
    <?php
    date_default_timezone_set("Asia/Kolkata");
    echo "The time is " . date("h:i:sa");
    ?>
</body>
</html>