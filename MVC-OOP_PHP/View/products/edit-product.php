<?php
include "../layout/header.php";
include "../../Model/product.php";
include "../../database/database.php";

//connect data
$conn = new database();
$connection = $conn->conn();
$id = "";
$name = "";
$description = "";
$price = "";
$category_id = "";

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $product = new product(" ", " ", " ", " ");
    $get_product = $product->getProduct($connection, $id);

    $id = $get_product['id'];
    $name = $get_product['name'];
    $description = $get_product['description'];
    $price = $get_product['price'];
    $category_id = $get_product['category_id'];
}


if (isset($_POST['update-product'])) {
  header("Location: ../path/to/go");
}
?>
    <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
        <div class="form-group">
            <label for="exampleInputEmail1"> Product Name</label>
            <input value="<?php echo htmlspecialchars($name) ?>" name="name" type="text" class="form-control"
                   id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="write the name of your product">
        </div>
        <div class="form-group">
            <label>description</label>
            <input value="<?php echo htmlspecialchars($description) ?>" name="description" type="text"
                   class="form-control" placeholder="write the description of your product">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input value="<?php echo htmlspecialchars($price) ?>" name="price" type="text" class="form-control"
                   placeholder="write the price of your product">
        </div>
        <!--        <div>-->
        <!--            <label for="exampleFormControlSelect1">categories</label>-->
        <!--            <select class="form-control" id="exampleFormControlSelect1" name="category_id">-->
        <!--                --><?php
        //                $sql_Category="SELECT * FROM categories";
        //                $category_data = $connection->query($sql_Category);
        //                $category_data->setFetchMode(PDO::FETCH_ASSOC);
        //                foreach ($category_data as $row) {?>
        <!--                    <option value="--><?php //echo htmlspecialchars( $row['id'])?><!--">-->
        <!--                        --><?php //echo htmlspecialchars( $row['name'])?>
        <!--                    </option>-->
        <!--                --><?php //} ?>
        <!--            </select>-->
        <!--        </div>-->
        <button type="submit" name="update-product" class="btn btn-primary">Submit</button>
    </form>
<?php include "../layout/footer.php"; ?>