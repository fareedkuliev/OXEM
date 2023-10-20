<?php

namespace App\Price;

class RUB implements CurrencyInterface
{
    public function __construct(private readonly int $value)
    {
    }

    public function value(): int
    {
        return $this->value;
    }

    public function string(): string
    {
        return 'RUB' . $this->value;
    }

    public function add(CurrencyInterface $price): static
    {
        return new RUB($this->value + $price->value);
    }

    public function __toString(): string
    {
        return $this->string();
    }
}
