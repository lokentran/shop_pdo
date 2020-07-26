<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="images/logo.svg" alt=""></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Products <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="index.php?page=search-product&id=1">Iphone</a>
                        <a class="dropdown-item" href="index.php?page=search-product&id=2">SamSung</a>
                        <a class="dropdown-item" href="index.php?page=search-product&id=3">Oppo</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=list-cart"><i class="fas fa-shopping-cart"></i></a>
                </li>
            </ul>
            <!--                <form class="form-inline my-2 my-lg-0">-->
            <!--                    <input class="form-control mr-sm-2" type="text" placeholder="Search">-->
            <!--                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
            <!--                </form>-->
        </div>
    </div>
</nav>
<?php //var_dump($categories); ?>