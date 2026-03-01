<?php
include "db_conn.php";
$id = $_GET['id'];
$sql = "DELETE FROM `menu_products` WHERE id=$id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: menu_products_index.php?msg=Record deleted successfully");
}
else {
    echo "Failed :" . mysql_error($conn);
}
?>