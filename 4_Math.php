<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        # pi function
        echo(pi());
        echo "<br>";

        # min and max
        echo(min(0, 150, 30, 20, -8, -200));
        echo "<br>";
        echo(max(0, 150, 30, 20, -8, -200));
        echo "<br>";

        # Absolute Function -> Returns positive value
        echo(abs(-6.7));
        echo "<br>";

        echo(sqrt(64));
        echo "<br>";

        # Round Function -> rounds a floating number to its nearest integer.
        echo(round(0.60));
        echo "<br>";
        echo(round(0.49));
        echo "<br>";

        # Random Numbers
        echo(rand());
        echo "<br>";

        # Inclusive Random Numbers
        echo(rand(10, 100));
        echo "<br>";

    ?>
</body>
</html>