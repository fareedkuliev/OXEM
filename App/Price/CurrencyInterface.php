<?php

namespace App\Price;

interface CurrencyInterface extends \Stringable
{
    public function value(): int;
    public function string(): string;
    public function add(self $price): static;
}

