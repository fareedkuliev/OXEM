<?php

include __DIR__ . '/public/index.php';

use App\Factory;
use App\Product\Type;
use App\ProductionEquipment\EquipmentCreator;

$factory = new Factory();
$creator = new EquipmentCreator();

$factory
    ->addEquipment($creator->fromEnum(1, Type::ICE_CREAM))
    ->addEquipment($creator->fromEnum(1, Type::ICE_CREAM))
    ->addEquipment($creator->fromEnum(1, Type::ICE_CREAM));

$factory
    ->addEquipment($creator->fromEnum(2, Type::CHOCOLATE))
    ->addEquipment($creator->fromEnum(2, Type::CHOCOLATE));

$factory
    ->addEquipment($creator->fromEnum(1, Type::CAKE));

echo 'EQUIPMENT: ' . PHP_EOL;
var_dump($factory->countEquipment());

$factory->runFor(12);

echo 'PRODUCTS: ' . PHP_EOL;
var_dump($factory->countProducts());

$factory
    ->addEquipment($creator->fromEnum(2, Type::ICE_CREAM))
    ->addEquipment($creator->fromEnum(3, Type::CAKE));

echo 'EQUIPMENT: ' . PHP_EOL;
var_dump($factory->countEquipment());

$factory->runFor(12);

echo 'PRODUCTS: ' . PHP_EOL;
var_dump($factory->countProducts());

