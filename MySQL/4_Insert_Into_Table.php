<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data Into MySQL Using MySQLi and PDO</title>
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

        // // SQL Query
        // $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('XYZ', 'ABC', 'XYZ@ABC.com')";

        // if($conn -> query($sql) == TRUE) {
        //     echo "New record created successfully";
        // }
        // else {
        //     echo "Error: " . $sql ."<br>" . $conn -> error;
        // }

        // $conn->close();
    ?>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myDBPDO1";

        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('ABC', 'XYZ', 'ABC@XYZ.com')";

            $conn -> exec($sql);
            echo "New record created successfully";
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = NULL;
    ?>
</body>
</html>