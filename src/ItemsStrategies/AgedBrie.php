<?php

namespace App\ItemsStrategies;

use App\Interfaces\ItemsInterface;
use App\Item;

class AgedBrie implements ItemsInterface
{
    /**
     * @param Item $item
     * @return void
    */
    public function applyDecrement(Item $item) : void
    {
        $item->sellIn = $item->sellIn - 1;

        if ($item->quality < 50) {
            $item->quality = $item->quality + 1;
        }

        if (($item->sellIn < 0) and ($item->quality < 50)) {
            $item->quality = $item->quality + 1;
        }
    }
}
