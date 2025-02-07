<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Data From a MySQL Database</title>
</head>
<body>

<?php
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "myDB";

        // $conn = new mysqli($servername, $username, $password, $dbname);

        // if($conn->connect_error){
        //     die("Connection Failed: " . $conn->connect_error);
        // }

        // $sql = "SELECT id, firstname, lastname FROM MyGuests";
        // $result = $conn -> query($sql);

        // if($result->num_rows > 0) {
        //     while($row = $result->fetch_assoc()) {
        //         echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " ". $row["lastname"]. "<br>";
        //     }
        // }
        // else {
        //     echo "0 results";
        // }
        // $conn->close();
    ?>

    <?php
        echo "<table style='border: solid 1px black'>";
        echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

        class TableRows extends RecursiveIteratorIterator {
            function __construct($it) {
                parent::__construct($it, self::LEAVES_ONLY);
            }

            function current() {
                return "<td style='width:150px;border: 1px solid black;'>" . parent::current() . "</td>";
            }

            function beginChildren() {
                echo "<tr>";
            }

            function endChildren() {
                echo "</tr>" . "\n";
            }
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myDBPDO1";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                echo $v;
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
        echo "</table>";
    ?>
</body>
</html>
