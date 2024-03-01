<?php
namespace UserManager;

require "../utils/user.php"

function Render() 
{
    $users = \User\GetAllAccounts(); 
    
    while ($user = $users->fetch_assoc();) 
    {
        echo "<form>";
        
        echo "</form>"
    }
}