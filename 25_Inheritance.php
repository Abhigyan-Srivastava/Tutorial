<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <?php
        class Fruits {
            public $name;
            public $color;

            public function __construct($name, $color){
                $this -> name = $name;
                $this -> color = $color;
            }

            public function intro() {
                echo "The fruit is {$this->name} and the color is {$this->color}.";
            }
        }

        // Inheritance
        class Strawberry extends Fruit {
            public function message() {
                echo "Am I a fruit or a berry?";
            }
        }

        $strawberry = new Strawberry("Strawberry", "Red");
        $strawberry->message();
        echo "<br>";
        $strawberry->intro();

    ?> -->

    <!-- Overriding Inherited Methods -->
    <?php
        class Fruit {
            public $name;
            public $color;

            public function __construct($name, $color) {
                $this -> name = $name;
                $this -> color = $color;
            }

            public function intro() {
                echo "The fruit is {$this->name} and the the color is {$this->color}.";
            }
        }

        class Strawberrys extends Fruit {
            public $weight;

            public function __construct($name, $color, $weight) {
                $this -> name = $name;
                $this -> color = $color;
                $this ->weight = $weight;
            }

            public function intro() {
                echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.";
            }
        }

        $strawberrys = new Strawberrys("Strawberry","Red", 50);
        $strawberrys->intro();
    ?>
</body>
</html>