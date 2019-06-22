<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class EmployeesProjectsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Employees');
        $this->belongsToMany('Projects');
    }
}
