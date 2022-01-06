<?php

declare(strict_types=1);

require '../vendor/autoload.php';

$context = new \TwoNobleStudio\Twitter\TwitterContext();

$player = new \TwoNobleStudio\Twitter\ContextType\Player();
$player->setTitle('Cannonball');
$player->setSite('@TwitterDev');
$player->setDescription('Cannonball is the fun way to create and share stories and poems on your phone. Start with a beautiful image from the gallery, then choose words to complete the story and share it with friends.');
$player->setPlayer('http://cannonball.fabric.io/player.html', 640, 480);
$player->setImage('http://cannonball.fabric.io/player.jpg', 'Cannonball');

$context->addCard($player);

$properties = $context->getProperties();

echo $context->generateHtml($properties);
