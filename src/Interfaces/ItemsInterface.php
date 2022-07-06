<?php

namespace App\Interfaces;

use App\Item;

interface ItemsInterface
{
    public function applyDecrement(Item $item) : void;
}

