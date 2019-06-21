<?php

namespace App\Controller;

use App\Controller\AppController;

class CompaniesController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->viewBuilder()->setClassName('Json');
    }

    public function index() {
        $this->set('companies', $this->paginate());
        $this->set('_serialize', 'companies');
    }

    public function view($id) {      
        $company = $this->Companies->findById($id)->firstOrFail();
        $this->set([
            'company' => $company,
            '_serialize' => ['company']
        ]);
    }

    public function add() {
        $company = $this->Companies->newEntity($this->request->getData());
        if ($this->Companies->save($company)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'company' => $company,
            '_serialize' => ['message', 'company']
        ]);
    }
    
    public function edit($id)
    {
        $company = $this->Companies->get($id);

        if ($this->request->is(['post', 'put'])) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            if ($this->Companies->save($company)) {
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
        $company = $this->Companies->get($id);
        $message = 'Deleted';
        if (!$this->Companies->delete($company)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}

