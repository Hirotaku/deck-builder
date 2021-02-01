<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Statics\UserInfo;

/**
 * Decks Controller
 *
 * @property \App\Model\Table\DecksTable $Decks
 *
 * @method \App\Model\Entity\Deck[] paginate($object = null, array $settings = [])
 */
class DecksController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Wants');

    }

    /**
     * Index method
     *
     * @param int $userId
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $query = $this->Decks->find()
            ->where(['user_id' => UserInfo::$user['id']])
            ->order(['modified' => 'DESC']);
        $decks = $this->paginate($query, ['limit' => 5]);

        $this->set(compact('decks'));
        $this->set('_serialize', ['decks']);
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
                $this->Flash->success(__('デッキリストを作成しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('デッキリストを作成できませんでした。もう一度作成してください。'));
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
                $this->Flash->success(__('更新しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('更新できませんでした。もう一度お願いします。'));
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

        $wants = $this->Wants->find()
            ->where(['deck_id' => $id])
            ->all();

        //WANTSリストも削除
        foreach ($wants as $want) {
            if (!$this->Wants->deleteAll($want)) {
                $this->Flash->error(__('The wants could not be deleted. Please, try again.'));
            }
        }


        if ($this->Decks->delete($deck)) {
            $this->Flash->success(__('The deck has been deleted.'));
        } else {
            $this->Flash->error(__('The deck could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * 公開リスト一覧
     */
    public function publicIndex()
    {
        //todo: 検索欲しい

        $query = $this->Decks->find()
            ->where(['Decks.public_flag' => true])
            ->contain(['Users'])
            ->order(['Decks.modified' => 'DESC']);
        $decks = $this->paginate($query, ['limit' => 5]);

        $this->set(compact('decks'));
        $this->set('_serialize', ['decks']);
    }

    public function allowPublic($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deck = $this->Decks->get($id);

        $deck->public_flag = true;

        if ($this->Decks->save($deck)) {
            $this->Flash->success(__('公開しました。'));

            return $this->redirect(['controller' => 'DeckCards', 'action' => 'index', $id]);
        }
    }

    public function notPublic($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deck = $this->Decks->get($id);

        $deck->public_flag = false;

        if ($this->Decks->save($deck)) {
            $this->Flash->success(__('非公開にしました。'));

            return $this->redirect(['controller' => 'DeckCards', 'action' => 'index', $id]);
        }
    }
}
