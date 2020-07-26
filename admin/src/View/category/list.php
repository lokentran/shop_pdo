<style>
    th, td {
        text-align: center;
    }
</style>
<a href="index.php?page=add-category" class="btn btn-primary mt-3 mb-3">ADD NEW CATEGORY</a>

<form action="index.php?page=search-category" method="post">
    <input type="text" name="keyword" placeholder="Search Category By Name">
    <input type="submit" value="Search" class="btn btn-primary">
</form>
<a href="index.php?page=list-category" class="btn btn-primary">Cancel</a>
<div class="pt-3">
    <table border="0" class="table table-hover">
        <thead class="badge-dark">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Country</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <?php if (empty($categories)): ?>
            <tr>
                <td>No data</td>
            </tr>
        <?php else: ?>
        <?php foreach ($categories as $key => $category) : ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $category->getName() ?></td>
            <td><?php echo $category->getCountry() ?></td>
            <td><a href="index.php?page=update-category&id=<?php echo $category->getId() ?>" class="btn btn-primary">UPDATE</a></td>
            <td><a href="index.php?page=delete-category&id=<?php echo $category->getId() ?>" class="btn btn-danger">DELETE</a></td>
            <?php endforeach; ?>
            <?php endif; ?>
    </table>
</div>