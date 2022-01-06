<?php

declare(strict_types=1);

namespace TwoNobleStudio\Twitter;

use TwoNobleStudio\Twitter\ContextType\ContextInterface;

/**
 * Undocumented class
 */
class TwitterContext
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    private $properties = [];

    /**
     * Undocumented function
     *
     * @param ContextInterface $card
     * @return void
     */
    public function addCard(ContextInterface $card)
    {
        $this->properties = $card->getProperties();
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    public function generateHtml(array $properties)
    {
        $result = [];

        foreach ($properties as $attributes) {
            $element = [];

            foreach ($attributes as $key => $value) {
                $element[] = $key . '="' . $value . '"';
            }

            if ($element) {
                $result[] = '<meta ' . implode(' ', $element) . '>';
            }
        }

        return implode(PHP_EOL, $result);
    }
}
