<?php

namespace App\Categories;

use App\Categories\NormalItem;

class ConjuredItem extends NormalItem
{
    public function update()
    {
        $this->decreaseSellIn();

        $this->decreaseQuality($this->item->sellIn < 0 ? 4 : 2);
    }
}