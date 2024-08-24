<?php

namespace PtteM\ProductFeeder\Models;

class Product
{
    public function __construct(
        public int $id,
        public string $name,
        public float $price,
        public string $category
    ) {
    }
}
