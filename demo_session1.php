<?php
    // Starting the session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Setting session variables
        $_SESSION["favcolor"] = "green";
        $_SESSION["favanimal"] = "cat";
        echo "Session variables are set.";
    ?>

    <?php
        // Remove all session variables
        // session_unset();

        // Destroy the session
        session_destroy();
    ?>
</body>
</html>