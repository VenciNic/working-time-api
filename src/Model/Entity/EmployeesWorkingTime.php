<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class EmployeesWorkingTime extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
