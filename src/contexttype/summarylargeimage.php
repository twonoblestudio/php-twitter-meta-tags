<?php

declare(strict_types=1);

namespace TwoNobleStudio\Twitter\ContextType;

/**
 * The Summary Card with Large Image features a large, full-width prominent
 * image alongside a tweet. It is designed to give the reader a rich photo
 * experience, and clicking on the image brings the user to your website.
 */
class SummaryLargeImage extends \TwoNobleStudio\Twitter\ContextType\BaseContext
{
    /**
     * @var string
     */
    protected $type = 'summary_large_image';

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $title;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $creator;

    /**
     * Undocumented variable
     *
     * @var array
     */
    private $images = [];

    /**
     * The Twitter @username the card should be attributed to.
     *
     * @param string $site
     */
    public function setCreator(string $creator)
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * A concise title for the related content.
     * Platform specific behaviors:
     *
     *  - iOS, Android: Truncated to two lines in timeline and expanded Tweet
     *  - Web: Truncated to one line in timeline and expanded Tweet
     *
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * A URL to a unique image representing the content of the page.
     * You should not use a generic image such as your website logo, author
     * photo, or other image that spans multiple pages. Images for this Card
     * support an aspect ratio of 1:1 with minimum dimensions of 144x144 or
     * maximum of 4096x4096 pixels. Images must be less than 5MB in size.
     * The image will be cropped to a square on all platforms. JPG, PNG, WEBP
     * and GIF formats are supported. Only the first frame of an animated GIF
     * will be used. SVG is not supported.
     *
     * A text description of the image conveying the essential nature of an
     * image to users who are visually impaired. Maximum 420 characters.
     *
     * @param string $image
     * @param string|null $alt
     */
    public function setImage(string $image, string $alt = null)
    {
        $this->images[] = ['uri' => $image, 'alt' => $alt];

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function getProperties(): array
    {
        $result = [];

        $result[] = ['property' => 'twitter:card', 'content' => $this->type];

        if ($this->url) {
            $result[] = ['property' => 'twitter:url', 'content' => $this->url];
        }

        if ($this->site) {
            $result[] = ['property' => 'twitter:site', 'content' => $this->site];
        }

        if ($this->creator) {
            $result[] = ['property' => 'twitter:creator', 'content' => $this->creator];
        }

        if ($this->title) {
            $result[] = ['property' => 'twitter:title', 'content' => $this->title];
        }

        if ($this->description) {
            $result[] = ['property' => 'twitter:description', 'content' => $this->description];
        }

        foreach ($this->images as $key => $image) {
            $result[] = ['property' => 'twitter:image' . $key . ':src', 'content' => $image['uri']];

            if ($image['alt']) {
                $result[] = ['property' => 'twitter:image' . $key . ':alt', 'content' => $image['alt']];
            }
        }

        foreach ($this->labelAndData as $offset => $labelAndData) {
            $result[] = ['property' => 'twitter:label' . $offset, 'content' => $labelAndData[0]];
            $result[] = ['property' => 'twitter:data' . $offset, 'content' => $labelAndData[1]];
        }

        return $result;
    }
}
