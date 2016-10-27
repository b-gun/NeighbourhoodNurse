<?php
namespace App\Test\TestCase\Controller;

use App\Controller\VisitsInvoicesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\VisitsInvoicesController Test Case
 */
class VisitsInvoicesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visits_invoices',
        'app.visits',
        'app.patients',
        'app.users',
        'app.referrers',
        'app.refcontacts',
        'app.nokrelationships',
        'app.diseases',
        'app.categories',
        'app.patients_diseases',
        'app.invoices'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
