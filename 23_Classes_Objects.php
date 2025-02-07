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
            // Defining Properties
            public $name;
            public $color;

            // Constructors
            function __construct($name, $color) {
                $this->name = $name;
                $this->color = $color;
            }

            // // Defining Methods
            // function set_name($name) {
            //     $this->name = $name;
            // }

            function get_name() {
                return $this->name;
            }

            // function set_color($color) {
            //     $this -> color = $color;
            // }

            function get_color() {
                return $this -> color;
            }
        }

        $apple = new Fruits("Apple", "Red");
        $banana = new Fruits("Banana", "Yellow");
        // $apple -> set_name("Apple");
        // $apple -> set_color("Red");
        // $banana -> set_name("Banana");
        // $banana -> set_color("Yellow");

        echo $apple -> get_name();
        echo "<br>";
        echo $apple -> get_color();

        echo "<br>";

        echo $banana -> get_name();
        echo "<br>";
        echo $banana -> get_color();

        echo "<br>";
    ?> -->

        <!-- Destructors in PHP -->

    <?php
        class Fruit {
        public $name;
        public $color;

        function __construct($name, $color) {
            $this->name = $name;
            $this->color = $color;
        }
        function __destruct() {
            echo "The fruit is {$this->name} and the color is {$this->color}.";
        }
        }

        $apple = new Fruit("Apple", "red");
    ?>
</body>
</html>