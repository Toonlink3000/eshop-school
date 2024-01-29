<?php


if (!isset($_GET["name"])) {
    die();
}

$availableImages = scandir("../resources/");

if (in_array($_GET["name"], $availableImages)) {
    $name = "../resources/" . $_GET["name"];

    $fp = fopen($name, 'rb');

    if ($fp) {
        header("Content-Type: image/png");
        header("Content-Length: " . filesize($name));

        fpassthru($fp);

        fclose($fp);
    } else {
        die("Error opening file");
    }

} else {
    die();
}

?>