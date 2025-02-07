<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        # define(name, value); -> Syntax

        define("GREETING", "Welcome to W3Schools.com!");
        echo GREETING;
        echo "<br>";

        const MYCAR = "Volvo";
        echo MYCAR; 
        echo "<br>";

        # Constant Arrays

        define("cars", [
            "Alfa Romeo",
            "BMW",
            "Toyota"
          ]);
        
        echo cars[0];
        echo "<br>";

        # Constants are global

        // define("GREETING", "Welcome to W3Schools.com!");

        function myTest() {
        echo GREETING;
        }

        myTest();

        # There are also some 'Magic Constants.'
    ?>
</body>
</html>