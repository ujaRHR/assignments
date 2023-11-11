<?php
// Reajul Hasan Raju -- Assignments (Module 4)

class Product {
    private $id;
    private $name;
    private $price;

    public function __construct($id, $name, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    //Formatted Price
    public function getFormattedPrice() {
        return '$' . number_format($this->price, 2);
    }

    //Product Details
    public function showDetails() {
        echo "Product Details:\n";
        echo "- ID: {$this->id}\n";
        echo "- Name: {$this->name}\n";
        echo "- Price: {$this->getFormattedPrice()}\n";
    }
}


$product = new Product(21, 'Versace Vanille Rouge', 330);
$product->showDetails();
