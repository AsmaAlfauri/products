<?php
include "../layout/header.php";
include "../../Model/product.php";
include "../../database/database.php";

//connect data
$conn=new database();
$connection=$conn->conn();
?>

<form style="width: 50%;margin: 0 auto" method="post">
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
                <td><button type="submit" name="edit" class="btn btn-primary">Edit</button></td>
                <td><button type="submit" name="update" class="btn btn-primary">Delete</button></td>
            </tr>
            </tbody>

        <?php } ?>
    </table>
</form>

<?php


include "../layout/footer.php";
?>

