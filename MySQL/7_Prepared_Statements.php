<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prepared Statements in MySQLi</title>
</head>
<body>
    <?php
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "myDB";

        // $conn = new mysqli($servername, $username, $password, $dbname);

        // if($conn->connect_error) {
        //     die("Connection Failed: " . $conn->connect_error);
        // }

        // // Preparing the statement and will bind the values in the same
        // $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
        // $stmt -> bind_param("sss", $firstname, $lastname, $email);

        // // Setting Parameters
        // $firstname = "John";
        // $lastname = "Doe";
        // $email = "john@example.com";
        // $stmt->execute();

        // $firstname = "Mary";
        // $lastname = "Moe";
        // $email = "mary@example.com";
        // $stmt->execute();

        // $firstname = "Julie";
        // $lastname = "Dooley";
        // $email = "julie@example.com";
        // $stmt->execute();

        // echo "New records created successfully";

        // $stmt->close();
        // $conn->close();
    ?>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myDBPDO1";

        try {
            $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
            
            $stmt->bindParam(':firstname', $firstname);
            $stmt -> bindParam(':lastname', $lastname);
            $stmt -> bindParam(':email', $email);

            // Inserting a row
            $firstname = "John";
            $lastname = "Doe";
            $email = "john@example.com";
            $stmt->execute();

            $firstname = "Mary";
            $lastname = "Moe";
            $email = "mary@example.com";
            $stmt->execute();

            $firstname = "Julie";
            $lastname = "Dooley";
            $email = "julie@example.com";
            $stmt->execute();

            echo "New records created successfully";
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = NULL;
    ?>

</body>
</html>