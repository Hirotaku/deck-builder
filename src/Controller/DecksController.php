<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Decks Controller
 *
 * @property \App\Model\Table\DecksTable $Decks
 *
 * @method \App\Model\Entity\Deck[] paginate($object = null, array $settings = [])
 */
class DecksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $decks = $this->paginate($this->Decks);

        $this->set(compact('decks'));
        $this->set('_serialize', ['decks']);
    }

    /**
     * build method
     *
     * @param int $deckId
     * @return \Cake\Http\Response|void
     */
    public function build($deckId)
    {

    }



    /**
     * View method
     *
     * @param string|null $id Deck id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deck = $this->Decks->get($id, [
            'contain' => ['Users', 'DeckCards']
        ]);

        $this->set('deck', $deck);
        $this->set('_serialize', ['deck']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deck = $this->Decks->newEntity();
        if ($this->request->is('post')) {
            $deck = $this->Decks->patchEntity($deck, $this->request->getData());
            if ($this->Decks->save($deck)) {
                $this->Flash->success(__('The deck has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deck could not be saved. Please, try again.'));
        }
        $users = $this->Decks->Users->find('list', ['limit' => 200]);
        $this->set(compact('deck', 'users'));
        $this->set('_serialize', ['deck']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Deck id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deck = $this->Decks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deck = $this->Decks->patchEntity($deck, $this->request->getData());
            if ($this->Decks->save($deck)) {
                $this->Flash->success(__('The deck has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deck could not be saved. Please, try again.'));
        }
        $users = $this->Decks->Users->find('list', ['limit' => 200]);
        $this->set(compact('deck', 'users'));
        $this->set('_serialize', ['deck']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Deck id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deck = $this->Decks->get($id);
        if ($this->Decks->delete($deck)) {
            $this->Flash->success(__('The deck has been deleted.'));
        } else {
            $this->Flash->error(__('The deck could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}