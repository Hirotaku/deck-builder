<?php
namespace App\Consts;
/**
 * DeckCardConsts
 *
 * @author hirosawa
 */
class DeckCardConsts
{
    //board id
    const MAIN_BOARD_ID = 1;
    const SIDE_BOARD_ID = 2;
    const STOCK_BOARD_ID = 3;

    //基本土地カードid
    //※191018 基本土地のIDをアリーナコードのためにELDのものに変更
    const PLAIN_CARD_ID = 4463;
    const ISLAND_CARD_ID = 4395;
    const SWAMP_CARD_ID = 4530;
    const MOUNTAIN_CARD_ID = 4433;
    const FOREST_CARD_ID = 4353;

    const BASIC_LAND_IDS = [
        'plain' => self::PLAIN_CARD_ID,
        'island' => self::ISLAND_CARD_ID,
        'swamp' => self::SWAMP_CARD_ID,
        'mountain' => self::MOUNTAIN_CARD_ID,
        'forest' => self::FOREST_CARD_ID
    ];
}