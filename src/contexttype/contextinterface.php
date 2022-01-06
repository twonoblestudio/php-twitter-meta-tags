<?php

declare(strict_types=1);

namespace TwoNobleStudio\Twitter\ContextType;

interface ContextInterface
{
    /**
     * Undocumented function
     *
     * @param string $site
     * @return void
     */
    public function setSite(string $site);

    /**
     * Undocumented function
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description);

    /**
     * Undocumented function
     *
     * @return array
     */
    public function getProperties(): array;
}
