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
    public function getCardsData($set)
    {
        //SDKでデータを取得
        $cards = mtgsdk\Card::where(['set' => $set])
//            ->where(['rarity' => 'Mythic Rare'])
            ->all();
        var_dump($cards);exit;
        //データを保存可能な形に成形していく
        $result = true;
        foreach ($cards as $card) {
//            debug($card);exit;

            //日本語限定アートへの対応
            if (!isset($card->multiverseid) && !isset($card->imageUrl)) {
                //レコード重複となるので無視する。
                continue;
            }

            //$card は object
            $saveData = $this->Cards->makeSaveData($card);

            if(!$this->Cards->save($saveData)) {

                $result = false;
            }

        }

        if ($result) {
            $this->Flash->success('取得しました');
            $this->redirect(['controller' => 'Users', 'action' => 'index']);

        } else {
            $this->Flash->error('失敗しました');
        }

    }

    /**
     * getDataFromMtgJson
     *
     */
    public function getDataFromMtgJson($setName)
    {
        $setName = 'IKO'; //３文字略称　saveの時に使用する。

        $url = 'https://mtgjson.com/api/v5/' . $setName . '.json';
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

        $jsonData = json_decode($json, true);
        $cards = $jsonData['data']['cards'];

        $result = true;
        foreach ($cards as $card) {
//            debug($card);

            //日本語限定アートへの対応（灯争大戦のPW）
            //何かしら対応いるかも？

            //英語のmultiverseIdが取れないものは画像が表示できないので登録しない。
            //別イラストのデータである可能性が高い。
            if (!isset($card['identifiers']['multiverseId'])) {
                continue;
            }

            $japaneseTexts = $this->getJapaneseTexts($card); //取得できないときは、nullになる。
//            debug($japaneseTexts);

            //☆ここで既存データがあるかチェックする機構を入れる
            //メソッドにしてしまった方がいい
            $beforeSaveData = $this->Cards->newEntity();

            //データ成型
            $saveData = $this->Cards->makeSaveDataForMtgJson($beforeSaveData, $setName, $card, $japaneseTexts);

            if(!$this->Cards->save($saveData)) {

                $result = false;
                return;
            }
        }

        if ($result) {
            $this->Flash->success('取得しました');
            $this->redirect(['controller' => 'Users', 'action' => 'index']);

        } else {
            $this->Flash->error('失敗しました');
            //エラーが起きた配列を表示
            var_dump($card);
            exit;
        }
    }


    /* ==================== private method =====================  */

    /**
     *
     * 日本語テキストの配列を取得 for MTGJSON
     *
     */
    private function getJapaneseTexts($card)
    {
        foreach ($card['foreignData'] as $foreignDatum) {

            if ($foreignDatum['language'] != 'Japanese') {
                continue;
            }

            return $foreignDatum;
        }
    }

}
