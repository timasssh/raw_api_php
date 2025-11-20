<?php 

class Product{
    public $id;
    public $name;
    public $price;
    public $category;
    public $stockQuantity;

    public function __construct($id = 0, $name = "", $price = 0.0, $category = "", $stockQuantity = 0) {

        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->stockQuantity = $stockQuantity;
    }
}