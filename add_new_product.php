<?php
include "db_conn.php";

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image_path = $_POST['image_path'];

    $sql = "INSERT INTO `products`(`id`, `name`, `price`, `image_path`) 
    VALUES (NULL, '$name', '$price', '$image_path')";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: products_index.php?msg=New record created successfully");
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

        <title>PHP Restaurant Products</title>
    </head>
    <body>
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
        style="background-color: #209043;">
            PHP Potato Corner Fries Products
        </nav>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Add New Product</h3>
                <p class="text-muted">Enter the product's details to add it</p>
            </div>

            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width:50vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Name:</label>
                            <input type="text" class="form-control" name="name"
                            placeholder="Name">
                        </div>
                        <div class="col">
                            <label class="form-label">Price:</label>
                            <input type="text" class="form-control" name="price"
                            placeholder="Price">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image Path:</label>
                        <input type="text" class="form-control" name="image_path"
                        placeholder="Image Path">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="products_index.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
    </body>
</html>