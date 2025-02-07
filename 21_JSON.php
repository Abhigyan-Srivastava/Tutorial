<!-- JSON -> JavaScript Object Notation -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- PHP - json_encode() -->
    <?php
        // Associative Array
        $age = array(
            "Peter" => 35,
            "Ben" => 37,
            "Joe" => 43
        );

        echo json_encode($age);
    ?>

    <br>

    <?php
        $cars = array("Volvo", "BMW", "Toyota");

        echo json_encode($cars);
    ?>

    <br>

    <!-- PHP - json_decode() -->
    
    <!-- decodes JSON data into a PHP object -->
    <?php
        $jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

        var_dump(json_decode($jsonobj));
    ?>

    <br>

    <!-- decodes JSON data into a PHP associative array -->
    <?php
        $jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

        var_dump(json_decode($jsonobj, true));
    ?>

</body>
</html>