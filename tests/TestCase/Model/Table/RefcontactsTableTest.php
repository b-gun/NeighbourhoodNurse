<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RefcontactsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RefcontactsTable Test Case
 */
class RefcontactsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RefcontactsTable
     */
    public $Refcontacts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.refcontacts',
        'app.referrers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Refcontacts') ? [] : ['className' => 'App\Model\Table\RefcontactsTable'];
        $this->Refcontacts = TableRegistry::get('Refcontacts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Refcontacts);

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
