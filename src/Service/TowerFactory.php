<?php

namespace App\Service;

use Ramsey\Uuid\Uuid;

class TowerFactory
{
    public static function createRedTower(): Tower
    {
        return new Tower(Uuid::uuid6()->toString(), 'red', 14.3);
    }
}