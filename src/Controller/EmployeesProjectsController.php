<?php
namespace App\Controller;

use App\Controller\AppController;

class EmployeesProjectsController extends AppController
{
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->viewBuilder()->setClassName('Json');
    }

    public function index()
    {
        $this->set('employees_projects', $this->paginate());
        $this->set('_serialize', 'employees_projects');
    }

    public function view()
    {
        $queryParams = $this->request->getQuery();
        $query = $this->EmployeesProjects->find('employeesProjects', $queryParams)
            ->select('id')
            ->all();
        foreach($query as $employeeProject){
            $employeeProjectIds[] = $employeeProject->id;
        }
        
        $employeesProjects = $this->EmployeesProjects->WorkingTimes
            ->find('workingTimes', ['employee_project_id IN' => $employeeProjectIds])
            ->all();
        
        $this->set([
            'employees_projects' => $employeesProjects,
            '_serialize' => ['employees_projects']
        ]);
    }

    public function add()
    {
        $employeesProjects = $this->EmployeesProjects->newEntity($this->request->getData());
        if ($this->EmployeesProjects->save($employeesProjects)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'employees_projects' => $employeesProjects,
            '_serialize' => ['message', 'employees_projects']
        ]);
    }

}
