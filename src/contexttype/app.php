<?php

declare(strict_types=1);

namespace TwoNobleStudio\Twitter\ContextType;

/**
 * The App Card is a great way to represent mobile applications on Twitter
 * and to drive installs.
 */
class App extends \TwoNobleStudio\Twitter\ContextType\BaseContext
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
    private $country;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $nameIphone;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $idIphone;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $urlIphone;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $nameIpad;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $idIpad;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $urlIpad;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $nameGooglePlay;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $idGooglePlay;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $urlGooglePlay;

    /**
     * If your application is not available in the US App Store, you must set
     * this value to the two-letter country code for the App Store that
     * contains your application.
     *
     * @param string $country
     */
    public function setCountry(string $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Set a new iPhone app
     *
     * @param string $nameIphone iPhone app name
     * @param string $idIphone String value, and should be the numeric representation of your app ID in the App Store (.i.e. "307234931")
     * @param string $urlIphone Your app’s custom URL scheme (you must include "://" after your scheme name)
     */
    public function setIphoneApp(string $nameIphone, string $idIphone, string $urlIphone)
    {
        $this->nameIphone = $nameIphone;
        $this->idIphone = $idIphone;
        $this->urlIphone = $urlIphone;

        return $this;
    }

    /**
     * Set a new iPad app
     *
     * @param string $nameIpad iPad app name
     * @param string $idIpad String value, should be the numeric representation of your app ID in the App Store (.i.e. "307234931")
     * @param string $urlIpad Your app’s custom URL scheme
     */
    public function setIpadApp(string $nameIpad, string $idIpad, string $urlIpad)
    {
        $this->nameIpad = $nameIpad;
        $this->idIpad = $idIpad;
        $this->urlIpad = $urlIpad;

        return $this;
    }

    /**
     * Set a new GooglePlay app
     *
     * @param string $nameGooglePlay GooglePlay app name
     * @param string $idGooglePlay String value, and should be the numeric representation of your app ID in Google Play (.i.e. "com.android.app")
     * @param string $urlGooglePlay Your app’s custom URL scheme
     */
    public function setGooglePlayApp(string $nameGooglePlay, string $idGooglePlay, string $urlGooglePlay)
    {
        $this->nameGooglePlay = $nameGooglePlay;
        $this->idGooglePlay = $idGooglePlay;
        $this->urlGooglePlay = $urlGooglePlay;

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

        if ($this->description) {
            $result[] = ['property' => 'twitter:description', 'content' => $this->description];
        }

        if ($this->country) {
            $result[] = ['property' => 'twitter:app:country', 'content' => $this->country];
        }

        if ($this->nameIphone && $this->idIphone && $this->urlIphone) {
            $result[] = ['property' => 'twitter:app:name:iphone', 'content' => $this->nameIphone];
            $result[] = ['property' => 'twitter:app:id:iphone', 'content' => $this->idIphone];
            $result[] = ['property' => 'twitter:app:url:iphone', 'content' => $this->urlIphone];
        }

        if ($this->nameIpad && $this->idIpad && $this->urlIpad) {
            $result[] = ['property' => 'twitter:app:name:ipad', 'content' => $this->nameIpad];
            $result[] = ['property' => 'twitter:app:id:ipad', 'content' => $this->idIpad];
            $result[] = ['property' => 'twitter:app:url:ipad', 'content' => $this->urlIpad];
        }

        if ($this->nameGooglePlay && $this->idGooglePlay && $this->urlGooglePlay) {
            $result[] = ['property' => 'twitter:app:name:googleplay', 'content' => $this->nameGooglePlay];
            $result[] = ['property' => 'twitter:app:id:googleplay', 'content' => $this->idGooglePlay];
            $result[] = ['property' => 'twitter:app:url:googleplay', 'content' => $this->urlGooglePlay];
        }

        foreach ($this->labelAndData as $offset => $labelAndData) {
            $result[] = ['property' => 'twitter:label' . $offset, 'content' => $labelAndData[0]];
            $result[] = ['property' => 'twitter:data' . $offset, 'content' => $labelAndData[1]];
        }

        return $result;
    }
}
