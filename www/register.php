<?php 
require_once "../widgets/topbar.php";
require_once "../widgets/style.php";
require_once "../widgets/footer.php";
require_once "../widgets/script.php";
require_once "../utils/user.php";

$reg_fail = false;

if (isset($_POST["username"]) && isset($_POST["password"])) // user is trying to registwer
{
    
    $result = \User\CreateAccount($_POST["username"], $_POST["password"]);
    if ($result != null) 
    {
        header("Location: index.php");
        die();
    }
    $reg_fail = true;
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
            <h1>Register</h1>
            <?php 
                if ($reg_fail == true) 
                {
                    echo "<h2>Registration failed, please contact an administrator to resolve the issue</h2>";
                }
            ?>
            <form method="POST" action="register.php">
                <label><?php echo \Config\GetObject("usernameprompt"); ?></label>
                <input type="text" name="username"><br>
                <label><?php echo \Config\GetObject("passwordprompt"); ?></label>
                <input type="password" name="password"><br>
                <button type="submit"><?php echo \Config\GetObject("registerbutton"); ?></button>
            </form>
        </div>
        <?php 
            \Footer\Render();
        ?>
    </body>
</html>

