<?php

namespace PtteM\ProductFeeder\Platforms;

use PtteM\ProductFeeder\Models\Product;

class GooglePlatform extends AbstractPlatform
{
    public function getName(): string
    {
        return 'google';
    }

    public function mapProduct(Product $product): array
    {
        return [
            'product_id' => $product->id,
            'product_name' => $product->name,
            'product_price' => $product->price,
            'product_category' => $product->category,
        ];
    }
}
