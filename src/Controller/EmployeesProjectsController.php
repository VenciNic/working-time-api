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

    public function view($id = null)
    {
        $employeesProject = $this->EmployeesProjects->findById($id)->firstOrFail();
        $this->set([
            'employees_projects' => $employeesProject,
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
