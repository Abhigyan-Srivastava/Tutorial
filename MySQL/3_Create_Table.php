<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a MySQL Table Using MySQLi and PDO</title>
</head>
<body>
    <?php
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "myDB";

        // // Creating conenction
        // $conn = new mysqli($servername, $username, $password,$dbname);

        // // Checking Connection
        // if($conn -> connect_error) {
        //     die("Connection Failed: " . $conn -> connect_error);
        // }

        // // SQL Query to create Table
        // $sql = "CREATE TABLE MyGuests (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50), reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

        // if($conn->query($sql) === TRUE) {
        //     echo "Table MyGuests created successfully";
        // }
        // else {
        //     echo "Error creating table: " .$conn -> error;
        // }
        // $conn->close();
    ?>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myDBPDO1";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // SQL Query for creating table
            $sql = "CREATE TABLE MyGuests (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50), reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

            $conn -> exec($sql);
            echo "Table MyGuests created successfully";
        }
        catch (PDOException $e) {
            echo $sql. "<br>" .$e->getMessage() ."<br>";
        }
    ?>
</body>
</html>