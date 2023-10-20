<?php

namespace App\ProductionEquipment\EnumBased;

use App\Price\CurrencyInterface;
use App\Product\ProductInterface;
use App\ShelfTime\ShelfTimeInterface;
use App\ProductionEquipment\ProductionEquipmentInterface;
use App\Product\EnumBased\Product;
use App\Product\Type;

class ProductionEquipment implements ProductionEquipmentInterface
{
    private int $id;
    public function __construct(private readonly int $unitsPerHour, private Type $type)
    {
        $this->id = hexdec(uniqid());
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUnitsPerHour(): int
    {
        return $this->unitsPerHour;
    }

    public function getType(): string
    {
        return $this->type->toString();
    }

    public function produce(CurrencyInterface $price, ShelfTimeInterface $shelfTime): ProductInterface
    {
        return new Product($this->type, $price, $shelfTime);
    }
}