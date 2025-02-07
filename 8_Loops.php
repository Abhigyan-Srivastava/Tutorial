<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        # While Loop

        echo "While Loop";
        echo "<br>";

        $i = 1;
        while ($i < 6) {
        echo $i,"<br>";
        $i++;
        }

        $i = 1;
        while ($i < 6) {
        if ($i == 3) break;
        echo $i,"<br>";
        $i++;
        }

        # do-while loop

        echo "Do-While Loop";
        echo "<br>";

        $i = 1;

        do {
        echo $i,"<br>";
        $i++;
        } while ($i < 6);

        $i = 1;

        do {
        if ($i == 3) break;
        echo $i,"<br>";
        $i++;
        } while ($i < 6);

        $i = 0;

        do {
        $i++;
        if ($i == 3) continue;
        echo $i,"<br>";
        } while ($i < 6);

        # For Loop

        echo "For Loop";
        echo "<br>";

        for ($x = 1; $x <= 10; $x++) {
            echo "The number is: $x <br>";
        }

        # for-each loop

        echo "For-Each Loop";
        echo "<br>";

        $colors = array("red", "green", "blue", "yellow");

        foreach ($colors as $x) { # Alias Name
        echo "$x <br>";
        }

        class Car {
            public $color;
            public $model;
            public function __construct($color, $model) {
              $this->color = $color;
              $this->model = $model;
            }
          }
          
          $myCar = new Car("red", "Volvo");
          
          foreach ($myCar as $x => $y) {
            echo "$x: $y <br>";
          }

    ?>
</body>
</html>