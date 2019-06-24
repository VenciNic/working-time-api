<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;

class EmployeesProjectsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Employees');
        $this->belongsToMany('Projects');
    }
             
    public function findEmployeesProjects(Query $query, array $options) 
    {
        return $query->where($options);
    }
}
