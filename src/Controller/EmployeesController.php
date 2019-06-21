<?php

namespace App\Controller;

use App\Controller\AppController;

class EmployeesController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->viewBuilder()->setClassName('Json');
    }

    public function index() {
        $this->set('employees', $this->paginate());
        $this->set('_serialize', 'employees');
    }

    public function view($id) {      
        $employee = $this->Employees->findById($id)->firstOrFail();
        $this->set([
            'employee' => $employee,
            '_serialize' => ['employee']
        ]);
    }

    public function add() {
        $employee = $this->Employees->newEntity($this->request->getData());
        if ($this->Employees->save($employee)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'employee' => $employee,
            '_serialize' => ['message', 'employee']
        ]);
    }
    
    public function edit($id)
    {
        $employee = $this->Employees->get($id);

        if ($this->request->is(['post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
    
    public function delete($id)
    {
        $employee = $this->Employees->get($id);
        $message = 'Deleted';
        if (!$this->Employees->delete($employee)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}

