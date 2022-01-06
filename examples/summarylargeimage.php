<?php

declare(strict_types=1);

require '../vendor/autoload.php';

$context = new \TwoNobleStudio\Twitter\TwitterContext();

$summaryLargeImage = new \TwoNobleStudio\Twitter\ContextType\SummaryLargeImage();
$summaryLargeImage->setSite('@TwitterDev');
$summaryLargeImage->setCreator('@TwitterDev');
$summaryLargeImage->setTitle('Cannonball');
$summaryLargeImage->setDescription('Cannonball is the fun way to create and share stories and poems on your phone. Start with a beautiful image from the gallery, then choose words to complete the story and share it with friends.');
$summaryLargeImage->setImage('http://cannonball.fabric.io/player.jpg', 'Cannonball');

$context->addCard($summaryLargeImage);

$properties = $context->getProperties();

echo $context->generateHtml($properties);
