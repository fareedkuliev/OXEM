<?php

namespace App\ShelfTime;

class ShelfTime implements ShelfTimeInterface
{
    public function __construct(private readonly int $seconds)
    {
    }

    public function getHours(): int
    {
        return $this->seconds / self::SECONDS_PER_HOUR;
    }

    public function getSeconds(): int
    {
        return $this->seconds;
    }

    public static function fromHours(int $hours): static
    {
        return new static($hours * self::SECONDS_PER_HOUR);
    }

}