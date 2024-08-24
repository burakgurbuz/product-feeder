<?php

namespace PtteM\ProductFeeder\Platforms;

use PtteM\ProductFeeder\Models\Product;

class FacebookPlatform extends AbstractPlatform
{
    public function getName(): string
    {
        return 'facebook';
    }

    public function mapProduct(Product $product): array
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'cost' => $product->price,
            'category' => $product->category,
        ];
    }
}