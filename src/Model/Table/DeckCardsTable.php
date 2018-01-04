<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Consts\DeckCardConsts;

/**
 * DeckCards Model
 *
 * @property \App\Model\Table\DecksTable|\Cake\ORM\Association\BelongsTo $Decks
 * @property \App\Model\Table\CardsTable|\Cake\ORM\Association\BelongsTo $Cards
 *
 * @method \App\Model\Entity\DeckCard get($primaryKey, $options = [])
 * @method \App\Model\Entity\DeckCard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DeckCard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DeckCard|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeckCard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DeckCard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DeckCard findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DeckCardsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('deck_cards');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Decks', [
            'foreignKey' => 'deck_id'
        ]);
        $this->belongsTo('Cards', [
            'foreignKey' => 'card_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('memo')
            ->allowEmpty('memo');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['deck_id'], 'Decks'));
        $rules->add($rules->existsIn(['card_id'], 'Cards'));

        return $rules;
    }

    /**
     * getCounts
     * カード詳細画面にて
     * そのデッキに含まれているメイン、サイドの枚数を取得
     *
     * @param int $deckId
     * @param int $cardId
     * @return object
     */
    public function getCounts($deckId, $cardId)
    {
        $deckCards = $this->find()
            ->where([
                'deck_id' => $deckId,
                'card_id' => $cardId
            ])
            ->all();

        $counts = $this->newEntity();
        $counts->main_counts = 0;
        $counts->side_counts = 0;
        if ($deckCards->isEmpty()) {
            return $counts;
        }

        foreach ($deckCards as $deckCard) {
            if ($deckCard->board == DeckCardConsts::MAIN_BOARD_ID) {
                $counts->main_counts = $deckCard->count;

            } elseif ($deckCard->board == DeckCardConsts::MAIN_BOARD_ID) {
                $counts->side_counts = $deckCard->count;

            }
        }

        return $counts;
    }

    /**
     * getMainDeckCreatures
     * メインデッキのクリーチャーカード
     *
     * @param int $deckId
     * @return object
     */
    public function getMainDeckCreatures($deckId)
    {
        return $this->find()
            ->where([
                'DeckCards.deck_id' => $deckId,
                'DeckCards.board' => DeckCardConsts::MAIN_BOARD_ID,
                'Cards.types' => 'Creature'
            ])
            ->contain(['Cards'])
            ->order(['Cards.cmc' => 'ASC'])
            ->all();
    }

    /**
     * getMainDeckSpells
     * メインデッキのスペル
     *
     * @param int $deckId
     * @return object
     */
    public function getMainDeckSpells($deckId)
    {
        return $this->find()
            ->where([
                'DeckCards.deck_id' => $deckId,
                'DeckCards.board' => DeckCardConsts::MAIN_BOARD_ID,
                'Cards.types NOT IN' => ['Creature', 'Land']
            ])
            ->contain(['Cards'])
            ->order(['Cards.cmc' => 'ASC'])
            ->all();
    }

    /**
     * getMainDeckSpells
     * メインデッキの土地
     *
     * @param int $deckId
     * @return object
     */
    public function getMainDeckLands($deckId)
    {
        return $this->find()
            ->where([
                'DeckCards.deck_id' => $deckId,
                'DeckCards.board' => DeckCardConsts::MAIN_BOARD_ID,
                'Cards.types' => 'Land'
            ])
            ->contain(['Cards'])
            ->order(['Cards.cmc' => 'ASC'])
            ->all();
    }

    /**
     * getMainDeckSpells
     * サイドボード
     *
     * @param int $deckId
     * @return object
     */
    public function getSideBoards($deckId)
    {
        return $this->find()
            ->where([
                'DeckCards.deck_id' => $deckId,
                'DeckCards.board' => DeckCardConsts::SIDE_BOARD_ID,
            ])
            ->contain(['Cards'])
            ->order(['Cards.cmc' => 'ASC'])
            ->all();
    }

    /**
     * getBasicLandCounts
     * 基本土地の枚数
     *
     * @param int $deckId
     * @return object
     */
    public function getBasicLandCounts($deckId)
    {
        $basicLands = $this->find()
            ->where([
                'deck_id' => $deckId,
                'Cards.type LIKE' => '%Basic Land%'
            ])
            ->contain(['Cards'])
            ->all();

        $counts = $this->newEntity();
        $counts->plain = 0;
        $counts->island = 0;
        $counts->swamp = 0;
        $counts->mountain = 0;
        $counts->forest = 0;
        foreach ($basicLands as $basicLand) {
            switch ($basicLand->card->color_identity) {
                case "W" :
                    $counts->plain = $basicLand->count;
                    break;

                case "U" :
                    $counts->island = $basicLand->count;
                    break;

                case "B" :
                    $counts->swamp = $basicLand->count;
                    break;

                case "R" :
                    $counts->mountain = $basicLand->count;
                    break;

                case "G" :
                    $counts->forest = $basicLand->count;
                    break;
            }
        }

        return $counts;
    }
}
