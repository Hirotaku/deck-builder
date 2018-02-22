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
    const PLAIN_CARD_ID = 250;
    const ISLAND_CARD_ID = 253;
    const SWAMP_CARD_ID = 257;
    const MOUNTAIN_CARD_ID = 259;
    const FOREST_CARD_ID = 262;

    const BASIC_LAND_IDS = [
        'plain' => self::PLAIN_CARD_ID,
        'island' => self::ISLAND_CARD_ID,
        'swamp' => self::SWAMP_CARD_ID,
        'mountain' => self::MOUNTAIN_CARD_ID,
        'forest' => self::FOREST_CARD_ID
    ];
}