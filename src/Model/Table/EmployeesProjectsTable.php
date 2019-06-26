<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\Query;

class EmployeesProjectsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Employees');
        $this->belongsToMany('Projects');
        $this->hasMany('WorkingTimes');
    }
             
    public function findEmployeesProjects(Query $query, array $options) 
    {
        return $query->where($options);
    }
    
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->isUnique(['company_id','employee_id', 'project_id']));

        return $rules;
    }
}