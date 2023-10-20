<?php

namespace App\Product;

use App\Price\CurrencyInterface;
use App\ShelfTime\ShelfTimeInterface;

interface ProductInterface
{
    public function getType(): string;
    public function getPrice(): CurrencyInterface;
    public function getShelfTime(): ShelfTimeInterface;
    public function getProductionTime(): int;
}
