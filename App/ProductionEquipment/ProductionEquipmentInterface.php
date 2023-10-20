<?php

namespace App\ProductionEquipment;

use App\Price\CurrencyInterface;
use App\Product\ProductInterface;
use App\ShelfTime\ShelfTimeInterface;

interface ProductionEquipmentInterface
{
    public function getId(): int;
    public function getType(): string;
    public function getUnitsPerHour(): int;
    public function produce(CurrencyInterface $price, ShelfTimeInterface $shelfTime): ProductInterface;
}