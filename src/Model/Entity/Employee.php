<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Employee extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
