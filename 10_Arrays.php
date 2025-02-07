<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $cars = array("Volvo", "BMW", "Toyota");

        echo var_dump($cars). "<br>";
        echo count($cars). "<br>";
        echo $cars[0]. "<br>";

        // $cars[1] = "Ford";

        // echo var_dump($cars). "<br>";

        # Loops in Arrays

        foreach($cars as $x) {
            echo $x."<br>";
        }

        array_push($cars, "Ford");
        var_dump($cars);
        echo "<br>";

        # Associative Array

        $car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
        var_dump($car);
        echo "<br>";

        echo $car["model"]. "<br>";

        $car["year"] = 2024;
        var_dump($car);
        echo "<br>";

        foreach ($car as $x => $y) {
            echo "$x: $y <br>";
        }

        function myFunction(): void {
            echo "I come from a function!<br>";
        }
          
        $myArr = array("Volvo", 15, "myFunction");
          
        $myArr[2]();

        $fruits = array("Apple", "Banana", "Cherry");
        // $fruits[] = "Orange";

        array_push($fruits, "Orange", "Kiwi", "Lemon");

        # Deletion in Arrays

        // With the array_splice() function you specify the index (where to start) and how many items you want to delete.

        // array_splice($cars, 1, 1);

        // The unset() function takes a unlimited number of arguments, and can therefore be used to delete multiple array items:
        
        // unset($cars[0], $cars[1]);

        // unset($cars["model"]);

        // array_diff() function to remove items from an associative array.

        // $newarray = array_diff($cars, ["Mustang", 1964]);

        // This function returns a new array, without the specified items.

        // array_pop() function removes the last item of an array.

        // array_pop($cars);

        // array_shift() function removes the first item of an array.

        // array_shift($cars);

        # Sorting in Arrays

        sort($cars);

        $clength = count($cars);
        for($x = 0; $x < $clength; $x++) {
        echo $cars[$x];
        echo "<br>";
        }

        $numbers = array(4, 6, 2, 22, 11);
        sort($numbers);

        $nlength = count($numbers);
        
        for($x=0; $x < $nlength; $x++) {
            echo $numbers[$x];
            echo "<br>";
        }

        rsort($cars);
        
        for($x = 0; $x < $clength; $x++) {
            echo $cars[$x];
            echo "<br>";
        }

        rsort($numbers);

        for($x=0; $x < $nlength; $x++) {
            echo $numbers[$x];
            echo "<br>";
        }

        # Two-Dimensional Arrays

        $cars = array (
            array("Volvo",22,18),
            array("BMW",15,13),
            array("Thar",5,2),
            array("Land Rover",17,15)
        );

        echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
        echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
        echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
        echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";

        echo $_SERVER['PHP_SELF'];
        echo $_SERVER['SERVER_NAME'];
        echo $_SERVER['HTTP_HOST'];
        echo $_SERVER['HTTP_REFERER'];
        echo $_SERVER['HTTP_USER_AGENT'];
        echo $_SERVER['SCRIPT_NAME'];
        
        ?>
</body>
</html>