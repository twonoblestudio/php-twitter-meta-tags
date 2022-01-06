<?php

declare(strict_types=1);

require '../vendor/autoload.php';

$context = new \TwoNobleStudio\Twitter\TwitterContext();

$app = new \TwoNobleStudio\Twitter\ContextType\App();
$app->setSite('@TwitterDev');
$app->setDescription('Cannonball is the fun way to create and share stories and poems on your phone. Start with a beautiful image from the gallery, then choose words to complete the story and share it with friends.');
$app->setCountry('US');
$app->setIphoneApp('Cannonball', '929750075', 'cannonball://poem/5149e249222f9e600a7540ef');
$app->setIpadApp('Cannonball', '929750075', 'cannonball://poem/5149e249222f9e600a7540ef');
$app->setGooglePlayApp('Cannonball', 'io.fabric.samples.cannonball', 'http://cannonball.fabric.io/poem/5149e249222f9e600a7540ef');

$context->addCard($app);

$properties = $context->getProperties();

echo $context->generateHtml($properties);
