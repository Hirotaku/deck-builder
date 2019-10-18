<?php
namespace App\View\Helper;

use Cake\View\Helper;
use App\Consts\CardConsts;

class CardDetailHelper extends Helper
{
    /**
     * ManaSymbols
     * マナシンボルアイコンの画像表示
     * シンボルの画像パスを返す
     *
     */
    public function manaSymbols($manaCost)
    {
        if (is_null($manaCost)) {
            //主に土地
            return false;
        }

        //一文字ずつに分割
        $arrayManaCosts = str_split($manaCost);
        $manaSymbols = [];
        foreach ($arrayManaCosts as $str) {
            switch ($str) {
                //区切りの始まりでリセット
                case '{':
                    $tmpStr = '';
                    break;

                case '}':
                    $manaSymbols[] = $tmpStr;
                    break;

                default;
                    $tmpStr = $tmpStr.$str;
                    break;
            }
        }

        //上記の配列を使って、画像パスないしaタグリンクへと変換する
        $manaSymbolImgPaths = [];
        foreach ($manaSymbols as $symbole) {
            $manaSymbolImgPaths[] = CardConsts::LIST_MANASYMBOLE_IMG[$symbole];
        }

        return $manaSymbolImgPaths;
    }

    public function cardNameForImportCode($cardData, $lang)
    {
        $name = $cardData->name;
        $set = $cardData->set;
        $number = $cardData->number;
        $targetHalfCardList = CardConsts::HALFCARDS_NAME_LIST;

        if ($lang == 'en') {
            $name = $cardData->en_name;
            $targetHalfCardList = CardConsts::HALFCARDS_NAME_LIST_EN;
        }

        //分割カードの場合、名前を補完する
        if (array_key_exists($name, $targetHalfCardList)) {
            $name = $targetHalfCardList[$name];
            $number = substr($number, 0, -1); //文字列最後についているa,bの表記を削る
        }

        $string = $name . ' (' . $set . ') ' . $number;
        return $string;
    }

}