<?php

namespace App;

use App\Categories\AgedBrie;
use App\Categories\BackstagePass;
use App\Categories\ConjuredItem;
use App\Categories\NormalItem;
use App\Categories\Sulfuras;
use App\Interfaces\ItemCategory;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn)
    {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        $category = $this->resolveCategory();
        $category->update();
    }

    protected function resolveCategory(): ItemCategory
    {
        return match (true) {
            str_contains($this->name, 'Conjured') => new ConjuredItem($this),
            $this->name === 'Aged Brie' => new AgedBrie($this),
            $this->name === 'Backstage passes to a TAFKAL80ETC concert' => new BackstagePass($this),
            $this->name === 'Sulfuras, Hand of Ragnaros' => new Sulfuras($this),
            default => new NormalItem($this),
        };
    }
}
