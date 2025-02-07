<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        # if statement
        if (5 > 3) {
            echo "Have a good day!<br>";
        }

        $a = 200;
        $b = 33;
        $c = 500;

        if ($a > $b && $a < $c ) {
        echo "Both conditions are true<br>";
        }

        # if-else statement

        $t = date("H");

        if ($t < "20") {
        echo "Have a good day!<br>";
        } else {
        echo "Have a good night!<br>";
        }

        # if-else-if-else statement

        $t = date("H");

        if ($t < "10") {
        echo "Have a good morning!<br>";
        } elseif ($t < "20") {
        echo "Have a good day!<br>";
        } else {
        echo "Have a good night!<br>";
        }

        # Short-hand Statements

        $a = 13;
        $b = $a < 10 ? "Hello<br>" : "Good Bye<br>";

        echo $b;

        # Nested if Statement
        $a = 13;

        if ($a > 10) {
        echo "Above 10<br>";
        if ($a > 20) {
            echo " and also above 20<br>";
        } else {
            echo " but not above 20<br>";
        }
        }

        # Switch Statement

        $favcolor = "orange";

        switch ($favcolor) {
        case "red":
            echo "Your favorite color is red!";
            break;
        case "blue":
            echo "Your favorite color is blue!";
            break;
        case "green":
            echo "Your favorite color is green!";
            break;
        default:
            echo "Your favorite color is neither red, blue, nor green!";
        }
    ?>
</body>
</html>