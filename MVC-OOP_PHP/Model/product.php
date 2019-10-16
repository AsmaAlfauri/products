<?php

class product
{
private $name;
private $description;
private $price;
private $category_id;

    /**
     * product constructor.
     * @param $name
     * @param $description
     * @param $price
     * @param $category_id
     */
    public function __construct($name, $description, $price, $category_id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
    }


    function AddProduct($connection){
       $sql="INSERT INTO products (name,description,price,category_id)
 VALUES('$this->name','$this->description',$this->price,$this->category_id)";
    $connection->exec($sql);
    }

    function deleteProduct($connection,$id){
        $sql = "DELETE FROM products WHERE id=$id";
        return $connection->exec($sql);
    }

function editProduct (){

}
}

