<form action="" method="post">
    <input type="text" name="name" value="<?php echo $product['product_name'] ?>">
    <input type="text" name="price" value="<?php echo $product['product_price'] ?>">
    <input type="submit" name="sbm" value="Edit">
    <a href="admin.php" >Cancel</a>
</form>