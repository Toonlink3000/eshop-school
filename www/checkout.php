<?php 
require_once "../widgets/style.php";
require_once "../widgets/footer.php";
require_once "../widgets/topbar.php";
require_once "../widgets/product_display.php";
require_once "../widgets/script.php";
require_once "../utils/user.php";

?>
<html>
    <head>
    <?php
    \Script\Render();
    \Style\Render();
    ?>
    </head>
    <body>
<?php \TopBar\Render() ?>
<?php
    
if (\User\CurrentElevation() > -1) 
{
    if (sizeof(\User\CurrentBasket()) === 0)
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
        ?> <h1>Please enter shipping info: </h1>
           <form action="checkout.php" method="POST">
            <label>First name: </label>
            <input type="text" name="firstname"><br>
            <label>Last name:</label>
            <input type="text" name="lastname"><br>
            <label>Country: </label>
            <input type="text" name="country"><br>
            <label>State: </label>
            <input type="text" name="state"><br>
            <label>Street and house number: </label>
            <input type="text" name="street"><br>
            <input type="hidden" name="confirmation" value="true">
            <input type="button" value="Checkout!">
           </form>

        <?php
    }
}

else 
{
    echo("<h1>Please log in or create an account to check out.</h1>");
}
?>
    <?php \Footer\Render() ?>
    </body>
</html>
