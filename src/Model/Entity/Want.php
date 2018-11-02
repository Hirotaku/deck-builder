<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Want Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $deck_id
 * @property int $card_id
 * @property int $count
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Deck $deck
 * @property \App\Model\Entity\Card $card
 */
class Want extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
