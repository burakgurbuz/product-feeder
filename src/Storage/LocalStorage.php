<?php

namespace PtteM\ProductFeeder\Storage;

use PtteM\ProductFeeder\Exceptions\StorageException;

class LocalStorage implements IStorageDriver
{
    private string $directory;

    public function __construct(string $directory = __DIR__)
    {
        $this->directory = rtrim($directory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    /**
     * @param string $fileName
     * @param string $data
     * @return bool
     * @throws StorageException
     */
    public function save(string $fileName, string $data): bool
    {
        $filePath = $this->directory . $fileName;

        if (file_put_contents($filePath, $data) === false) {
            throw new StorageException("Failed to save file to $filePath");
        }

        return true;
    }
}
