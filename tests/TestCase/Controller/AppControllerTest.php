<?php

namespace App\Test\TestCase\Controller;

use App\Controller\AppController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AppController Test Case
 */
class AppControllerTest extends IntegrationTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        //'app.app'
    ];

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize() {
        $this->assertResponseOk();
    }

    /**
     * Test beforeRender method
     *
     * @return void
     */
    public function testBeforeRender() {
        $this->assertResponseOk();
    }

}
