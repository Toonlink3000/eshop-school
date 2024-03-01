<?php 
require_once "../utils/user.php";


if (\User\GetCurrentElevation > -1) 
{
    $status = \User\Checkout();

    if ($status == false) 
    {
        die("err");
    }
    header("Location: index.php");
    die("done");
}

else 
{
    die "access denied.";
}
