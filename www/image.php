<?php 

if (!isset($_GET["name"])) {
    die();
}

$availabeImages = scandir("../images/");

foreach($availabeImages as $image) {
    if($image == "." || $image == "..") {
        continue;
    }
    if ($image == $_GET["name"]) {
        break;
    }

}

// respond with a image
header("Content-Type: image/png");

?>