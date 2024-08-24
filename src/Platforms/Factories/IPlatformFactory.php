<?php

namespace PtteM\ProductFeeder\Platforms\Factories;

use PtteM\ProductFeeder\Formatters\IFormatter;
use PtteM\ProductFeeder\Platforms\IPlatform;

interface IPlatformFactory
{
    public function createPlatform(): IPlatform;
    public function createFormatter(): IFormatter;
}