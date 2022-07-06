<?php

namespace App;

class GildedRose
{
    private $items;
    private $enabled_item_types = [
        'Aged Brie' => \App\ItemsStrategies\AgedBrie::class, 
        'Backstage passes to a TAFKAL80ETC concert' => \App\ItemsStrategies\BackstagePase::class, 
        'Sulfuras, Hand of Ragnaros' => \App\ItemsStrategies\Sulfuras::class, 
        'normal' => \App\ItemsStrategies\Normal::class, 
        'Conjured Mana Cake' => \App\ItemsStrategies\Conjured::class, 
    ];

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItem($which = null)
    {
        return ($which === null
            ? $this->items
            : $this->items[$which]
        );
    }

    public function nextDay()
    {
        foreach ($this->items as $item) {
            if (array_key_exists($item->name, $this->enabled_item_types)) {
                $itemStrategy = new $this->enabled_item_types[$item->name];
                $itemStrategy->applyDecrement($item);
            }
        }
    }
}
