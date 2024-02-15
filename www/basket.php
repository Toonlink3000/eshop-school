<?php 
require_once "../utils/user.php";
require_once "../utils/products.php";

header("ContentType: application/json");

$postdata = file_get_contents("php://input");
$post = json_decode($postdata, true);

if ($post != null && count($post) > 0) 
{
    try 
    {
        $item = $post["item"];
        $itint = intval($item);
    }
    catch (Exception $e)
    {
        die("whattheheckisgoinon");
    }
    \User\AddToBasket($itint);
    die(json_encode(array("status"=> true)));
}

//var_dump(\User\CurrentBasket());
if (sizeof(\User\CurrentBasket()) === 0) 
{
    die(json_encode(array("status"=> false)));
}

$basket = \User\CurrentBasket();
$stringified = array();
foreach ($basket as $key => $value) 
{
    $stringified[$key] = \Products\GetProduct($value)["title"];
}

$result = array("items" => $stringified);
$result["status"] = true;



echo json_encode($result);

?>