<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DecksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DecksTable Test Case
 */
class DecksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DecksTable
     */
    public $Decks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.decks',
        'app.users',
        'app.deck_cards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Decks') ? [] : ['className' => DecksTable::class];
        $this->Decks = TableRegistry::get('Decks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Decks);

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
