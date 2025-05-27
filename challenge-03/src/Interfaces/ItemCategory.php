<?php

namespace App\Interfaces;

use App\GildedRose;

abstract class ItemCategory
{
    protected GildedRose $item;

    public function __construct(GildedRose $item)
    {
        $this->item = $item;
    }

    abstract public function update();
}