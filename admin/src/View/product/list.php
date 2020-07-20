<a href="index.php?page=add-product">Add Product</a>
<table>
    <tr>
        <th> Product STT</th>
        <th> Product name</th>
        <th> Product Price</th>
        <th>Img</th>
        <th>Category</th>
    </tr>

    <?php foreach($products as $key=>$product ) : ?> 
        <tr>
            <td><?php echo $product->getId() ?></td>
            <td><?php echo $product->getName() ?></td>
            <td><?php echo $product->getPrice() ?></td>
            <td><img src="<?php echo $product->getImg() ?>" alt="" /></td>
            <td><?php echo $product->getCategory_id() ?></td>
            <td>
            <a href="index.php?page=edit-product&id=<?php echo $product->getId()?>">Edit</a>
            <a onclick ="return confirm('Bạn có chắc chắn muốn xóa?')" href="index.php?page=delete-product&id=<?php echo $product->getId()?>">Delete</a>
            <a href="index.php?page=add-to-cart&id=<?php echo $product->getId()?>">Add To cart</a>
            </td>
        </tr>

    <?php endforeach;?> 

  
</table>