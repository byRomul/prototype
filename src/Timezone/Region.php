<?php

namespace App\Timezone;

class Region
{
    /**
     * @var string
     */
    private $timezone;

    public function __construct()
    {
        $this->timezone = 'Asia/Vladivostok';
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }
}