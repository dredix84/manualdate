<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Calculations Controller
 *
 * @property \App\Model\Table\CalculationsTable $Calculations
 */
class CalculationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $calculations = $this->paginate($this->Calculations);

        $this->set(compact('calculations'));
        $this->set('_serialize', ['calculations']);
    }

    /**
     * View method
     *
     * @param string|null $id Calculation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $calculation = $this->Calculations->get($id, [
            'contain' => []
        ]);

        $this->set('calculation', $calculation);
        $this->set('_serialize', ['calculation']);
    }
}
