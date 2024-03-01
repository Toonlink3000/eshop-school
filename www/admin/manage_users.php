<?php 
// to load the config correctly
chdir("..");
require_once "../utils/user.php";
require_once "../utils/products.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") 
{
    http_response_code(405);
    die("Method not allowed");
}

if (\User\CurrentElevation() != 10) 
{
    http_response_code(401);
    die("Unauthorized access");
}


// DELETE
if (isset($_POST["remove"]))
{
    \User\DeleteAccount(intval($_POST["remove"]));
}

// Change Elevation
if (isset($_POST["id"]), isset($_POST["elevation"]))
{
    \User\SetElevation(intval($_POST["id"]), intval($_POST["elevation"]));
}




else 
{
    http_response_code(400);
    die("Bad request");
}

header("Location: ../admin.php?message=\"Product created succesfully\"");