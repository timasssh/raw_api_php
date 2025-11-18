<?php 

class Product{
    public $idCounter = 0;
    
    private $id;
    private $name;
    private $price;
    private $category;
    private $stockQuantity;

    public function getId(){
        return $this->id;
    }
    public function setId(){
        $this->id = $this->idCounter;
        $this->idCounter = $this->idCounter + 1;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price = $price;
    }

    public function getCategory(){
        return $this->category;
    }
    public function setCategory($category){
        $this->category = $category;
    }

    public function getStockQuantity(){
        return $this->stockQuantity;
    }
    public function setStockQuantity($stockQuantity){
        $this->stockQuantity = $stockQuantity;
    }

    public function __construct($name = "", $price = 0.0, $category = "", $stockQuantity = 0) {
        $this->setId();

        $this->setName($name);
        $this->setPrice($price);
        $this->setCategory($category);
        $this->setStockQuantity($stockQuantity);
    }
}