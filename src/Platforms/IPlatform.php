<?php

namespace PtteM\ProductFeeder\Platforms;

use PtteM\ProductFeeder\Models\Product;

interface IPlatform
{
    /**
     * Generates a feed for the platform
     *
     * @param array<Product> $products
     * @return string
     */
    public function generateFeed(array $products): string;

    /**
     * Returns the name of the platform
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Maps a product to a platform-specific format
     *
     * @param Product $product
     * @return array
     */
    public function mapProduct(Product $product): array;
}
