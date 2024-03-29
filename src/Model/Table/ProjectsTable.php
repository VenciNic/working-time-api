<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ProjectsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Employees', [
            'through' => 'EmployeesProjects',
        ]);
    }
}
