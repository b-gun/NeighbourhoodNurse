<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiseaseSpecificsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiseaseSpecificsTable Test Case
 */
class DiseaseSpecificsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DiseaseSpecificsTable
     */
    public $DiseaseSpecifics;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.disease_specifics'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DiseaseSpecifics') ? [] : ['className' => 'App\Model\Table\DiseaseSpecificsTable'];
        $this->DiseaseSpecifics = TableRegistry::get('DiseaseSpecifics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DiseaseSpecifics);

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
}
