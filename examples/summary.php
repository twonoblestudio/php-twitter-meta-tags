<?php

declare(strict_types=1);

require '../vendor/autoload.php';

$context = new \TwoNobleStudio\Twitter\TwitterContext();

$summary = new \TwoNobleStudio\Twitter\ContextType\Summary();
$summary->setSite('@TwitterDev');
$summary->setTitle('Cannonball');
$summary->setDescription('Cannonball is the fun way to create and share stories and poems on your phone. Start with a beautiful image from the gallery, then choose words to complete the story and share it with friends.');
$summary->setImage('http://cannonball.fabric.io/player.jpg', 'Cannonball');

$context->addCard($summary);

$properties = $context->getProperties();

echo $context->generateHtml($properties);
