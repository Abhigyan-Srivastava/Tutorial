<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Filter Name</td>
            <td>Filter ID</td>
        </tr>
        <?php 
            foreach (filter_list() as $id => $filter) {
                echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
            }
        ?>
    </table>

    <?php
        // Sanitize a string
        $str = "<h1>Hello World!</h1>";
        $newstr = filter_var($str,FILTER_SANITIZE_STRING);
        echo $newstr;
    ?>

    <br>

    <!-- Validate an integer -->
    <?php
        $int = 100;

        if(!filter_var($int, FILTER_VALIDATE_INT) === false) {
            echo ("Integer is valid");
        }
        else {
            echo ("Integer is not valid!");
        }
    ?>

    <br>

    <!-- filter_var problem with 0 -->

    <?php
        $int = 0;

        if(filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int,FILTER_VALIDATE_INT) === false) {
            echo "Integer is valid";
        }
        else {
            echo "Integer is not valid";
        }
    ?>

    <br>

    <!-- Validate an IP Address -->

    <?php
        $ip = "127.0.0.1";

        if(!filter_var($ip,FILTER_VALIDATE_IP) === false) {
            echo "$ip is a valid IP Address";
        }
        else {
            echo "$ip is not an valid IP Address";
        }
    ?>

    <br>

    <!-- Validate an Email Address -->
    <?php
        $email = "john.doe@example.com";

        // Removing all illegal characters (if any) (Sanitize)
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Validate email
        if(!filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
            echo "$email is a valid email address";
        }
        else {
            echo "$email is not a valid email address";
        }
    ?>

    <!-- Validate an URL -->
    <?php
        $url = "https://www.facebook.com";

        // Sanitizing the URL
        $url = filter_var($url, FILTER_SANITIZE_URL);

        // Validating the URL
        if(!filter_var($url,FILTER_VALIDATE_URL) === false) {
            echo "$url is a valid URL";
        }
        else {
            echo "$url is not a valid URL";
        }
    ?>

    <br>

    <!-- Advanced Filters Concept -->
    <?php
        $int = 122;
        $min = 1;
        $max = 200;

        if(filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min,"max_range"=> $max))) === false) {
            echo "Variable value is not within the legal range";
        } 
        else {
            echo "Variable value is within the legal range";
        }
    ?>

    <!-- Validate IPv6 Address -->
    <?php
        $ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";

        // $ip = "225.1.4.2";

        if(!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
            echo "$ip is a valid IPv6 Address.";
        }
        else {
            echo "$ip is not a valid IPv6 Address.";
        }
    ?>
</body>
</html>