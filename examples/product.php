<?php

declare(strict_types=1);

require '../vendor/autoload.php';

$context = new \TwoNobleStudio\Twitter\TwitterContext();

$product = new \TwoNobleStudio\Twitter\ContextType\Product();
$product->setSite('@TwitterDev');
$product->setTitle('Cannonball');
$product->setDescription('Cannonball is the fun way to create and share stories and poems on your phone. Start with a beautiful image from the gallery, then choose words to complete the story and share it with friends.');
$product->setImage('http://cannonball.fabric.io/player.jpg', 'Cannonball');
$product->setCustomData('Color', 'Black');
$product->setCustomData('Price', '13.25');
$product->setCustomData('Currency', 'EUR');

$context->addCard($product);

$properties = $context->getProperties();

echo $context->generateHtml($properties);
