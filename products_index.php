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

        <title>PHP Restaurant Menu</title>
    </head>
    <body>
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
        style="background-color: #209043;">
            PHP Potato Corner Fries Products
        </nav>

        <div class="container">
            <?php
            if(isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    '.$msg.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            ?>
            <a href="add_new_product.php" class="btn btn-dark mb-3">Add New Product</a>

            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "db_conn.php";

                        $sql = "SELECT * FROM `products`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo "₱" . $row['price'] ?></td>
                                    <td><img src="<?php echo $row['image_path'] ?>" width="100" height="100"></td>
                                    <td>
                                        <a href="edit_product.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square
                                        fs-5 me-3"></i></a>
                                        <a href="delete_product.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                                </tr>
                            <?php
                        }
                    ?>

                </tbody>
            </table>
            <a href="menu_products_index.php" class="btn btn-dark mb-3">< Go to Menu Products</a>
            <a href="menu_index.php" class="btn btn-dark mb-3">Go to Menus ></a>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
    </body>
</html>