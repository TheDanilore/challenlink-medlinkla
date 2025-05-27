<?php

namespace App\Categories;

use App\Interfaces\ItemCategory;

class AgedBrie extends ItemCategory
{
    public function update()
    {
        $this->item->sellIn -= 1;

        if ($this->item->quality < 50) {
            $this->item->quality += ($this->item->sellIn < 0) ? 2 : 1;
            $this->item->quality = min(50, $this->item->quality);
        }
    }
}