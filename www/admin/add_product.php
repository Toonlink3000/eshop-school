<?
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

if 
(
    isset($_POST["title"]) && 
    isset($_POST["spec"]) && 
    isset($_POST["resources"]) && 
    isset($_POST["price"]) && 
    isset($_POST["stock"]) && 
    isset($_POST["category"])
)
{
    $status = \Products\CreateProduct(
        $_POST["title"],
        $_POST["spec"],
        $_POST["resources"],
        $_POST["price"],
        $_POST["stock"],
        $_POST["category"]
    );

    if ($status == false) 
    {
        header("Location: ../admin.php?message=\"Internal server error in database query.\"");
        http_response_code(500);
        die("Internal server error in database query.");
    }
}
else 
{
    http_response_code(400);
    die("bad request");
}

header("Location: ../admin.php?message=\"Product created succesfully\"");