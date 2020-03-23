<?php


namespace App\Models;


class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    public function __construct(
        string $sku,
        string $name,
        string $type,
        int $price
    )
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
    }


    public function getSku(): string
    {
        return $this->sku;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): string
    {
        return '$' . $this->formatPrice($this->price);
    }

    private function formatPrice(int $price): float
    {
        return $price / 100;
    }

    public function getType(): string
    {
        return $this->type;
    }

}