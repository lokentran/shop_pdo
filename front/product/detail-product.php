
<div class="container">
    <div class="row box-detail">
        <div class="col-md-6">
            <img src="admin/<?php echo $product['img'] ?>" alt="">
        </div>
        <div class="col-md-6">
            <div class="box-detail">
                <h1><?php echo $product['name'] ?></h1>
                <p>Giá bán: <?php echo $product['price'] ." VNĐ"; ?></p>
                <a class="btn btn-primary" href="index.php?page=list-cart&id=<?php echo $product['id']?>">Add To Cart</a>
            </div>
        </div>

    </div>
</div>