<?php

namespace App\Test\TestCase\Controller;

use App\Controller\CalculationsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CalculationsController Test Case
 */
class CalculationsControllerTest extends IntegrationTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calculations'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/calculations/index');
        $this->assertResponseOk();
    }

    public function testIndexQueryData() {
       $this->get('/calculations?page=1');
        $this->assertResponseOk();
    }
    /**
     * Test view method
     *
     * @return void
     */
    public function testView() {
        $this->get('/calculations/view/1');
        $this->assertResponseOk();
    }

}
