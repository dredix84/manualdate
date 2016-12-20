<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Calculations Model
 *
 * @method \App\Model\Entity\Calculation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Calculation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Calculation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Calculation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Calculation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Calculation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Calculation findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CalculationsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('calculations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->notEmpty('start_date', ['message' => __('Start date is required.')])
                ->add('start_date', 'valid', [
                    'rule' => 'date',
                    'message' => __('The date format for Start Date is not valid. The format should be yyyy-mm-dd')
                    ]);

        $validator
                ->notEmpty('end_date', ['message' => __('End date is required.')])
                ->add('end_date', 'valid', [
                    'rule' => 'date',
                    'message' => __('The date format for End Date is not valid. The format should be yyyy-mm-dd')
                    ]);

        return $validator;
    }

    /**
     * Used to determine is the year value passed in is a leap year
     * @param int $year The 4 digit value representing the year
     * @return int
     */
    public function isLeadYear($year) {
        return !($year % 4);
    }

    /**
     * Converts a date string to an array with elements year, month and day
     * @param string $date Date string which should be converted to array
     * @return array
     */
    public function dateArray($date) {
        return explode('-', $date);
    }

    /**
     * Calculates the difference between 2 dates
     * @param string $start Start date string (yyyy-mm-dd)
     * @param string $end End date (yyyy-mm-dd)
     * @return int
     */
    public function dateDiff($start = '2016-07-01', $end = '2016-07-22') {
        $jdStart = $this->getJulianDayNumber($start);
        $jdEnd = $this->getJulianDayNumber($end);
        return ($jdEnd - $jdStart);
    }

    /**
     * Converts a date string to a julian day number
     * @param mixed $date Date string (yyyy-mm-dd) or date array
     * @return int
     */
    public function getJulianDayNumber($date) {
        $d = is_array($date) ? $date : $this->dateArray($date);
        if (count($d) >= 3) {
            $jd = ( 1461 * ( $d[0] + 4800 + ( $d[1] - 14 ) / 12 ) ) / 4 + ( 367 * ( $d[1] - 2 - 12 * ( ( $d[1] - 14 ) / 12 ) ) ) / 12 - ( 3 * ( ( $d[0] + 4900 + ( $d[1] - 14 ) / 12 ) / 100 ) ) / 4 + $d[2] - 32075;
            return $jd;
        } else {
            return 0;
        }
    }

    /**
     * Adds a record to the calculations table in the SQLite database. True is returned is save was successful, False if not
     * @param string $startDate   Start date
     * @param string $endDate End date
     * @return boolean
     */
    public function addRecord($startDate, $endDate) {
        $calculation = $this->newEntity();
        $calculation->start_date = $startDate;
        $calculation->end_date = $endDate;
        return $this->save($calculation);
    }

    /**
     * Get the previous calculation attempt from the datebase.
     * @param type $limit   Count of how many records should be returned
     * @return array
     */
    public function getRecord($limit = 10) {
        $calculations = $this->find('all')
                ->limit($limit)
                ->order('id DESC');

        $outData = [];
        foreach ($calculations as $c) {
            $outData[] = [
                'start_date' => $c->start_date,
                'end_date' => $c->end_date,
                'result' => round($this->dateDiff($c->start_date, $c->end_date)),
                'created' => $c->created
            ];
        }
        return $outData;
    }

}
