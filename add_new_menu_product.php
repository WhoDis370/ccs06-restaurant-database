<?php
include "db_conn.php";

if(isset($_POST['submit'])) {
    $menu_id = $_POST['menu_id'];
    $product_id = $_POST['product_id'];

    $sql = "INSERT INTO `menu_products`(`id`, `menu_id`, `product_id`) 
    VALUES (NULL, '$menu_id', '$product_id')";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: menu_products_index.php?msg=New record created successfully");
    } else {
        echo "Failed: " . mysql_error($conn);
    }
}


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" 
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>PHP Restaurant Menu Product</title>
    </head>
    <body>
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
        style="background-color: #209043;">
            PHP Potato Corner Fries Menu Product
        </nav>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Add New Menu Product</h3>
                <p class="text-muted">Insert the menu and product to be added</p>
            </div>

            <?php
            $sql_menu = "SELECT `id` FROM `menu`";
            $menu_result = mysqli_query($conn, $sql_menu);
            $row_menu = mysqli_fetch_assoc($menu_result);

            $sql_product = "SELECT `id` FROM `products`";
            $product_result = mysqli_query($conn, $sql_product);
            $row_product = mysqli_fetch_assoc($product_result);
            ?>
            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width:50vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Menu ID:</label>
                            <select class="form-control" name="menu_id">
                                <?php foreach($menu_result as $row_menu): ?>
                                    <option value="<?php echo $row_menu['id'] ?>"><?php echo $row_menu['id'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col">
                            <label class="form-label">Product ID:</label>
                            <select class="form-control" name="product_id">
                                <?php foreach($product_result as $row_product): ?>
                                    <option value="<?php echo $row_product['id'] ?>"><?php echo $row_product['id'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="menu_products_index.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
    </body>
</html>