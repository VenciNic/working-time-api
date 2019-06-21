<?php

namespace App\Controller;

use App\Controller\AppController;

class ProjectsController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->viewBuilder()->setClassName('Json');
    }

    public function index() {
        $this->set('projects', $this->paginate());
        $this->set('_serialize', 'projects');
    }

    public function view($id) {      
        $project = $this->Projects->findById($id)->firstOrFail();
        $this->set([
            'project' => $project,
            '_serialize' => ['project']
        ]);
    }

    public function add() {
        $project = $this->Projects->newEntity($this->request->getData());
        if ($this->Projects->save($project)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'project' => $project,
            '_serialize' => ['message', 'project']
        ]);
    }
    
}

