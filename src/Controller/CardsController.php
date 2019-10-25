<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component;

/**
 * Cards Controller
 *
 * @property \App\Model\Table\CardsTable $Cards
 * @property \App\Model\Table\DeckCardsTable $DeckCards
 * @property \App\Model\Table\DecksTable $Decks
 * @property \App\Model\Table\WantsTable $Wants
 * @property \App\Controller\Component\WisdumGuildComponent $WisdumGuild
 *
 * @method \App\Model\Entity\Card[] paginate($object = null, array $settings = [])
 */
class CardsController extends AppController
{
    public $paginate = [
        'limit' => 10
    ];

    /**
     * initialize
     *
     * @author hirosawa
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Search.Prg', [
            'actions' => ['searchIndex']
        ]);
        $this->loadModel('DeckCards');
        $this->loadModel('Decks');
        $this->loadModel('Wants');
        $this->loadComponent('WisdumGuild');
    }


    /**
     * searchIndex method
     * カード検索画面
     *
     * @return \Cake\Http\Response|void
     */
    public function searchIndex($deckId)
    {
        $deck = $this->Decks->findById($deckId)->first();

        $this->set(compact('deckId'));
        $this->set(compact('deck'));

        if (!empty($this->request->getQuery())) {
            $this->redirect(['action' => 'list', $deckId, '?' => $this->request->getQuery()]);
        }
    }

    /**
     * searchIndex method
     * カード検索画面
     *
     * @param int $deckId
     * @return \Cake\Http\Response|void
     */
    public function list($deckId)
    {
        $query = $this->Cards->find('search', ['search' => $this->request->getQuery()])
                ->order(['id' => 'DESC']);
        $this->set('cards', $this->paginate($query));
        $this->set(compact('deckId'));
    }

    /**
     * View method
     *
     * @param int $deckId
     * @param int $cardId
     * @return \Cake\Http\Response|void
     */
    public function view($deckId, $cardId)
    {
        $deck = $this->Decks->get($deckId);
        $userId = $deck->user_id;

        $card = $this->Cards->get($cardId, [
            'contain' => ['DeckCards']
        ]);

        $counts = $this->DeckCards->getCounts($deckId, $cardId);

        //値段取得
        $prices = $this->WisdumGuild->getPrices($card->en_name);
        $wants = $this->Wants->getThisCard($cardId, $userId, $deckId);

        //todo: 両面の場合、表示ctpを切り替える。裏面側を取得する。
        //todo: 裏面を選択しても、表面で表示する必要がある。

        $this->Pack->set(compact('deckId', 'cardId', 'userId'));
        $this->set(compact('card', 'counts', 'deck', 'prices', 'wants', 'userId'));
        $this->set('_serialize', ['card']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $card = $this->Cards->newEntity();
        if ($this->request->is('post')) {
            $card = $this->Cards->patchEntity($card, $this->request->getData());
            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The card could not be saved. Please, try again.'));
        }
        $this->set(compact('card'));
        $this->set('_serialize', ['card']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $card = $this->Cards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $card = $this->Cards->patchEntity($card, $this->request->getData());
            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The card could not be saved. Please, try again.'));
        }
        $this->set(compact('card'));
        $this->set('_serialize', ['card']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $card = $this->Cards->get($id);
        if ($this->Cards->delete($card)) {
            $this->Flash->success(__('The card has been deleted.'));
        } else {
            $this->Flash->error(__('The card could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
