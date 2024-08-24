<?php

use PHPUnit\Framework\TestCase;
use PtteM\ProductFeeder\Models\Product;
use PtteM\ProductFeeder\Managers\FeedManager;
use PtteM\ProductFeeder\Platforms\Factories\GooglePlatformFactory;
use PtteM\ProductFeeder\Platforms\Factories\FacebookPlatformFactory;
use PtteM\ProductFeeder\Storage\IStorageDriver;

class FeedManagerTest extends TestCase
{
    private IStorageDriver $storageMock;
    private FeedManager $feedManager;
    private array $products;

    protected function setUp(): void
    {
        $this->storageMock = $this->createMock(IStorageDriver::class);
        $this->feedManager = new FeedManager($this->storageMock);

        // Add platform factories
        $this->feedManager->addPlatformFactory(new GooglePlatformFactory());
        $this->feedManager->addPlatformFactory(new FacebookPlatformFactory());

        // Sample products
        $this->products = [
            new Product(1, 'Product 1', 1.00, 'Electronic'),
            new Product(2, 'Product 2', 2.00, 'Fashion'),
        ];
    }

    public function testGenerateAndSaveFeeds(): void
    {
        // Define expectations for the filenames and formats

        // Create a callback to verify the correct parameters
        $this->storageMock->expects($this->exactly(2))
            ->method('save')
            ->willReturnCallback(function ($filename, $data) {
                $expectedFilenames = [
                    'google.json',
                    'facebook.xml'
                ];
                $this->assertContains($filename, $expectedFilenames);
                $this->assertIsString($data);
                // Simulate successful save
                return true;
            });

        // Run the feed generation and saving
        $this->feedManager->generateAndSaveFeeds($this->products);
    }
}
