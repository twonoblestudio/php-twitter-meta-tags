<?php

declare(strict_types=1);

namespace TwoNobleStudio\Twitter\ContextType;

/**
 * Video and audio clips have a special place on the Twitter platform thanks
 * to the Player Card.
 */
class Player extends \TwoNobleStudio\Twitter\ContextType\BaseContext
{
    /**
     * @var string
     */
    protected $type = 'player';

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
    private $player;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $width;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $height;

    /**
     * Undocumented variable
     *
     * @var string[]
     */
    private $images = [];

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
     * Undocumented function
     *
     * @param string $player HTTPS URL to iFrame player. This must be a HTTPS URL which does not generate active mixed content warnings in a web browser. The audio or video player must not require plugins such as Adobe Flash.
     * @param integer $width Width of iFrame specified in twitter:player in pixels
     * @param integer $height Height of iFrame specified in twitter:player in pixels
     */
    public function setPlayer(string $player, int $width, int $height)
    {
        $this->player = $player;
        $this->width = $width;
        $this->height = $height;

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

        if ($this->title) {
            $result[] = ['property' => 'twitter:title', 'content' => $this->title];
        }

        if ($this->site) {
            $result[] = ['property' => 'twitter:site', 'content' => $this->site];
        }

        if ($this->description) {
            $result[] = ['property' => 'twitter:description', 'content' => $this->description];
        }

        if ($this->player && $this->width && $this->height) {
            $result[] = ['property' => 'twitter:player', 'content' => $this->player];
            $result[] = ['property' => 'twitter:player:width', 'content' => $this->width];
            $result[] = ['property' => 'twitter:player:height', 'content' => $this->height];
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
