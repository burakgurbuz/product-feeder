<?php

namespace PtteM\ProductFeeder\Managers;

use PtteM\ProductFeeder\Models\Product;
use PtteM\ProductFeeder\Platforms\Factories\IPlatformFactory;
use PtteM\ProductFeeder\Storage\IStorageDriver;

class FeedManager
{
    /** @var IPlatformFactory[] */
    private array $factories = [];

    public function __construct(
        private readonly IStorageDriver $storage
    ) {}

    public function addPlatformFactory(IPlatformFactory $platformFactory): void
    {
        $this->factories[] = $platformFactory;
    }

    /**
     * @param Product[] $products
     * @return void
     */
    public function generateAndSaveFeeds(array $products): void
    {
        foreach ($this->factories as $factory) {
            $this->generateAndSaveFeedForPlatform($factory, $products);
        }
    }

    /**
     * Generates and saves feed for a specific platform.
     *
     * @param IPlatformFactory $factory
     * @param Product[] $products
     */
    private function generateAndSaveFeedForPlatform(IPlatformFactory $factory, array $products): void
    {
        $platform = $factory->createPlatform();
        $feed = $platform->generateFeed($products);
        $formatter = $factory->createFormatter();

        $this->saveFeed($platform->getName(), $formatter->getFileExtension(), $feed);
    }

    /**
     * Saves the feed to the storage with the given filename and extension.
     *
     * @param string $fileName
     * @param string $fileExtension
     * @param string $feed
     * @return void
     */
    public function saveFeed(string $fileName, string $fileExtension, string $feed): void
    {
        $this->storage->save(sprintf('%s.%s', $fileName, $fileExtension), $feed);
    }
}