<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Wants Controller
 *
 * @property \App\Model\Table\WantsTable $Wants
 *
 * @method \App\Model\Entity\Want[] paginate($object = null, array $settings = [])
 */
class WantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Decks', 'Cards']
        ];
        $wants = $this->paginate($this->Wants);

        $this->set(compact('wants'));
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

//    /**
//     * Edit method
//     *
//     * @param string|null $id Want id.
//     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
//     * @throws \Cake\Network\Exception\NotFoundException When record not found.
//     */
//    public function edit($id = null)
//    {
//        $want = $this->Wants->get($id, [
//            'contain' => []
//        ]);
//        if ($this->request->is(['patch', 'post', 'put'])) {
//            $want = $this->Wants->patchEntity($want, $this->request->getData());
//            if ($this->Wants->save($want)) {
//                $this->Flash->success(__('The want has been saved.'));
//
//                return $this->redirect(['action' => 'index']);
//            }
//            $this->Flash->error(__('The want could not be saved. Please, try again.'));
//        }
//        $users = $this->Wants->Users->find('list', ['limit' => 200]);
//        $decks = $this->Wants->Decks->find('list', ['limit' => 200]);
//        $cards = $this->Wants->Cards->find('list', ['limit' => 200]);
//        $this->set(compact('want', 'users', 'decks', 'cards'));
//        $this->set('_serialize', ['want']);
//    }
//
//    /**
//     * Delete method
//     *
//     * @param string|null $id Want id.
//     * @return \Cake\Http\Response|null Redirects to index.
//     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
//     */
//    public function delete($id = null)
//    {
//        $this->request->allowMethod(['post', 'delete']);
//        $want = $this->Wants->get($id);
//        if ($this->Wants->delete($want)) {
//            $this->Flash->success(__('The want has been deleted.'));
//        } else {
//            $this->Flash->error(__('The want could not be deleted. Please, try again.'));
//        }
//
//        return $this->redirect(['action' => 'index']);
//    }
}
