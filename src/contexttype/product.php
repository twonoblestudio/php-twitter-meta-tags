<?php

declare(strict_types=1);

namespace TwoNobleStudio\Twitter\ContextType;

/**
 * The Product Card can be used for many kinds of web content, from blog posts
 * and news articles, to products and restaurants. It is designed to give the
 * reader a preview of the content before clicking through to your website.
 */
class Product extends \TwoNobleStudio\Twitter\ContextType\Summary
{
    /**
     * @var string
     */
    protected $type = 'product';
}
