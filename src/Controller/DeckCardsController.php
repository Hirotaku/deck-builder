<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DeckCards Controller
 *
 *
 * @method \App\Model\Entity\DeckCard[] paginate($object = null, array $settings = [])
 */
class DeckCardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $deckCards = $this->paginate($this->DeckCards);

        $this->set(compact('deckCards'));
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
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deckCard = $this->DeckCards->newEntity();
        if ($this->request->is('post')) {
            $deckCard = $this->DeckCards->patchEntity($deckCard, $this->request->getData());
            if ($this->DeckCards->save($deckCard)) {
                $this->Flash->success(__('The deck card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deck card could not be saved. Please, try again.'));
        }
        $this->set(compact('deckCard'));
        $this->set('_serialize', ['deckCard']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Deck Card id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deckCard = $this->DeckCards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deckCard = $this->DeckCards->patchEntity($deckCard, $this->request->getData());
            if ($this->DeckCards->save($deckCard)) {
                $this->Flash->success(__('The deck card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deck card could not be saved. Please, try again.'));
        }
        $this->set(compact('deckCard'));
        $this->set('_serialize', ['deckCard']);
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
