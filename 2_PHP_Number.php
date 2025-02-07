<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<h2>PHP NUMBERS</h2>";

        $a = 5;
        $b = 5.34;
        $c = "25";

        var_dump($a);
        echo "<br>";
        
        var_dump($b);
        echo "<br>";
        
        var_dump($c);
        echo "<br>";

        $x = 5985;
        var_dump(is_int($x));
        echo "<br>";

        $x = 59.85;
        var_dump(is_int($x));
        echo "<br>";
        
        var_dump(is_float($x));
        echo "<br>";

        # Numerical Strings

        $x = "5985";
        var_dump(is_numeric($x));
        echo "<br>";
        $x = "59.85" + 100;
        var_dump(is_numeric($x));
        echo "<br>";
    ?>
</body>
</html>