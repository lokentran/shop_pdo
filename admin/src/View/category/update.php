<form action="" method="post">
    <input type="text" name="id" placeholder="Id" value="<?php echo $category['id']?>" hidden>
    <input type="text" name="name" placeholder="Name" value="<?php echo $category['name']?>">
    <input type="text" name="country" placeholder="Country" value="<?php echo $category['country']?>">
    <input type="submit" value="UPDATE">
</form>
<a href="index.php?page=list-category" class="btn btn-primary">Cancel</a>