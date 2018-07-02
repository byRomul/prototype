<?php

namespace App\Timezone\Tests;

use App\Timezone\Entity;

class Test1
{
    public function run()
    {
        $entity = new Entity();
        print_r($entity->getCreatedAt());
    }
}