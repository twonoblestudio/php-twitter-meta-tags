# twonoblestudio/php-twitter-meta-tags

A simple library to generate Twitter HTML meta tags to publish for your own website.

Using this library you can easily generate standard Twitter output for:

* App
* Player
* Product
* Summary
* Summary - large image

For more information about Twitter Cards visite [developer.twitter.com](https://developer.twitter.com/en/docs/twitter-for-websites/cards/overview/abouts-cards).

## Requirements

* PHP 7.4+

## Installation

The most flexible installation method is using Composer: Simply create a composer.json file in the root of your project:
``` json
{
    "require": {
        "twonoblestudio/php-twitter-meta-tags": "^1.0"
    }
}
```

Install composer and run install command:
``` bash
curl -s http://getcomposer.org/installer | php
php composer.phar install
``` 

Once installed, include vendor/autoload.php in your script.

``` php
require "vendor/autoload.php";
```

## Usage

### Basic usage

```
$context = new \TwoNobleStudio\Twitter\TwitterContext();

$summary = new \TwoNobleStudio\Twitter\ContextType\Summary();
$summary->setSite('@TwitterDev');
$summary->setTitle('Cannonball');
$summary->setDescription('Cannonball is the fun way to create and share stories and poems on your phone. Start with a beautiful image from the gallery, then choose words to complete the story and share it with friends.');
$summary->setImage('http://cannonball.fabric.io/player.jpg', 'Cannonball');

$context->addCard($summary);

$properties = $context->getProperties();

echo $context->generateHtml($properties);
```

## Running tests

You can run the test suite by running `phpunit` from the command line.

## License

This library is licensed under the MIT license.
