<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisitsInvoicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisitsInvoicesTable Test Case
 */
class VisitsInvoicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VisitsInvoicesTable
     */
    public $VisitsInvoices;

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
        'app.diseases',
        'app.categories',
        'app.patients_diseases',
        'app.invoices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VisitsInvoices') ? [] : ['className' => 'App\Model\Table\VisitsInvoicesTable'];
        $this->VisitsInvoices = TableRegistry::get('VisitsInvoices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VisitsInvoices);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
