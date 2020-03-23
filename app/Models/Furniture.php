<?php


namespace App\Models;


class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function __construct(
        $sku,
        $name,
        $type,
        $price,
        $height,
        $width,
        $length
    )
    {
        parent::__construct($sku, $name, $type, $price);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public static function create(array $attribute)
    {
        return new Furniture(
            $attribute['sku'],
            $attribute['name'],
            $attribute['type'],
            $attribute['price'],
            $attribute['height'],
            $attribute['width'],
            $attribute['length']
        );
    }

    public function getDimensions()
    {
        return $this->getHeight() / 100 . ' x ' . $this->getWidth() / 100 . ' x ' . $this->getLength() / 100;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getLength()
    {
        return $this->length;
    }
}