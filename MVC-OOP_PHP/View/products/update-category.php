<?php
include "../layout/header.php";
include "../../Model/category.php";
include "../../database/database.php";

//connect data
$conn=new database();
$connection=$conn->conn();
?>

<div style="width: 50%;margin: 0 auto">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <?php
        $sql_Category="SELECT * FROM categories";
        $category_data = $connection->query($sql_Category);
        $category_data->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($category_data as $row) {?>
                <tbody>
                <tr>
                    <th scope="row"><?php echo htmlspecialchars($row['id'])?></th>
                    <td><?php echo htmlspecialchars($row['name'])?></td>
                    <td><button type="submit" name="edit" class="btn btn-primary">Edit</button></td>
                    <td><button type="submit" name="update" class="btn btn-primary">Delete</button></td>
                </tr>
                </tbody>
        <?php } ?>
    </table>
</div>

<?php
include "../layout/footer.php";
?>
