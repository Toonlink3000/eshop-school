<?php 
namespace ActionRibbon;

function Render() 
{
    ?>
    <div id="action_ribbon">
        <button>Add Product</button>
        <button>Manage Users</button>
        <button>Manage Resources</button>
        <button onclick='window.location.replace("update.php")'>Update software from github</button>
    </div>
    <?php
}