<?php
include "../layout/header.php";
include "../../Model/product.php";
include "../../database/database.php";

//connect data
$conn=new database();
$connection=$conn->conn();

if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $product = new product(" "," "," "," ");
    $product->deleteProduct($connection, $id);
}
?>

<div style="width: 50%;margin: 0 auto">
    <table class="table" >
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <?php
        $sql_product="SELECT * FROM products";
        $product_data = $connection->query($sql_product);
        $product_data->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($product_data as $row) {?>
            <tbody>
            <tr>
                <th scope="row"><?php echo htmlspecialchars($row['id'])?></th>
                <td><?php echo htmlspecialchars($row['name'])?></td>
                <td><?php echo htmlspecialchars($row['description'])?></td>
                <td><?php echo htmlspecialchars($row['price'])?></td>
                <form action="./edit-product.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                    <td><button type="submit" name="edit" class="btn btn-primary">Edit</button></td>
                </form>
                    <form method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <td><button type="submit" name="delete" class="btn btn-primary" >Delete</button></td>
                </form>
            </tr>
            </tbody>

        <?php } ?>
    </table>
</div>

<?php


include "../layout/footer.php";
?>

