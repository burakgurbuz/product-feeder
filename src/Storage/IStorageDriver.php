<?php

namespace PtteM\ProductFeeder\Storage;

interface IStorageDriver
{
    /**
     * @param string $fileName
     * @param string $data
     * @return bool
     */
    public function save(string $fileName, string $data): bool;
}
