<?php

namespace App\Timezone\Tests;

use App\Timezone\Entity;

class Test2
{
    public function run()
    {
        $entity = new Entity();
        $entity->addTimezoneContext(self::class);
        print_r($entity->getCreatedAt());
        $entity->removeTimezoneContext(self::class);
    }
}