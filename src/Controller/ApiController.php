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
     * @param $setName エキスパンションの大文字略称
     */
    public function getDataFromMtgJson($setName)
    {
        //JSON取得
        $cards = $this->getJsonFromMtgJson($setName);

        $result = true;
        foreach ($cards as $card) {
//            debug($card);

            //英語のmultiverseIdが取れないものは画像が表示できないので登録しない。
            //別イラストのデータである可能性が高い。
            if (!isset($card['identifiers']['multiverseId'])) {
                continue;
            }
            $enMultiverseId = $card['identifiers']['multiverseId'];

            //日本語オラクル配列取得
            $japaneseTexts = $this->getJapaneseTexts($card); //取得できないときは、nullになる。
//            debug($japaneseTexts);

            //データ存在チェック
            $saveData = $this->Cards->find()
                ->Where(['multiverseid' => $enMultiverseId])
                ->first();

            if (empty($saveData)) {
                //新規登録
                $beforeSaveData = $this->Cards->newEntity();
                //新規データ成型
                $saveData = $this->Cards->makeSaveDataForMtgJson($beforeSaveData, $setName, $card, $japaneseTexts);
            } else {
                //データ登録済み
                if (is_null($japaneseTexts)) {
                    //日本語の更新メソッドなので、日本語情報がないものはスルー
                    continue;
                }
                //日本語オラクルのみをUPDATE
                if (isset($japaneseTexts['text'])) {
                    $saveData->original_text = $japaneseTexts['text'];
                }
                $saveData->original_type = $japaneseTexts['type'];
            }

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
     * MTGJSONからのJSON取得
     *
     * @param $setInitial エキスパンションの略称
     * @return data
     */
    private function getJsonFromMtgJson($setName)
    {
        $url = 'https://mtgjson.com/api/v5/' . $setName . '.json';
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

        $jsonData = json_decode($json, true);
        $cards = $jsonData['data']['cards'];

        return $cards;

    }

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
