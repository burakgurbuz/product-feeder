<?php

namespace PtteM\ProductFeeder\Formatters;

interface IFormatter
{
    public function format(array $products): string;
    public function getFileExtension(): string;
}