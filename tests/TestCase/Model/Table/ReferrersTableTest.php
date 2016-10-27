<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReferrersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReferrersTable Test Case
 */
class ReferrersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReferrersTable
     */
    public $Referrers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.referrers',
        'app.patients',
        'app.users',
        'app.visits',
        'app.refcontacts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Referrers') ? [] : ['className' => 'App\Model\Table\ReferrersTable'];
        $this->Referrers = TableRegistry::get('Referrers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Referrers);

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
