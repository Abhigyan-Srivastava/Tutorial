<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function getSum($x,$y) {
            return $x + $y;
        }

        function getSubtraction($x,$y) {
            return $x - $y;
        }

        function getMultiplication($x,$y) {
            return $x * $y;
        }

        function getDivision($x,$y) {
            return $x / $y;
        }

        function getModulus($x,$y) {
            return $x % $y;
        }

        function getExponentiation($x,$y) {
            return $x ** $y;
        }


        $x = 500;
        $y = 10;

        echo getSum($x,$y);
        echo "<br>";
        echo getSubtraction($x,$y);
        echo "<br>";
        echo getMultiplication($x,$y);
        echo "<br>";
        echo getDivision($x,$y);
        echo "<br>";
        echo getModulus($x,$y);
        echo "<br>";
        echo getExponentiation($x,$y);
        echo "<br>";
    ?>
</body>
</html>