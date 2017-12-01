<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

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
}
