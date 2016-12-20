<?php

namespace App\Controller;

use App\Controller\AppController;

class CalcsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler'); /* This line loads the required RequestHandler Component */
    }

    public function beforeFilter(\Cake\Event\Event $event) {       //Function is executed before responding to a request
        parent::beforeFilter($event);
        $this->loadModel('Calculations');
    }

    /**
     * Responds to index http request
     */
    public function index() {
        $this->loadModel('Calculations');
        $calcHistory = $this->Calculations->getRecord();
        $this->set(compact(['calcHistory']));
    }

    /**
     * Responds to date-diff http request
     * @param string $start   Start date
     * @param string $end     End date
     * @param int $saveHistory Determine is the calculation should be saved (1 = Save, 0 = Dont save)
     */
    public function dateDiff($start = NULL, $end = NULL, $saveHistory = 0) {
        $dateTime = new \Cake\I18n\Time();
        $dateTime = $dateTime->now()->nice();   //Used to note time calculation was done

        //Setting up to validate errors
        $valid = $this->Calculations->validationDefault(new \Cake\Validation\Validator());
        $record = [
            'start_date' => $start,
            'end_date' => $end,
        ];
        $errors = $valid->errors($record);
            
        if (!empty($errors)) {
            //Getting error messages
            $messages = [];
            foreach($errors as $error){
                foreach($error as $emsg){
                    $messages[] =  $emsg;
                }
            }
            $message = implode(" \n", $messages);
            $this->set('errors', $errors);
        } else {
            $result = $this->Calculations->dateDiff($start, $end);
            if($saveHistory){$this->Calculations->addRecord($start, $end);}
            $message = __('Calculation complete.');
        }

        $this->set(compact(['result', 'message', 'dateTime']));     //Setting data
        $this->set('_serialize', ['result', 'message', 'dateTime']);    //Allows for json and XML responses
    }

}
