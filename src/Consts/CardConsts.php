<?php
namespace App\Consts;
/**
 * DeckCardConsts
 *
 * @author hirosawa
 */
class CardConsts
{
    //マナシンボル画像パス
    const FILEPATH_IMG_MANASYMBOLE = 'mana_symbols/';

    const IMG_MANASYMBOLE_1 = '1.jpg';
    const IMG_MANASYMBOLE_2 = '2.jpg';
    const IMG_MANASYMBOLE_3 = '3.jpg';
    const IMG_MANASYMBOLE_4 = '4.jpg';
    const IMG_MANASYMBOLE_5 = '5.jpg';
    const IMG_MANASYMBOLE_6 = '6.jpg';
    const IMG_MANASYMBOLE_7 = '7.jpg';
    const IMG_MANASYMBOLE_8 = '8.jpg';
    const IMG_MANASYMBOLE_9 = '9.jpg';
    const IMG_MANASYMBOLE_10 = '10.jpg';
    const IMG_MANASYMBOLE_11 = '11.jpg';
    const IMG_MANASYMBOLE_12 = '12.jpg';
    const IMG_MANASYMBOLE_13 = '13.jpg';
    const IMG_MANASYMBOLE_15 = '15.jpg';
    const IMG_MANASYMBOLE_X = 'x.jpg';

    const IMG_MANASYMBOLE_WHITE = 'white.jpg';
    const IMG_MANASYMBOLE_BLUE = 'blue.jpg';
    const IMG_MANASYMBOLE_BLACK = 'black.jpg';
    const IMG_MANASYMBOLE_RED = 'red.jpg';
    const IMG_MANASYMBOLE_GREEN = 'green.jpg';

    const LIST_MANASYMBOLE_IMG = [
       '1' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_1,
       '2' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_2,
       '3' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_3,
       '4' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_4,
       '5' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_5,
       '6' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_6,
       '7' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_7,
       '8' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_8,
       '9' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_9,
       '10' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_10,
       '11' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_11,
       '12' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_12,
       '13' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_13,
       '15' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_15,
       'W' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_WHITE,
       'U' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_BLUE,
       'B' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_BLACK,
       'R' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_RED,
       'G' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_GREEN,
    ];

    //検索画面でのセレクトボックス要素等
    //色
    const COLOR_IDENTITY_WHITE = 'W';
    const COLOR_IDENTITY_BLUE = 'U';
    const COLOR_IDENTITY_BLACK = 'B';
    const COLOR_IDENTITY_RED = 'R';
    const COLOR_IDENTITY_GREEN = 'G';

    const LIST_COLOR_IDENTITY = [
        self::COLOR_IDENTITY_WHITE => '白',
        self::COLOR_IDENTITY_BLUE => '青',
        self::COLOR_IDENTITY_BLACK => '黒',
        self::COLOR_IDENTITY_RED => '赤',
        self::COLOR_IDENTITY_GREEN => '緑',
    ];

    //カードタイプ
    const CARD_TYPE_CREATURE = 'Creature';
    const CARD_TYPE_SORCERY = 'Sorcery';
    const CARD_TYPE_INSTANT = 'Instant';
    const CARD_TYPE_ENCHANTMENT = 'Enchantment';
    const CARD_TYPE_ARTIFACT = 'Artifact';
    const CARD_TYPE_PLANESWALKER = 'Planeswalker';
    const CARD_TYPE_LAND = 'Land';

    const LIST_CARD_TYPE = [
        self::CARD_TYPE_CREATURE => 'クリーチャー',
        self::CARD_TYPE_SORCERY => 'ソーサリー',
        self::CARD_TYPE_INSTANT => 'インスタント',
        self::CARD_TYPE_ENCHANTMENT => 'エンチャント',
        self::CARD_TYPE_ARTIFACT => 'アーティファクト',
        self::CARD_TYPE_PLANESWALKER => 'プレインズウォーカー',
        self::CARD_TYPE_LAND => '土地',
    ];

    //サブタイプ => DBから取得
    //セット名 => DBから

    //レアリティ
    const RARITY_COMMON = 'Common';
    const RARITY_UNCOMMON = 'Uncommon';
    const RARITY_RARE = 'Rare';
    const RARITY_MYTHIC_RARE = 'Mythic Rare';

    const LIST_RARITY = [
        self::RARITY_COMMON => 'コモン',
        self::RARITY_UNCOMMON => 'アンコモン',
        self::RARITY_RARE => 'レア',
        self::RARITY_MYTHIC_RARE => '神話レア',
    ];

    //Wisdum Guild関連
    const LOWEST_PRICE_KEY = 0; // 0 => 最安
    const AVERAGE_PRICE_KEY = 1; // 1 => 平均
    const LOWEST_PRICE_IN_SOLD_OUT_KEY = 2; // 2 => 売り消れ含む最安
    const HIGHEST_PRICE_KEY = 3; // 3 => 最高額
}