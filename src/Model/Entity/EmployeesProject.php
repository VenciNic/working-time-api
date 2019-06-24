<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class EmployeesProject extends Entity
{
    protected $_accessible = [
        'employee_id' => true,
        'project_id' => true,
    ];
}
