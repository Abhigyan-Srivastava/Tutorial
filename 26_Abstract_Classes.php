<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Parent Class
        abstract class Car {
            public $name;

            public function __construct($name) {
                $this -> name = $name;
            }

            abstract public function intro() : string;
        }

        // Child Classes
        class Audi extends Car {
            public function intro() : string{
                return "Choose German Quality! I'm an $this->name!";
            }
        }

        class Volvo extends Car {
            public function intro() : string {
                return "Proud to be Swedish! I'm a $this->name!";
            }
        }

        class Citroen extends Car {
            public function intro() : string {
                return "French extravagance! I'm a $this->name!";
            }
        }

        // Create objects of child classes
        $audi = new Audi("Audi");
        echo $audi->intro();
        echo "<br>";

        $volvo = new Volvo("Volvo");
        echo $volvo->intro();
        echo "<br>";

        $citroen = new Citroen("Citroen");
        echo $citroen->intro();
        echo "<br>";
    ?>
</body>
</html>