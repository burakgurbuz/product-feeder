<?php

namespace PtteM\ProductFeeder\Formatters;

use JsonException;
use PtteM\ProductFeeder\Models\Product;

class JsonFormatter implements IFormatter
{
    /**
     * Formats the given products array to JSON.
     *
     * @param array<Product> $products
     * @return string
     * @throws JsonException
     */
    public function format(array $products): string
    {
        return json_encode($products, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);
    }

    public function getFileExtension(): string
    {
        return 'json';
    }
}