<a href="index.php?page=add-user">Add User</a>
<table>
    <tr>
        <th> User STT</th>
        <th> User name</th>
    </tr>

    <?php foreach($users as $key=>$user ) : ?> 
        <tr>
            <td><?php echo $user->getId() ?></td>
            <td><?php echo $user->getUserName() ?></td>
            <td><a href="index.php?page=add-user&id=<?php echo $user->getId()?>">Edit</a><a onclick ="return confirm('Bạn có chắc chắn muốn xóa?')" href="index.php?page=delete-user&id=<?php echo $user->getId()?>">Delete</a></td>
        </tr>

    <?php endforeach;?> 

</table>