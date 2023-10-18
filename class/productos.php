<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class Producto {
    
    public $id;
    
    public $name;

    public $description;

    public $image;
    
    public $price;
    
    public function __construct(string $name, float $price, string $image, string $description)
    {
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        $this->description = $description;
    }
}