<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection Establishment using MySQLi & PDO</title>
</head>
<body>
    <?php
        $servername = "localhost";
        // $username = "username";
        $username = "root";
        // $password = "password";
        $password = "";

        // Creating Connection
        $conn = new mysqli($servername,$username,$password);

        // Checking Connection

        if($conn -> connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        echo "Connected Successfully";
        // $conn -> close();
    ?>

    <br>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);

            // If any error
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connected Successfully";
        }
        catch(PDOException $e) {
            echo "Connection Failed: " .$e->getMessage();
        }

        // $conn = NULL;
    ?>
</body>
</html>