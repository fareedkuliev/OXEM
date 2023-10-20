<?php

namespace  App\ProductionEquipment;

use App\Product\Type;
use App\ProductionEquipment\EnumBased\ProductionEquipment;

class EquipmentCreator
{
    public function fromEnum(int $unitsPerHour, Type $type): ProductionEquipmentInterface
    {
        return new ProductionEquipment($unitsPerHour, $type);
    }
}