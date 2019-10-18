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

    const IMG_MANASYMBOLE_0 = '0.jpg';
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

    const IMG_MANASYMBOLE_WHITE_BLUE = 'white_blue.jpg';
    const IMG_MANASYMBOLE_WHITE_BLACK = 'white_black.jpg';
    const IMG_MANASYMBOLE_WHITE_RED = 'white_red.jpg';
    const IMG_MANASYMBOLE_WHITE_GREEN = 'white_green.jpg';
    const IMG_MANASYMBOLE_BLUE_BLACK = 'blue_black.jpg';
    const IMG_MANASYMBOLE_BLUE_RED = 'blue_red.jpg';
    const IMG_MANASYMBOLE_BLUE_GREEN = 'blue_green.jpg';
    const IMG_MANASYMBOLE_BLACK_RED = 'black_red.jpg';
    const IMG_MANASYMBOLE_BLACK_GREEN = 'black_green.jpg';
    const IMG_MANASYMBOLE_RED_GREEN = 'red_green.jpg';

    const LIST_MANASYMBOLE_IMG = [
       '0' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_0,
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
       'X' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_X,
        //混生マナ
        'W/U' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_WHITE_BLUE,
        'W/B' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_WHITE_BLACK,
        'R/W' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_WHITE_RED,
        'G/W' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_WHITE_GREEN,

        'U/B' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_BLUE_BLACK,
        'U/R' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_BLUE_RED,
        'U/G' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_BLUE_GREEN,

        'B/R' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_BLACK_RED,
        'B/G' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_BLACK_GREEN,

        'R/G' => self::FILEPATH_IMG_MANASYMBOLE . self::IMG_MANASYMBOLE_RED_GREEN,

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
    const RARITY_MYTHIC_RARE = 'Mythic';

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

    //アリーナデッキコード出力時の分割カード名前補完
    const HALFCARDS_NAME_LIST = [
        //GRN
        '発見' => '発見 // 発散',
        '発散' => '発見 // 発散',
        '反転' => '反転 // 観点',
        '観点' => '反転 // 観点',
        '席次' => '席次 // 石像',
        '石像' => '席次 // 石像',
        '完全' => '完全 // 間隙',
        '間隙' => '完全 // 間隙',
        '開花' => '開花 // 華麗',
        '華麗' => '開花 // 華麗',
        '詭謀' => '詭謀 // 奇策',
        '奇策' => '詭謀 // 奇策',
        '発展' => '発展 // 発破',
        '発破' => '発展 // 発破',
        '採取' => '採取 // 最終',
        '最終' => '採取 // 最終',
        '反応' => '反応 // 反正',
        '反正' => '反応 // 反正',
        '確証' => '確証 // 確率',
        '確率' => '確証 // 確率',
        //RNA
        '解任' => '解任 // 開展',
        '開展' => '解任 // 開展',
        '昇華' => '昇華 // 消耗',
        '消耗' => '昇華 // 消耗',
        '興行' => '興行 // 叩打',
        '叩打' => '興行 // 叩打',
        '争闘' => '争闘 // 壮大',
        '壮大' => '争闘 // 壮大',
        '孵化' => '孵化 // 不和',
        '不和' => '孵化 // 不和',
        '万全' => '万全 // 番人',
        '番人' => '万全 // 番人',
        '回生' => '回生 // 会稽',
        '会稽' => '回生 // 会稽',
        '豪奢' => '豪奢 // 誤認',
        '誤認' => '豪奢 // 誤認',
        '強撃' => '強撃 // 脅威',
        '脅威' => '強撃 // 脅威',
        '覆滅' => '覆滅 // 複製',
        '複製' => '覆滅 // 複製',
    ];

    const HALFCARDS_NAME_LIST_EN = [
        //GRN
        'Discovery' => 'Discovery // Dispersal',
        'Dispersal' => 'Discovery // Dispersal',
        'Invert' => 'Invert // Invent',
        'Invent' => 'Invert // Invent',
        'Status' => 'Status // Statue',
        'Statue' => 'Status // Statue',
        'Integrity' => 'Integrity // Intervention',
        'Intervention' => 'Integrity // Intervention',
        'Flower' => 'Flower // Flourish',
        'Flourish' => 'Flower // Flourish',
        'Connive' => 'Connive // Concoct',
        'Concoct' => 'Connive // Concoct',
        'Expansion' => 'Expansion // Explosion',
        'Explosion' => 'Expansion // Explosion',
        'Find' => 'Find // Finality',
        'Finality' => 'Find // Finality',
        'Response' => 'Response // Resurgence',
        'Resurgence' => 'Response // Resurgence',
        'Assure' => 'Assure // Assemble',
        'Assemble' => 'Assure // Assemble',
        //RNA
        'Depose' => 'Depose // Deploy',
        'Deploy' => 'Depose // Deploy',
        'Consecrate' => 'Consecrate // Consume',
        'Consume' => 'Consecrate // Consume',
        'Carnival' => 'Carnival // Carnage',
        'Carnage' => 'Carnival // Carnage',
        'Collision' => 'Collision // Colossus',
        'Colossus' => 'Collision // Colossus',
        'Incubation' => 'Incubation // Incongruity',
        'Incongruity' => 'Incubation // Incongruity',
        'Warrant' => 'Warrant // Warden',
        'Warden' => 'Warrant // Warden',
        'Revival' => 'Revival // Revenge',
        'Revenge' => 'Revival // Revenge',
        'Bedeck' => 'Bedeck // Bedazzle',
        'Bedazzle' => 'Bedeck // Bedazzle',
        'Thrash' => 'Thrash // Threat',
        'Threat' => 'Thrash // Threat',
        'Repudiate' => 'Repudiate // Replicate',
        'Replicate' => 'Repudiate // Replicate'


    ];
}