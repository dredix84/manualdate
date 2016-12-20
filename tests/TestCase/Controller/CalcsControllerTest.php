<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CalcsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CalcsController Test Case
 */
class CalcsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calculations'
    ];

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->assertResponseOk();
    }

    /**
     * Test beforeFilter method
     *
     * @return void
     */
    public function testBeforeFilter()
    {
        $this->assertResponseOk();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/calcs/index');
        $this->assertResponseOk();
    }

    /**
     * Test dateDiff method
     *
     * @return void
     */
    public function testDateDiff()
    {
        
        $this->get('/calcs/date-diff/2016-01-01/2016-01-02');
        $this->assertResponseOk();
    }
    
    public function testDateDiffNullNull(){
        
        $this->get('/calcs/date-diff/');
        $this->assertResponseOk();
    }
}
