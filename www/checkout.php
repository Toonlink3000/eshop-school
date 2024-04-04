<?php 
require_once "../widgets/style.php";
require_once "../widgets/footer.php";
require_once "../widgets/product_display.php";
require_once "../widgets/script.php";

?>
<html>
    <head>
    <?php
    \Script\Render();
    \Style\Render();
    ?>
    </head>
    <body>
<?php
    
if (\User\GetCurrentElevation > -1) 
{
    if (sizeof \User\CurrentBasket() === 0)
    {
        ?> <h1>Please add some items into your basket to checkout.</h1> <?php
    }
    else if (!empty($_POST["confirmation"]))
    {
        $status = \User\Checkout();

        if ($status == false)
        {
            echo ("<h1>Checkout failed, please contact the administrator.</h1>");
        }
        else
        {
            echo ("<h1>Checkout successfull!</h1>");
        }
        
    }
    else
    {
        ?> <h1>Please enter shipping info: </h1> <?php
    }
}

else 
{
    echo("<h1>Please log in or create an account to check out.</h1>");
}
?>
    </body>
</html>
