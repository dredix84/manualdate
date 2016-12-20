<?php

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CalculationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CalculationsTable Test Case
 */
class CalculationsTableTest extends TestCase {

    /**
     * Test subject
     *
     * @var \App\Model\Table\CalculationsTable
     */
    public $CalculationsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calculations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $config = TableRegistry::exists('Calculations') ? [] : ['className' => 'App\Model\Table\CalculationsTable'];
        $this->CalculationsTable = TableRegistry::get('Calculations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->CalculationsTable);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize() {
        $this->assertEquals(1, 1);
        //$this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault() {
        $date = new \Cake\I18n\Time('2016-01-01');
        //$calculation = $this->CalculationsTable->newEntity();
        $calculation = [];
        $calculation['starte_date'] = $date->format('Y-m-d');
        $calculation['end_date'] = $date->addDays(3)->format('Y-m-d');

        $validator = $this->CalculationsTable->validationDefault(new \Cake\Validation\Validator());
        $errors = $validator->errors($calculation);
        $this->assertTrue(empty($errors));
    }

    /**
     * Test isLeadYear method
     *
     * @return void
     */
    public function testIsLeadYear() {
        $year = 2016;
        $result = $this->CalculationsTable->isLeadYear($year);
        $this->assertEquals(TRUE, $result);

        $year++;
        $result = $this->CalculationsTable->isLeadYear($year);
        $this->assertEquals(FALSE, $result);
        //$this->markTestIncomplete('Not implemented yet.');
    }

    public function testDateArray() {
        $result = $this->CalculationsTable->dateArray('2016-07-06');
        $this->assertContains('2016', $result);
        $this->assertContains('07', $result);
        $this->assertContains('06', $result);
    }

    public function testGetJulianDayNumber() {
        $date = new \Cake\I18n\Time('2016-01-01');
        for ($x = 0; $x < 30; $x++) {
            $result = round($this->CalculationsTable->getJulianDayNumber($date->format('Y-m-d')));
            $jd = gregoriantojd($date->format('m'), $date->format('d'), $date->format('Y'));
            $this->assertEquals($result, $jd);
        }
    }

    public function testDateDiff() {
        $days = [2, 3, 8, 4, 20, 13, 7, 1, 11, 55];


        foreach ($days as $d) {
            $date = new \Cake\I18n\Time('2016-01-01');
            $d1 = $date->format('Y-m-d');
            $d2 = $date->addDays($d)->format('Y-m-d');
            $result = ceil($this->CalculationsTable->dateDiff($d1, $d2));
            $this->assertEquals($d, ($result), "Failed: Start Date: $d1 and End Date: $d2 resulted in $result but expected $d.");
        }
    }
    
    public function testAddRecord(){
        $this->CalculationsTable->addRecord('2016-12-12', '2016-12-13');
        $result = $this->CalculationsTable->find('all')->count();
        $this->assertGreaterThan(0, $result, 'No records were found in the database.');
    }
    
    public function testGetRecord(){
        //$this->CalculationsTable->addRecord('2016-12-12', '2016-12-13');
        $result = $this->CalculationsTable->getRecord(10);
        $this->assertEquals(true, is_array($result));
    }

}
