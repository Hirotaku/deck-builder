<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use mtgsdk;

/**
 * Api Controller
 *
 * @property \App\Model\Table\CardsTable $Cards
 */
class ApiController extends AppController
{
    /**
     * initialize
     *
     * @author hagiwara
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
//        $this->Auth->allow(['add', 'edit']);
        $this->loadModel('Cards');
    }
    /**
     * beforeFilter
     *
     * @author hagiwara
     * @param \Cake\Event\Event $event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

    /**
     * getCardsData
     *
     *
     */
    public function getCardsData()
    {
        //SDKでデータを取得
        $cards = mtgsdk\Card::where(['set' => 'xln'])
//            ->where(['rarity' => 'Mythic Rare'])
            ->all();


        //データを保存可能な形に成形していく
        $result = true;
        foreach ($cards as $card) {

            //$card は object
            $saveData = $this->Cards->makeSaveData($card);

            if(!$this->Cards->save($saveData)) {
                debug($card);
                $result = false;
                exit;
            }

        }

        if ($result) {
            $this->Flash->success('取得しました');
            $this->redirect(['controller' => 'Users', 'action' => 'index']);

        } else {
            $this->Flash->error('失敗しました');
        }

    }
}
