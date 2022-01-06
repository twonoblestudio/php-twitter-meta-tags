<?php

declare(strict_types=1);

namespace TwoNobleStudio\Twitter\ContextType;


/**
 * Undocumented class
 */
abstract class BaseContext implements \TwoNobleStudio\Twitter\ContextType\ContextInterface
{
    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $url;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $site;

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $description;

    /**
     * Undocumented variable
     *
     * @var string[]
     */
    protected $labelAndData = [];

    /**
     * Undocumented function
     *
     * @param string $url
     * @return void
     */
    public function setUrl(string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * The Twitter @username the card should be attributed to.
     *
     * @param string $site
     */
    public function setSite(string $site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * A description that concisely summarizes the content as appropriate for
     * presentation within a Tweet. You should not re-use the title as the
     * description or use this field to describe the general services provided
     * by the website. Platform specific behaviors:
     *
     *  - iOS, Android: Not displayed
     *  - Web: Truncated to three lines in timeline and expanded Tweet
     *
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param string $label
     * @param string $data
     * @return void
     */
    public function setCustomData(string $label, string $data)
    {
        $this->labelAndData[] = [$label, $data];
    }
}
