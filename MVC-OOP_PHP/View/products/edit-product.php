<?php
include "../layout/header.php";
include "../../Model/product.php";
include "../../database/database.php";

//connect data
$conn=new database();
$connection=$conn->conn();

if(isset($_POST['edit'])){
    $id=$_POST['id'];
    $product = new product(" "," "," "," ");
    $product->editProduct($connection, $id);
}
?>

<?php include "../layout/footer.php";?>