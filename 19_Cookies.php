<!DOCTYPE html>

<!-- Setting Cookies -->
<?php
    $cookie_name = "user";
    $cookie_value = "John";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>

<!-- Deleting Cookies (Setting the expiration date to one hour ago)-->
<?php
    setcookie("user", "", time() - 3600);
?>

<!-- Checking whether the cookies are enabled or not? -->

<?php
    setcookie("test_cookie", "test", time() + 3600, "/");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(!isset($_COOKIE[$cookie_name])) {
            echo "Cookie named " . $cookie_name . " is not set!<br>";
        }
        else {
            echo "Cookie " .$cookie_name . " is set!<br>";
            echo "Value is: " .$_COOKIE[$cookie_name]."<br>";
        }
    ?>

    <?php
        echo "Cookie 'user' is deleted.<br>";
        echo "Value is: " .$_COOKIE[$cookie_name]."<br>";
    ?>

    <?php
        if(count($_COOKIE) > 0) {
            echo "Cookies are enabled.<br>";
        }
        else {
            echo "Cookies are disabled.<br>";
        }
    ?>

</body>
</html>