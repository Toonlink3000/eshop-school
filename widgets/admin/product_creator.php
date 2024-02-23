<?php
namespace ProductCreator;

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
        <input value="100" type="number">
        <label>Stock: </label>
        <input type="number" value="1">
        <label>Category: </label>
        <input type="text">
    </form>
    <?php
}