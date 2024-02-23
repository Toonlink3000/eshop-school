<?php
namespace ProductCreator;
require_once "../core.php";

function Render() 
{
    ?>
    <form action="admin.php" method="POST">
        <label>Title: </label>
        <input type="text">
        <label>Spec: </label>
        <input type="text">
        <label>Resources: </label>
        <input type="text">
        <label>Price: </label>
        <input type="number">
        <label>Stock: </label>
        <input type="number">
        <label>Category: </label>
        <input type="text">
    </form>
    <?php
}