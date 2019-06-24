<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class WorkingTime extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
