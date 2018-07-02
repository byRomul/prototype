<?php

namespace App\Timezone;

interface LocatedInRegionInterface
{
    public function getRegion(): Region;
}