<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wants Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DecksTable|\Cake\ORM\Association\BelongsTo $Decks
 * @property \App\Model\Table\CardsTable|\Cake\ORM\Association\BelongsTo $Cards
 *
 * @method \App\Model\Entity\Want get($primaryKey, $options = [])
 * @method \App\Model\Entity\Want newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Want[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Want|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Want patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Want[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Want findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WantsTable extends Table
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

        $this->setTable('wants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
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
            ->integer('count')
            ->allowEmpty('count');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['deck_id'], 'Decks'));
        $rules->add($rules->existsIn(['card_id'], 'Cards'));

        return $rules;
    }

    /**
     * 特定のカード枚数取得
     *
     * @param $cardId
     * @param $userId
     * @param $deckId
     * @return array|\Cake\Datasource\EntityInterface|null
     */
    public function getThisCard($cardId, $userId, $deckId)
    {
        $wants = $this->find()
            ->where([
                'card_id' => $cardId,
                'user_id' => $userId,
                'deck_id' => $deckId,
            ])
            ->first();

        if (empty($wants)) {
            $wants = $this->newEntity();
            $wants->count = 0;
        }

        return $wants;
    }
}
