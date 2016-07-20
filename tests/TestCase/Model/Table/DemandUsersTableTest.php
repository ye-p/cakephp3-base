<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DemandUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DemandUsersTable Test Case
 */
class DemandUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DemandUsersTable
     */
    public $DemandUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.demand_users',
        'app.logins'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DemandUsers') ? [] : ['className' => 'App\Model\Table\DemandUsersTable'];
        $this->DemandUsers = TableRegistry::get('DemandUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DemandUsers);

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
