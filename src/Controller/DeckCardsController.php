<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\DeckCardsTable;
use App\Consts\DeckCardConsts;
use App\Model\Table\DecksTable;

/**
 * DeckCards Controller
 *
 * @property DeckCardsTable $DeckCards
 * @property DecksTable $Decks
 * @method \App\Model\Entity\DeckCard[] paginate($object = null, array $settings = [])
 */
class DeckCardsController extends AppController
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

        $this->loadModel('Decks');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($deckId)
    {
        $deck = $this->Decks->get($deckId);

        $mainDeckCreatures = $this->DeckCards->getMainDeckCreatures($deckId);
        $mainDeckSpells = $this->DeckCards->getMainDeckSpells($deckId);
        $mainDeckLands = $this->DeckCards->getMainDeckLands($deckId);

        $sideBoards = $this->DeckCards->getSideBoards($deckId);
        $stocks = $this->DeckCards->getStocks($deckId);

        //各枚数
        $counts['creatures'] = $this->getCounts($mainDeckCreatures);
        $counts['spells'] = $this->getCounts($mainDeckSpells);
        $counts['lands'] = $this->getCounts($mainDeckLands);
        $counts['sideboards'] = $this->getCounts($sideBoards);
        $counts['total'] = $counts['creatures'] + $counts['spells'] + $counts['lands'];

        $this->set(compact(
            'deck', 'mainDeckCreatures',
            'mainDeckSpells', 'mainDeckLands', 'sideBoards',
            'stocks', 'counts'
        ));
        $this->set('_serialize', ['deckCards']);
    }

    /**
     * getCounts method
     *
     * @param entity $cards
     * @return int
     */
    private function getCounts($cards)
    {
        $count = 0;
        foreach ($cards as $card) {
            $count = $count + $card->count;
        }

        return $count;
    }

    /**
     * View method
     *
     * @param string|null $id Deck Card id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deckCard = $this->DeckCards->get($id, [
            'contain' => []
        ]);

        $this->set('deckCard', $deckCard);
        $this->set('_serialize', ['deckCard']);
    }

    /**
     * Add method
     *
     * @return boolean
     */
    public function add()
    {
        $deckId = $this->request->getData('deckId');
        $cardId = $this->request->getData('cardId');
        $board = $this->request->getData('board');

        //レコードがあればupdate, なければinsert
        $deckCardData = $this->DeckCards->find()
            ->where([
                'deck_id' => $deckId,
                'card_id' => $cardId,
                'board' => $board
            ])
            ->first();

        if (empty($deckCardData)) {
            //insert
            $this->insert($deckId, $cardId, $board);
        } else {
            //update
            $this->update($deckCardData);
        }

        $this->set(true,'res');
    }

    /**
     * insert
     *
     * @param int $deckId
     * @param int $cardId
     * @param int $board
     * @return boolean
     */
    public function insert($deckId, $cardId, $board)
    {
        $deckCard = $this->DeckCards->newEntity();

        $deckCard->deck_id = $deckId;
        $deckCard->card_id = $cardId;
        $deckCard->board = $board;
        $deckCard->count = 1;
        if ($this->DeckCards->save($deckCard)) {
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
    public function update($deckCardData)
    {
        $deckCardData->count = $deckCardData->count + 1;

        if ($this->DeckCards->save($deckCardData)) {
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
        $board = $this->request->getData('board');

        $deckCardData = $this->DeckCards->find()
            ->where([
                'deck_id' => $deckId,
                'card_id' => $cardId,
                'board' => $board
            ])
            ->first();

        $deckCardData->count = $deckCardData->count - 1;
        if ($deckCardData->count == 0) {
            //枚数が0になったらレコードを削除
            $this->DeckCards->delete($deckCardData);
        } else {
            //枚数を減らす
            $this->DeckCards->save($deckCardData);
        }

        $this->set(true,'res');
    }

    /**
     * basicLands
     * 基本土地追加
     *
     * @param int $deckId
     */
    public function basicLands($deckId)
    {
        $deck = $this->Decks->get($deckId);
        //枚数初期値
        $counts = $this->DeckCards->getBasicLandCounts($deckId);

        //基本土地のカードid呼び出し
        $basicLandIds = DeckCardConsts::BASIC_LAND_IDS;

        $this->Pack->set(compact('deckId', 'basicLandIds'));
        $this->set(compact('deck', 'counts', 'basicLandIds'));
    }

}
