<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $a = 5;       // Integer
        $b = 5.34;    // Float
        $c = "hello"; // String
        $d = true;    // Boolean
        $e = NULL;    // NULL
        
        $a = (string) $a;
        $b = (string) $b;
        $c = (string) $c;
        $d = (string) $d;
        $e = (string) $e;
        
        //To verify the type of any object in PHP, use the var_dump() function:
        var_dump($a);
        echo "<br>";

        var_dump($b);
        echo "<br>";

        var_dump($c);
        echo "<br>";

        var_dump($d);
        echo "<br>";

        var_dump($e);
        echo "<br>";
        

        # Cast to Integer

        $a = 5;       // Integer
        $b = 5.34;    // Float
        $c = "25 kilometers"; // String
        $d = "kilometers 25"; // String
        $e = "hello"; // String
        $f = true;    // Boolean
        $g = NULL;    // NULL

        $a = (int) $a;
        $b = (int) $b;
        $c = (int) $c;
        $d = (int) $d;
        $e = (int) $e;
        $f = (int) $f;
        $g = (int) $g;

        # Cast to Float

        $a = 5;       // Integer
        $b = 5.34;    // Float
        $c = "25 kilometers"; // String
        $d = "kilometers 25"; // String
        $e = "hello"; // String
        $f = true;    // Boolean
        $g = NULL;    // NULL

        $a = (float) $a;
        $b = (float) $b;
        $c = (float) $c;
        $d = (float) $d;
        $e = (float) $e;
        $f = (float) $f;
        $g = (float) $g;

        # Cast to Boolean

        $a = 5;       // Integer
        $b = 5.34;    // Float
        $c = 0;       // Integer
        $d = -1;      // Integer
        $e = 0.1;     // Float
        $f = "hello"; // String
        $g = "";      // String
        $h = true;    // Boolean
        $i = NULL;    // NULL

        $a = (bool) $a;
        $b = (bool) $b;
        $c = (bool) $c;
        $d = (bool) $d;
        $e = (bool) $e;
        $f = (bool) $f;
        $g = (bool) $g;
        $h = (bool) $h;
        $i = (bool) $i;

        # Cast to Array

        $a = 5;       // Integer
        $b = 5.34;    // Float
        $c = "hello"; // String
        $d = true;    // Boolean
        $e = NULL;    // NULL

        $a = (array) $a;
        $b = (array) $b;
        $c = (array) $c;
        $d = (array) $d;
        $e = (array) $e;

        # Casting class to Array
        class Car {
            public $color;
            public $model;
            public function __construct($color, $model) {
              $this->color = $color;
              $this->model = $model;
            }
            public function message() {
              return "My car is a " . $this->color . " " . $this->model . "!";
            }
          }
          
          $myCar = new Car("red", "Volvo");
          
          $myCar = (array) $myCar;
          var_dump($myCar);

        # Cast to Object
        $a = 5;       // Integer
        $b = 5.34;    // Float
        $c = "hello"; // String
        $d = true;    // Boolean
        $e = NULL;    // NULL

        $a = (object) $a;
        $b = (object) $b;
        $c = (object) $c;
        $d = (object) $d;
        $e = (object) $e;

        # Converting Arrays into Objects

        $a = array("Volvo", "BMW", "Toyota"); // indexed array
        $b = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"); // associative array

        $a = (object) $a;
        $b = (object) $b;

        # Cast to Null -> Deprecated
        
        /*
        $a = 5;       // Integer
        $b = 5.34;    // Float
        $c = "hello"; // String
        $d = true;    // Boolean
        $e = NULL;    // NULL

        $a = (unset) $a;
        $b = (unset) $b;
        $c = (unset) $c;
        $d = (unset) $d;
        $e = (unset) $e;
        */
    ?>
</body>
</html>