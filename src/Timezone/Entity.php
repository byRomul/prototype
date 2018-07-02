<?php

namespace App\Timezone;

class Entity implements LocatedInRegionInterface
{
    use TimezoneTrait;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var Region
     */
    private $region;

    public function __construct()
    {
        $this->region = new Region();
        $this->createdAt = (new \DateTime())->setTimezone(new \DateTimeZone('Europe/Moscow'));
    }

    public function getRegion(): Region
    {
        return $this->region;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->needToConvert() ? $this->getConverted() : $this->createdAt;
    }

    protected function getTimezoneProperties(): array
    {
        return [
            'getCreatedAt',
        ];
    }
}