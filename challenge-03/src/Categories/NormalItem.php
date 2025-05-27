<?php

namespace App\Categories;

use App\Interfaces\ItemCategory;

class NormalItem extends ItemCategory
{
    public function update()
    {
        $this->decreaseSellIn();

        $this->decreaseQuality($this->item->sellIn < 0 ? 2 : 1);
    }

    protected function decreaseSellIn()
    {
        $this->item->sellIn -= 1;
    }

    protected function decreaseQuality($amount)
    {
        $this->item->quality = max(0, $this->item->quality - $amount);
    }
}