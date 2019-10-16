<?php
include "../layout/header.php";
include "../../database/database.php";
include "../../Model/product.php";
include  "../../Model/category.php";

//connect data
$conn=new database();
 $connection=$conn->conn();

// to set data to product.php
if(isset($_POST['submit'])) {
    $product = new product($_POST['name'],$_POST['description'],$_POST['price'],$_POST['category_id']);
     $product->AddProduct($connection);

}
?>
<div class="container " style="width: 50%;margin: 0 auto">

<form method="post" action="<?php $_SERVER["PHP_SELF"];?>">
    <div class="form-group">
        <label for="exampleInputEmail1"> Product Name</label>
        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="write the name of your product">
    </div>
    <div class="form-group">
        <label>description</label>
        <input name="description" type="text" class="form-control"  placeholder="write the description of your product">
    </div>
    <div class="form-group">
        <label>Price</label>
        <input name="price" type="text" class="form-control"  placeholder="write the price of your product">
    </div>
    <div>
        <label for="exampleFormControlSelect1">categories</label>
        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
            <?php
            $sql_Category="SELECT * FROM categories";
            $category_data = $connection->query($sql_Category);
            $category_data->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($category_data as $row) {?>
                <option value="<?php echo htmlspecialchars( $row['id'])?>">
                    <?php echo htmlspecialchars( $row['name'])?>
                </option>
           <?php } ?>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php
include "../layout/footer.php"?>