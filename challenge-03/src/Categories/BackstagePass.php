<?php

namespace App\Categories;

use App\Interfaces\ItemCategory;

class BackstagePass extends ItemCategory
{
    public function update()
    {
        $this->item->sellIn -= 1;

        if ($this->item->sellIn < 0) {
            $this->item->quality = 0;
            return;
        }

        $this->item->quality += 1;

        if ($this->item->sellIn < 10) {
            $this->item->quality += 1;
        }

        if ($this->item->sellIn < 5) {
            $this->item->quality += 1;
        }

        $this->item->quality = min(50, $this->item->quality);
    }
}