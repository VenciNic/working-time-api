<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class WorkingTimesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('EmployeesProjects');
    }
    
    public function findWorkingTimes(Query $query, array $options) 
    {
        return $query->where($options);
    }
    
    public function getWorkingTimeInterval($data = array())
    {
        $comapny = $this->getCompanyById($data['company_id']);
        $interval = date_diff($comapny->working_time, new Time($data['working_time']));
        if(!$interval->invert){
            return  $interval->format('%H:%I:%S');
        }     
    }
    
    public function getCompanyById($id)
    {
        $companies = TableRegistry::getTableLocator()->get('Companies');
        return $companies->findById($id)->first();
    }

}
