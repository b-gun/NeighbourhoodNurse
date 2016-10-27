<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NokrelationshipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NokrelationshipsTable Test Case
 */
class NokrelationshipsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NokrelationshipsTable
     */
    public $Nokrelationships;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nokrelationships',
        'app.patients',
        'app.users',
        'app.referrers',
        'app.refcontacts',
        'app.visits',
        'app.diseases',
        'app.categories',
        'app.patients_diseases'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Nokrelationships') ? [] : ['className' => 'App\Model\Table\NokrelationshipsTable'];
        $this->Nokrelationships = TableRegistry::get('Nokrelationships', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nokrelationships);

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
