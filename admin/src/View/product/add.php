<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name='product-name'>
    <input type="number" name='product-price'>
    <input type="file" name='my-file'>
    <select name="category_id" id="">
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category->getId() ?>"><?php echo $category->getName(); ?></option>
        <?php endforeach; ?>
    </select>
    
    <button type="submit" name="sbm">Add</button>
</form>