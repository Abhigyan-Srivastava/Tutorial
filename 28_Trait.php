<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        trait message1 {
            public function msg1() {
                echo "OOPS is fun!!";
            }
        }

        trait message2 {
            public function msg2() {
                echo "OOPS reduces code duplication!";
            }
        }

        class Welcome {
            use message1;
        }

        class Welcome2 {
            use message1,message2;
        }

        $obj = new Welcome();
        $obj->msg1();
        echo "<br>";

        $obj2 = new Welcome2();
        $obj2 -> msg1();
        echo "<br>";
        $obj2 -> msg2();
        echo "<br>";
    ?>

    <?php
        class pi {
        public static $value = 3.14159;
        }

        // Get static property
        echo pi::$value;
    ?>
</body>
</html>