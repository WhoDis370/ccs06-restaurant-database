<?php
include "db_conn.php";
$id = $_GET['id'];

if(isset($_POST['submit'])) {
    $menu_id = $_POST['menu_id'];
    $product_id = $_POST['product_id'];

    $sql = "UPDATE `menu_products` SET `menu_id`='$menu_id', `product_id`='$product_id' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: menu_products_index.php?msg=Menu product updated successfully");
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
                <h3>Edit Menu Product Information</h3>
                <p class="text-muted">Update the menu and product information</p>
            </div>

            <?php
            $sql_menu = "SELECT `id` FROM `menu`";
            $menu_result = mysqli_query($conn, $sql_menu);
            $row_menu = mysqli_fetch_assoc($menu_result);

            $sql_product = "SELECT `id` FROM `products`";
            $product_result = mysqli_query($conn, $sql_product);
            $row_product = mysqli_fetch_assoc($product_result);

            $sql_menu_products = "SELECT * FROM `menu_products` WHERE id= ".$_GET['id']." LIMIT 1";
            $menu_product_result = mysqli_query($conn, $sql_menu_products);
            $row_menu_product = mysqli_fetch_assoc($menu_product_result);
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
                                <option value="<?php echo $row_menu_product['menu_id'] ?>" disabled selected hidden><?php echo $row_menu_product['menu_id'] ?></option>
                            </select>
                        </div>

                        <div class="col">
                            <label class="form-label">Product ID:</label>
                            <select class="form-control" name="product_id">
                                <?php foreach($product_result as $row_product): ?>
                                    <option value="<?php echo $row_product['id'] ?>"><?php echo $row_product['id'] ?></option>
                                <?php endforeach; ?>
                                <option value="<?php echo $row_menu_product['product_id'] ?>" disabled selected hidden><?php echo $row_menu_product['product_id'] ?></option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Update</button>
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