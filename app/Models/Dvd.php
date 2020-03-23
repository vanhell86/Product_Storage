<?php


namespace App\Models;


class Dvd extends Product
{

    private $size;

    public function __construct(
        $sku,
        $name,
        $type,
        $price,
        $size
    )
    {
        parent::__construct($sku, $name, $type, $price);
        $this->size = $size;
    }

    public static function create(array $attribute)
    {
        return new Dvd(
            $attribute['sku'],
            $attribute['name'],
            $attribute['type'],
            $attribute['price'],
            $attribute['size']
        );
    }

    public function getSize()
    {
        return $this->size;
    }
}