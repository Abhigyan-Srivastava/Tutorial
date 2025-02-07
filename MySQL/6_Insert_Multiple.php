<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Multiple Records Into MySQL Using MySQLi and PDO</title>
</head>
<body>
    <?php
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "myDB";

        // // Creating Connection
        // $conn = new mysqli($servername, $username, $password, $dbname);

        // if($conn->connect_error) {
        //     die("Connection Failed: " . $conn->connect_error);
        // }

        // $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Ben', 'Tenneson', 'Ben@example.com');";

        // $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Mary', 'Moe', 'mary@example.com');";
        // $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Julie', 'Dooley', 'julie@example.com')";

        // if($conn->multi_query($sql) === true) {
        //     echo "New records created successfully";
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
            $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

            $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $conn -> beginTransaction();

            $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Ben', 'Tenneson', 'Ben@example.com')");

            $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Mary', 'Moe', 'mary@example.com')");

            $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
            VALUES ('Julie', 'Dooley', 'julie@example.com')");

            $conn -> commit();
            echo "New records created successfully";
        }
        catch(PDOException $e) {
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }

        $conn = NULL;
    ?>
</body>
</html>