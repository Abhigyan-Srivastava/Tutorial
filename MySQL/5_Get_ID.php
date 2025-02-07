<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get ID of The Last Inserted Record</title>
</head>
<body>
    <?php
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "myDB";

        // // Creating Connection
        // $conn = new mysqli($servername, $username, $password, $dbname);

        // // Checking Connection
        // if($conn->connect_error) {
        //     die("Connection Failed: " . $conn->connect_error);
        // }

        // $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";

        // if($conn->query($sql) === TRUE) {
        //     $last_id = $conn->insert_id;
        //     echo "New record created successfully. Last inserted ID is: " . $last_id ."<br>";
        // }
        // else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
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

            $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";

            $conn->exec($sql);
            $last_id = $conn->lastInsertId();
            echo "New record created successfully. Last inserted ID is: " .$last_id;
        }
        catch (PDOException $e) {
            echo $sql. "<br>" . $e->getMessage();
        }

        $conn = NULL;
    ?>

</body>
</html>