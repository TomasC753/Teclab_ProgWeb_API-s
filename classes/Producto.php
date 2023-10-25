<?php

namespace classes;

use classes\utils\Model;

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
class Producto extends Model {

    static protected $table = "products";
    
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