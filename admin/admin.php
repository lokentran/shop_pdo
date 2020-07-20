<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <?php

        if(isset($_GET['page'])) {
            switch ($_GET['page']) {
                case 'list-product':
                    $controller->getAllProduct();
                    break;
                case 'add-product':
                    $controller->addProduct();
                    break;
                case 'delete-product':
                    $controller->deleteProduct();
                    break;
 
                case "edit-product":
                    $controller->editProduct();
                    break;  

                case "edit-category":
                    $categoryController->editCategory();
                    break;  
                case "add-category":
                    $categoryController->addCategory();
                    break;  
                case "delete-category":
                    $categoryController->deleteCategory();
                    break;  
                case "list-category":
                    $categoryController->getAllCategory();
                    break;  


                case "list-user":
                    $userController->getAllUser();
                    break;   
                case "add-user":
                    $userController->addUser();
                    break;   

                case "add-to-cart":
                    $cartController->addToCart();
                    break;   
            }
        } else{
            $controller->getAllProduct();
        }
 
    ?>
</body>
</html>

