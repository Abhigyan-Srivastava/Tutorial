<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    function divide($dividend, $divisor) {
    if($divisor == 0) {
        throw new Exception("Division by zero<br>");
    }
    return $dividend / $divisor;
    }

    try {
    echo divide(5, 0);
    } catch(Exception $e) {
    echo "Unable to divide. <br>";
    } finally {
    echo "Process complete.<br>";
    }
?>
</body>
</html>