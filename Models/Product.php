<?php 

class Product{

    private static $idCounter = 0;

    public $id;
    public $name;
    public $price;
    public $category;
    public $stockQuantity;

    public function getId(): int {
        return $this->id;
    }
    public function forceId($id):void {
        $this->id = $id;
    }
    public function setId(): void {
        $this->forceId(self::$idCounter);
        self::$idCounter++;
    }

    // getters and setters
    public function getName(): string {
        return $this->name;
    }
    public function setName($name): void {
        $this->name = $name;
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function setPrice($price): void {
        $this->price = $price;
    }
    public function getCategory(): string {
        return $this->category;
    }
    public function setCategory($category): void {
        $this->category = $category;
    }
    public function getStockQuantity(): int {
        return $this->stockQuantity;
    }
    public function setStockQuantity($stockQuantity): void {
        $this->stockQuantity = $stockQuantity;
    }

    public function __construct($name = "", $price = 0.0, $category = "", $stockQuantity = 0) {

        $this->setId();
        $this->setName($name);
        $this->setPrice($price);
        $this->setCategory($category);
        $this->setStockQuantity($stockQuantity);
    }

    public function toArray(): array {
        $productInArray = [];

        $productInArray["id"] = $this->id;
        $productInArray["name"] = $this->name;
        $productInArray["price"] = $this->price;
        $productInArray["category"] = $this->category;
        $productInArray["stockQuantity"] = $this->stockQuantity;

        return $productInArray;
    }
}