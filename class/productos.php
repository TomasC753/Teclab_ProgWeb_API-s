<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class Producto {
    
    public $id;
    
    public $name;
    
    public $price;
    
    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}