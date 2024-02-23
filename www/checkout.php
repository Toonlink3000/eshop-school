<?php 
require_once "../utils/user.php";

$status = \User\Checkout();

if ($status == false) 
{
    die("err");
}
header("Location: index.php");
die("done");