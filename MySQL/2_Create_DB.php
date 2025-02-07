<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a MySQL Database Using MySQLi and PDO</title>
</head>
<body>
    
    <?php
        // $servername = "localhost";
        // $username = "root";
        // $password = "";

        // // Creating Connection
        // $conn = new mysqli($servername, $username, $password);

        // // Checking Connection
        // if($conn -> connect_error) {
        //     die("Connection Failed: " . $conn -> connect_error);
        // }

        // // Creating Database
        // $sql = "CREATE DATABASE myDB";

        // if($conn -> query($sql) === TRUE) {
        //     echo "Database Created Successfully";
        // }
        // else {
        //     echo "Error Creating Database: " .$conn -> error;
        // }

        // $conn -> close();
    ?>


    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            echo "Attempting to connect...<br>"; // Debugging statement
            
            $conn = new PDO("mysql:host=localhost",  'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            echo "Connection established.<br>"; 
            
            $sql = "CREATE DATABASE myDBPDO1";
            echo "Preparing to execute query: $sql<br>"; 

            // For executing 'SQL' Query
            $conn->exec($sql);
            echo "Database created successfully<br>";
        } catch (PDOException $e) {
            echo "Connection Failed: " . $e->getMessage() . "<br>";
        }

        $conn = null;
    ?>



</body>
</html>