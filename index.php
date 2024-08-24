<?php

require_once __DIR__ . '/vendor/autoload.php';

use PtteM\ProductFeeder\Exceptions\ExceptionHandler;
use PtteM\ProductFeeder\Models\Product;
use PtteM\ProductFeeder\Managers\FeedManager;
use PtteM\ProductFeeder\Platforms\Factories\GooglePlatformFactory;
use PtteM\ProductFeeder\Platforms\Factories\FacebookPlatformFactory;
use PtteM\ProductFeeder\Storage\LocalStorage;

const BASE_PATH = __DIR__ . DIRECTORY_SEPARATOR;

set_exception_handler([ExceptionHandler::class, 'handleException']);

$products = [
    new Product(1, 'Product 1', 1.00, 'Electronic'),
    new Product(2, 'Product 2', 2.00, 'Fashion'),
    new Product(3, 'Product 3', 3.00, 'Home Decor'),
    new Product(4, 'Product 4', 4.00, 'Electronic'),
];

$storage = new LocalStorage(BASE_PATH . 'storage/feeds/');
$feedManager = new FeedManager($storage);
$feedManager->addPlatformFactory(new GooglePlatformFactory());
$feedManager->addPlatformFactory(new FacebookPlatformFactory());

$feedManager->generateAndSaveFeeds($products);

echo 'Feeds generated and saved.';
