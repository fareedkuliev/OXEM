<?php

namespace App\Product;

enum Type: string
{
    case CHOCOLATE = 'chocolate';
    case CAKE = 'cake';
    case ICE_CREAM = 'ice-cream';

    public function toString(): string
    {
        return $this->value;
    }
}