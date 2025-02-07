<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function myMessage() {
            echo "Hello World!<br>";
        }

        myMessage(); # Function Call

        function familyName($fname) {
            echo "$fname ,Have a nice day!<br>";
        }

        familyName("Hege");
        familyName("Stale");

        # Defualt Argument Value
        function setHeight($minheight=50) {
            echo "The height is: $minheight <br>";
        }

        setHeight(350);
        setHeight(); // will use the default value of 50
        setHeight(135);
        setHeight(80);

        # Functions returning value
        function getSum($x,$y) {
            return $x + $y;
        }

        echo "5 + 10 = " . getSum(5, 10) . "<br>";
        echo "7 + 13 = " . getSum(7, 13) . "<br>";
        echo "2 + 4 = " . getSum(2, 4) . "<br>";

        # Variadic Function (Can accept number of arguments)

        function sumMyNumbers(...$x) {
            $n = 0;
            $len = count($x);
            for($i = 0; $i < $len; $i++) {
              $n += $x[$i];
            }
            return $n;
          }
          
          $a = sumMyNumbers(5, 2, 6, 2, 7, 7);
          echo $a . "<br>";

          # PHP is a loosely typed language -> Will throw an error

          function addNumbers(int $a, int $b) {
            return $a + $b;
          }
          echo addNumbers(5, "5 days");
          // since strict is NOT enabled "5 days" is changed to int(5), and it will return 10


    ?>
</body>
</html>