<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Consts\CardConsts;

/**
 * Wants Controller
 *
 * @property \App\Model\Table\WantsTable $Wants
 * @property \App\Controller\Component\WisdumGuildComponent $WisdumGuild
 *
 * @method \App\Model\Entity\Want[] paginate($object = null, array $settings = [])
 */
class WantsController extends AppController
{
    /**
     * initialize
     *
     * @author hirosawa
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('WisdumGuild');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($userId)
    {
        $wants = $this->Wants->getMyWants($userId);

        //各カードの値段取得
        $prices = [];
        $totalPrice = 0;
        foreach ($wants as $want) {
            $price = $this->WisdumGuild->getPrices($want->card->en_name);
            $prices[$want->card_id]['price'] = $price[CardConsts::AVERAGE_PRICE_KEY];
            $countPrice = $want->count * intval(str_replace(',', '', $price[CardConsts::AVERAGE_PRICE_KEY]));
            $prices[$want->card_id]['countPrice'] = number_format($countPrice);
            $totalPrice = $totalPrice + $countPrice;
        }

        $totalPrice = number_format($totalPrice);
        $this->set(compact('wants', 'prices', 'totalPrice'));
        $this->set('_serialize', ['wants']);
    }

    /**
     * View method
     *
     * @param string|null $id Want id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $want = $this->Wants->get($id, [
            'contain' => ['Users', 'Decks', 'Cards']
        ]);

        $this->set('want', $want);
        $this->set('_serialize', ['want']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deckId = $this->request->getData('deckId');
        $cardId = $this->request->getData('cardId');
        $userId = $this->request->getData('userId');

        //レコードがあればupdate, なければinsert
        $wantsCardData = $this->Wants->find()
            ->where([
                'deck_id' => $deckId,
                'card_id' => $cardId,
                'user_id' => $userId
            ])
            ->first();

        if (empty($wantsCardData)) {
            //insert
            $this->insert($deckId, $cardId, $userId);
        } else {
            //update
            $this->update($wantsCardData);
        }

        $this->set(true,'res');
    }

    /**
     * insert
     *
     * @param int $deckId
     * @param int $cardId
     * @param int $userId
     * @return boolean
     */
    public function insert($deckId, $cardId, $userId)
    {
        $deckCard = $this->Wants->newEntity();

        $deckCard->deck_id = $deckId;
        $deckCard->card_id = $cardId;
        $deckCard->user_id = $userId;
        $deckCard->count = 1;
        if ($this->Wants->save($deckCard)) {
            return true;
        }
        return false;
    }

    /**
     * update
     *
     * @param object
     * @return boolean
     */
    public function update($wantsCardData)
    {
        $wantsCardData->count = $wantsCardData->count + 1;

        if ($this->Wants->save($wantsCardData)) {
            return true;
        }
        return false;
    }

    /**
     * Delete method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $deckId = $this->request->getData('deckId');
        $cardId = $this->request->getData('cardId');
        $userId = $this->request->getData('userId');

        $wantsCardData = $this->Wants->find()
            ->where([
                'deck_id' => $deckId,
                'card_id' => $cardId,
                'user_id' => $userId
            ])
            ->first();

        $wantsCardData->count = $wantsCardData->count - 1;
        if ($wantsCardData->count == 0) {
            //枚数が0になったらレコードを削除
            $this->Wants->delete($wantsCardData);
        } else {
            //枚数を減らす
            $this->Wants->save($wantsCardData);
        }

        $this->set(true,'res');
    }
}
