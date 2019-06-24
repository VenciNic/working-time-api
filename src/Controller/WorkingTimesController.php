<?php

namespace App\Controller;

use App\Controller\AppController;

class WorkingTimesController extends AppController 
{

    public function initialize() 
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->viewBuilder()->setClassName('Json');
    }

    public function index() 
    {
        $this->paginate = [
            'contain' => ['EmployeesProjects']
        ];

        $workingTimes = $this->WorkingTimes->find('all');
        $this->set([
            'workingTimes' => $workingTimes,
            '_serialize' => ['workingTimes']
        ]);
    }

    public function add() 
    {

        $employeesProjects = $this->WorkingTimes->EmployeesProjects
                ->find('employeesProjects', $this->request->getData('employees_projects'))
                ->first();

        $interval = $this->WorkingTimes->getWorkingTimeInterval([
            'company_id' => $this->request->getData('company_id'),
            'working_time' => $this->request->getData('working_time')
        ]);

        $data = [
            'employee_project_id' => $employeesProjects->id,
            'working_time' => $this->request->getData('working_time'),
            'working_overtime' => $interval
        ];

        $workingTime = $this->WorkingTimes->newEntity($data, ['validate' => false]);

        if ($this->WorkingTimes->save($workingTime)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'workingTime' => $workingTime,
            '_serialize' => ['message', 'workingTime']
        ]);
    }

}
