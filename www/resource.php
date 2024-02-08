<?php


if (!isset($_GET["name"])) {
    die();
}

$availableFiles = scandir("../resources/");

if (in_array($_GET["name"], $availableFiles)) {
    $name = "../resources/" . $_GET["name"];

    $fp = fopen($name, 'rb');

    if ($fp) {
        // is an image...
        if (str_ends_with($name, ".png") or str_ends_with($name, ".jpg") or str_ends_with($name, ".jpeg") or str_ends_with($name, ".webp")) 
        {
            header("Content-Type: image/png");
            header("Content-Length: " . filesize($name));
        }
        elseif (str_ends_with($name, ".css")) // is css
        {
            header("Content-Type: text/css");
            header("Content-Length: " . filesize($name));
        }
        else // everything else is text
        {
            header("Content-Type: text/plain");
            header("Content-Length: " . filesize($name));
        }

        fpassthru($fp);

        fclose($fp);
    } else {
        die("Error opening file");
    }

} else {
    die();
}

