<!-- <?php
    echo readfile("webdictionary.txt");
?> -->

<!-- PHP File Open/Read/CloseSummarize -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <?php
        $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");

        // echo fread($myfile, filesize("webdictionary.txt"));

        # fgets reads only single line from the file.
        echo fgets($myfile, filesize("webdictionary.txt"));

        fclose($myfile);
    ?> -->

    <!-- <?php
        $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
        // Output one line until end-of-file
        while(!feof($myfile)) {
        echo fgets($myfile) . "<br>";
        }
        fclose($myfile);
    ?> -->

    <!-- <?php
        # The fgetc() function is used to read a single character from a file.

        $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
        // Output one character until end-of-file
        while(!feof($myfile)) {
        echo fgetc($myfile);
        }
        fclose($myfile);
    ?> -->

    <!-- Writing to a file in PHP -->

    <?php
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

        $txt = "Abhigyan Srivastava\n";

        fwrite($myfile, $txt);

        $txt = "Jane Doe\n";
        fwrite($myfile, $txt);
        fclose($myfile);

        // Appending to the same file

        $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
        $txt = "Donald Duck\n";
        fwrite($myfile, $txt);
        $txt = "Goofy Goof\n";
        fwrite($myfile, $txt);
        fclose($myfile);
    ?>
</body>
</html>