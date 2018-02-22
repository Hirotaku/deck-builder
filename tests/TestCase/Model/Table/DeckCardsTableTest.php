<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeckCardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeckCardsTable Test Case
 */
class DeckCardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeckCardsTable
     */
    public $DeckCards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.deck_cards',
        'app.decks',
        'app.users',
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
        $config = TableRegistry::exists('DeckCards') ? [] : ['className' => DeckCardsTable::class];
        $this->DeckCards = TableRegistry::get('DeckCards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeckCards);

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
