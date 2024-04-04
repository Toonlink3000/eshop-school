<?php 
require_once "../utils/user.php";

<?php

?>
    
if (\User\GetCurrentElevation > -1) 
{
    if (sizeof \User\CurrentBasket() === 0)
    {
        <?php <h1>Please add some items into your basket to checkout.</h1> ?>
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
        <?php <h1>Please enter shipping info: </h1> ?>
    }
}

else 
{
    echo("<h1>Please log in or create an account to check out.</h1>");
}
<?php

?>
