<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class EmployeesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Projects', [
            'through' => 'EmployeesProjects',
        ]);
    }
}
