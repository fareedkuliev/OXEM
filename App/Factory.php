<?php

namespace App;

use App\Price\CurrencyInterface;
use App\Price\RUB;
use App\Product\ProductInterface as Product;
use App\ProductionEquipment\ProductionEquipmentInterface as Equipment;
use App\ShelfTime\ShelfTime;

class Factory
{
    /**
     * @var $equipmentStorage Equipment[]
     */
    private array $equipmentStorage = [];

    /**
     * @var Product[]
     */
    private array $productStorage = [];
    public function addEquipment(Equipment $equipment ): static
    {
        $this->equipmentStorage[spl_object_hash($equipment)] = $equipment;

        return $this;
    }

    public function runFor(int $hours): static
    {
        array_walk($this->equipmentStorage, function (Equipment $equipment) use ($hours) {
            $this->runEquipmentFor($equipment, $hours);
        });

        return $this;
    }

    private function runEquipmentFor(Equipment $equipment, int $hours):void
    {

        $totalUnitsNumber = $equipment->getUnitsPerHour() * $hours;
        for ($i = 0; $i < $totalUnitsNumber; $i ++){
            $this->productStorage[] = $equipment->produce(new RUB(rand(10, 20)), ShelfTime::fromHours(rand(10,20)));
        }

    }

    public function countEquipment(): array
    {
        $result = [];
        array_walk($this->equipmentStorage, function (Equipment $equipment) use (&$result) {
            $type = $equipment->getType();
            isset($result[$type]) ? $result[$type]['number']++ : $result[$type] = [
                'type' => $type,
                'number' => 1
            ];
        });
        return array_values($result);

    }

    public function countProducts(): array
    {
        $result = [];
        array_walk($this->productStorage, function (Product $product) use (&$result) {
            $type = $product->getType();
            if(isset($result[$type])) {
                $result[$type]['number']++;
                $result[$type]['total_cost'] = $result[$type]['total_cost']->add($product->getPrice());
            } else {
                $result[$type] = [
                    'type' => $type,
                    'number' => 1,
                    'total_cost' => $product->getPrice()
                ];
            }
        });

        $result = array_values($result);
        $result['total_cost'] = array_reduce(
            $result,
            fn(?CurrencyInterface $cost, array $type,) => isset($cost)
            ? $cost->add($type['total_cost'])
            : $type['total_cost']
        );

        return $result;
    }
}