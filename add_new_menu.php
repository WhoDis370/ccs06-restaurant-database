<?php
include "db_conn.php";

if(isset($_POST['submit'])) {
    $name = $_POST['name'];

    $sql = "INSERT INTO `menu`(`id`, `name`, `date_created`, `date_updated`, `date_deleted`) 
    VALUES (NULL, '$name', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL)";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: menu_index.php?msg=New record created successfully");
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

        <title>PHP Restaurant Menu</title>
    </head>
    <body>
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
        style="background-color: #209043;">
            PHP Potato Corner Fries Menu
        </nav>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Add New Menu</h3>
                <p class="text-muted">Enter the menu's name to add it</p>
            </div>

            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width:50vw; min-width:300px;">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name"
                        placeholder="Potato Corner Fries Menu">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="menu_index.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
    </body>
</html>