<?php


namespace App\Models;


class Book extends Product
{
    private $weight;

    public function __construct(
        $sku,
        $name,
        $type,
        $price,
        $weight
    )
    {
        parent::__construct($sku, $name, $type, $price);
        $this->weight = $weight;
    }

    public static function create(array $attribute)
    {
        return new Book(
            $attribute['sku'],
            $attribute['name'],
            $attribute['type'],
            $attribute['price'],
            $attribute['weight']
        );
    }

    public function getWeight()
    {
        return $this->weight / 1000;
    }
}