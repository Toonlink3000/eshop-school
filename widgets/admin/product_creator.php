<?php
namespace ProductCreator;

function Render() 
{
    ?>
    <form class="inline_form" action="admin/add_product.php" method="POST">
        <label>Title: </label>
        <input type="text" name="title" required>
        <label>Spec: </label>
        <input type="text" name="spec" required>
        <label>Resources: </label>
        <input type="text" name="resources" required>
        <label>Price: </label>
        <input value="100" type="number" name="price" required>
        <label>Stock: </label>
        <input type="number" value="1", name="stock" required>
        <label>Category: </label>
        <input type="text", name="category" required>
        <button type="submit">Submit</button>
    </form>
    <?php
}