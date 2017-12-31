<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\DeckCardsTable;
use App\Consts\DeckCardConsts;

/**
 * DeckCards Controller
 *
 * @property DeckCardsTable $DeckCards
 * @method \App\Model\Entity\DeckCard[] paginate($object = null, array $settings = [])
 */
class DeckCardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($deckId)
    {
        $deckCards = $this->paginate($this->DeckCards);

        $this->set(compact('deckCards', 'deckId'));
        $this->set('_serialize', ['deckCards']);
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
     * @param int $deckId
     * @param int $cardId
     * @param int $board
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
            if ($this->insert($deckId, $cardId, $board)) {
//                return true;
            }
        }
        //update
        if ($this->update($deckCardData)) {
//            return true;
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
     * @param string|null $id Deck Card id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deckCard = $this->DeckCards->get($id);
        if ($this->DeckCards->delete($deckCard)) {
            $this->Flash->success(__('The deck card has been deleted.'));
        } else {
            $this->Flash->error(__('The deck card could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
