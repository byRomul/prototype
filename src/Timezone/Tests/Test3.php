<?php

namespace App\Timezone\Tests;

use App\Timezone\Entity;

class Test3
{
    public function run()
    {
        $entity = new Entity();
        $entity->addTimezoneContext(self::class);
        print_r($entity->getCreatedAt());
    }
}