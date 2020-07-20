<a href="index.php?page=add-category">Add category</a>
<table>
    <tr>
        <th>STT</th>
        <th>Name</th>
    </tr>

    <?php if(empty($categories)): ?>
        No data
    <?php else: ?>
    <?php foreach($categories as $key=>$category): ?>    
        <tr>
            <td><?php echo ++$key; ?></td>
            <td><?php echo $category->getName() ?></td>
            <td>
                <a href="index.php?page=edit-category&id=<?php echo $category->getId() ?>">Edit</a>
                <a href="index.php?page=delete-category&id=<?php echo $category->getId() ?>">Delete</a>
            </td>
        </tr>


    <?php endforeach; ?>
    <?php endif; ?>

    

</table>