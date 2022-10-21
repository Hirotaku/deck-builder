<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Log\Log;
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
     * @author hirosawa
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
     * @author hirosawa
     * @param \Cake\Event\Event $event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

    /**
     * index
     *
     * @author hirosawa
     * @return void
     */
    public function index()
    {
        if ($this->request->is('post')) {
    
            if (!empty($this->request->getData())) {

                $setName = $this->request->getData('set_name');
                $type = $this->request->getData('type');

                //怖いので保存の場合でIfをかける
                if ($type == 1) {
                    $this->redirect(['action' => 'getCardsData', $setName]);
                } else {
                    //チェック
                    $this->redirect(['action' => 'checkCardsData', $setName]);
                }

            }
        }

        // セット名の一覧があるMTG Wikiのリンク
        $setNameList = 'http://mtgwiki.com/wiki/%E3%82%AB%E3%83%BC%E3%83%89%E3%82%BB%E3%83%83%E3%83%88%E4%B8%80%E8%A6%A7';
        $this->set(compact('setNameList'));

    }

        /**
     * getCardsData
     *
     *
     */
    public function checkCardsData($set)
    {
        //SDKでデータを取得
        $cards = mtgsdk\Card::where(['set' => $set])
            ->all();

        var_dump($cards);exit;
        
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
            ->all();
        

        //データを保存可能な形に成形していく
        $result = true;
        foreach ($cards as $card) {

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
                if (isset($japaneseTexts['type'])) {
                    $saveData->original_type = $japaneseTexts['type'];
                }
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
            Log::error($card);
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
