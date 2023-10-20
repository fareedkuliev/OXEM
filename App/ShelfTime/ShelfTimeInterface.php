<?php

namespace App\ShelfTime;

interface ShelfTimeInterface
{
    const SECONDS_PER_HOUR = 3600;
    public function getHours(): int;
    public function getSeconds(): int;
}