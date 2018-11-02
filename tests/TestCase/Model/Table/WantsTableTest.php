<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WantsTable Test Case
 */
class WantsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WantsTable
     */
    public $Wants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wants',
        'app.users',
        'app.decks',
        'app.deck_cards',
        'app.cards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Wants') ? [] : ['className' => WantsTable::class];
        $this->Wants = TableRegistry::get('Wants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Wants);

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
