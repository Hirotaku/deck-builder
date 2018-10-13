<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cards Model
 *
 * @property \App\Model\Table\DeckCardsTable|\Cake\ORM\Association\HasMany $DeckCards
 *
 * @method \App\Model\Entity\Card get($primaryKey, $options = [])
 * @method \App\Model\Entity\Card newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Card[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Card|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Card patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Card[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Card findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CardsTable extends Table
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

        $this->setTable('cards');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('DeckCards', [
            'foreignKey' => 'card_id'
        ]);
        $this->addBehavior('Search.Search');
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
            ->scalar('name')
            ->allowEmpty('name');

        $validator
            ->scalar('multiverseid')
            ->allowEmpty('multiverseid');

        $validator
            ->scalar('layout')
            ->allowEmpty('layout');

        $validator
            ->scalar('names')
            ->allowEmpty('names');

        $validator
            ->scalar('manaCost')
            ->allowEmpty('manaCost');

        $validator
            ->scalar('cmc')
            ->allowEmpty('cmc');

        $validator
            ->scalar('type')
            ->allowEmpty('type');

        $validator
            ->scalar('supertypes')
            ->allowEmpty('supertypes');

        $validator
            ->scalar('subtypes')
            ->allowEmpty('subtypes');

        $validator
            ->scalar('rarity')
            ->allowEmpty('rarity');

        $validator
            ->scalar('text')
            ->allowEmpty('text');

        $validator
            ->scalar('flavor')
            ->allowEmpty('flavor');

        $validator
            ->scalar('artist')
            ->allowEmpty('artist');

        $validator
            ->scalar('number')
            ->allowEmpty('number');

        $validator
            ->scalar('power')
            ->allowEmpty('power');

        $validator
            ->scalar('toughness')
            ->allowEmpty('toughness');

        $validator
            ->scalar('loyalty')
            ->allowEmpty('loyalty');

        $validator
            ->scalar('variations')
            ->allowEmpty('variations');

        $validator
            ->scalar('watermark')
            ->allowEmpty('watermark');

        $validator
            ->scalar('border')
            ->allowEmpty('border');

        $validator
            ->scalar('timeshifted')
            ->allowEmpty('timeshifted');

        $validator
            ->scalar('hand')
            ->allowEmpty('hand');

        $validator
            ->scalar('life')
            ->allowEmpty('life');

        $validator
            ->scalar('reserved')
            ->allowEmpty('reserved');

        $validator
            ->scalar('releaseDate')
            ->allowEmpty('releaseDate');

        $validator
            ->scalar('starter')
            ->allowEmpty('starter');

        $validator
            ->scalar('rulings')
            ->allowEmpty('rulings');

        $validator
            ->scalar('foreignNames')
            ->allowEmpty('foreignNames');

        $validator
            ->scalar('printings')
            ->allowEmpty('printings');

        $validator
            ->scalar('originalText')
            ->allowEmpty('originalText');

        $validator
            ->scalar('originalType')
            ->allowEmpty('originalType');

        $validator
            ->scalar('legalities')
            ->allowEmpty('legalities');

        $validator
            ->scalar('source')
            ->allowEmpty('source');

        $validator
            ->scalar('imageUrl')
            ->allowEmpty('imageUrl');

        $validator
            ->scalar('set')
            ->allowEmpty('set');

        $validator
            ->scalar('setName')
            ->allowEmpty('setName');

        $validator
            ->scalar('cardId')
            ->allowEmpty('cardId');

        return $validator;
    }

    /**
     * @return \Search\Manager
     */
    public function searchManager()
    {
        $searchManager = $this->behaviors()->Search->searchManager();
        $searchManager
            ->like('name', [
                'before' => true,
                'after' => true,
            ])
            ->value('cmc')
            ->like('color_identity',  [
                'multiValue' => true,
                'before' => true,
                'after' => true,
            ])
            ->add('types', 'Search.value', [
                'multiValue' => true,
            ])
            ->add('rarity', 'Search.value', [
                'multiValue' => true,
            ])
            ->value('set', [
//                'multiValue' => true,
            ])
            ->like('text', [
                'before' => true,
                'after' => true,
            ])
            ->value('power')
            ->value('toughness')
            //format
            ->value('standard')
            ->value('modern')
            ->value('legacy')
            ->value('vintage')
            ->value('commander')

            ;


        return $searchManager;
    }

    /**
     * makeSaveData
     * 取得したカードデータを保存する形に成形
     *
     * @param object $card
     * @return object
     */
    public function makeSaveData($card)
    {
        $saveData = $this->newEntity();
        //データセット
        $saveData->en_name = $card->name;
        if (isset($card->manaCost)) {
            $saveData->manacost = $card->manaCost;
        }
        if (isset($card->cmc)) {
            $saveData->cmc = $card->cmc;
        }
        if (isset($card->colors)) {
            $saveData->colors = implode(',', $card->colors); //配列をカンマ区切りに。
        }
        if (isset($card->colorIdentity)) {
            $saveData->color_identity = implode(',', $card->colorIdentity); //配列をカンマ区切りに。
        }
        $saveData->type = $card->type;
        if (isset($card->supertypes)) {
            $saveData->supertypes = implode(',', $card->supertypes); //配列をカンマ区切りに。あるときないとき。
        }
        $saveData->types = implode(',', $card->types); //配列をカンマ区切りに。
        if (isset($card->subtypes)) {
            $saveData->subtypes = implode(',', $card->subtypes); //配列をカンマ区切りに。　クリーチャーのみ？PWある
        }
        $saveData->rarity = $card->rarity;
        $saveData->set = $card->set;
        $saveData->setname = $card->setName;
        if (isset($card->text)) {
            $saveData->text = $card->text;
        }
        if (isset($card->flavor)) {
            $saveData->flavor = $card->flavor;
        }
        $saveData->artist = $card->artist;
        $saveData->number = $card->number;
        /* クリーチャーのみ */
        if (isset($card->power)) {
            $saveData->power = $card->power;
            $saveData->toughness = $card->toughness;
        }
        /*----------------*/
        $saveData->layout = $card->layout;
        $saveData->multiverseid = $card->multiverseid;
        $saveData->en_image_url = $card->imageUrl;
        if (isset($card->loyalty)) {
            $saveData->loyalty = $card->loyalty; //PWのみ。忠誠度
        }
        //rulings saveするか要検討 クリーチャーにはない ->Saveしない。
        if (isset($card->foreignNames)) {
            $saveData = $this->setForeignNamesData($saveData, $card->foreignNames);
        } else {
            $saveData->name = '';
            $saveData->image_url = '';
            $saveData->jp_multiverseid = '';
        }
        $saveData->printings = implode(',', $card->printings); //配列をカンマ区切りに。
        if (isset($card->originalText)) {
            $saveData->original_text = $card->originalText;
        }
        if (isset($card->originalType)) {
            $saveData->original_type = $card->originalType;
        }
        if (isset($card->legalities)) {
            $saveData = $this->setLegalitiesData($saveData, $card->legalities);
        } else {
            //発売前では、リーガル情報がない。
            $saveData = $this->setLegalitiesDataBeforeRelease($saveData);
        }
        $saveData->api_id = $card->id;

        return $saveData;
    }


    /**
     * setForeignNamesData
     *
     * @param object $saveData
     * @param array $foreignArray
     * @return object
     */
    private function setForeignNamesData($saveData, $foreignArray)
    {
        foreach ($foreignArray as $foreign) {
            if ($foreign['language'] == 'Japanese') {
                $saveData->name = $foreign['name'];
                $saveData->image_url = $foreign['imageUrl'];
                $saveData->jp_multiverseid = $foreign['multiverseid'];
            }
        }

        return $saveData;
    }

    /**
     * setLegalitiesData
     *
     * @param object $saveData
     * @param array $legalitiesArray
     * @return object
     */
    private function setLegalitiesData($saveData, $legalitiesArray)
    {
        foreach ($legalitiesArray as $key => $legal) {
            if ($legal['legality'] == 'Legal') {
                $boolean = true;
            } else {
                $boolean = false;
            }
            switch ($legal['format']){
                case 'Commander': //Commander
                    $saveData->commander = $boolean;
                    break;
                case 'Modern': //Modern
                    $saveData->modern = $boolean;
                    break;
                case 'Legacy': //Legacy
                    $saveData->legacy = $boolean;
                    break;
                case 'Standard': //Standard
                    $saveData->standard = $boolean;
                    break;
                case 'Vintage': //Vintage
                    $saveData->vintage = $boolean;
                    break;
            }
        }

        return $saveData;
    }

    /**
     * setLegalitiesDataBeforeRelease
     * 発売前の製品にリーガル情報をセット
     * ※基本的に発売前からBANされることはないので、
     * すべて許可でセットする
     *
     * @param object $saveData
     * @return object
     */
    private function setLegalitiesDataBeforeRelease($saveData)
    {
        $saveData->commander = true;
        $saveData->modern = true;
        $saveData->legacy = true;
        $saveData->standard = true;
        $saveData->vintage = true;

        return $saveData;
    }

}
