<?php

namespace PtteM\ProductFeeder\Platforms;

use PtteM\ProductFeeder\Formatters\IFormatter;
use PtteM\ProductFeeder\Models\Product;

abstract class AbstractPlatform implements IPlatform
{
    public function __construct(
        private readonly IFormatter $formatter
    ) {
    }

    /**
     * Generates a feed for the platform
     *
     * @param array<Product> $products
     * @return string
     */
    public function generateFeed(array $products): string
    {
        $mappedProducts = array_map([$this, 'mapProduct'], $products);

        return $this->formatter->format($mappedProducts);
    }

    /**
     * Maps a product to a platform-specific format
     *
     * @param Product $product
     * @return array
     */
    abstract public function mapProduct(Product $product): array;

    /**
     * Returns the name of the platform
     *
     * @return string
     */
    abstract public function getName(): string;
}
