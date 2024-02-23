<?php 
require_once "../widgets/topbar.php";
require_once "../widgets/style.php";
require_once "../widgets/footer.php";
require_once "../widgets/script.php";
require_once "../utils/user.php";

if (isset($_POST["username"]) && isset($_POST["password"]) ) 
{
    $result = \User\Login( $_POST["username"], $_POST["password"] );
    if ( $result == true ) 
    {
        header("Location: index.php");
        die();
    }
    else 
    {
    }

}
else 
{
    die("Invalid POST parameters (urlencoded please)");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php 
            \Script\Render();
            \Style\Render(); 
        ?>
    </head>
    <body>
        <?php 
            \TopBar\Render();
        ?>
        <div id="webcontent">
            <h1>Invalid username or password!</h1>
        </div>
        <?php 
            \Footer\Render();
        ?>
    </body>
</html>

