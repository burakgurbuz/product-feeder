<?php

namespace PtteM\ProductFeeder\Platforms\Factories;

use PtteM\ProductFeeder\Platforms\GooglePlatform;
use PtteM\ProductFeeder\Formatters\JsonFormatter;

class GooglePlatformFactory implements IPlatformFactory
{
    public function createPlatform(): GooglePlatform
    {
        return new GooglePlatform($this->createFormatter());
    }

    public function createFormatter(): JsonFormatter
    {
        return new JsonFormatter();
    }
}