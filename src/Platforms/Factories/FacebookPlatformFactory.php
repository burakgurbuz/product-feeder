<?php

namespace PtteM\ProductFeeder\Platforms\Factories;

use PtteM\ProductFeeder\Formatters\XmlFormatter;
use PtteM\ProductFeeder\Platforms\FacebookPlatform;

class FacebookPlatformFactory implements IPlatformFactory
{
    public function createPlatform(): FacebookPlatform
    {
        return new FacebookPlatform($this->createFormatter());
    }

    public function createFormatter(): XmlFormatter
    {
        return new XmlFormatter();
    }
}
