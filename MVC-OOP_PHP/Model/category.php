<?php

class category
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    function AddCategory($connection){
        $sql="INSERT INTO categories (name) VALUES ('$this->name')";
        $connection->exec($sql);
//        echo "New record created successfully";
    }
}
