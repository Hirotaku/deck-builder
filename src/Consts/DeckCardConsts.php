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
    const PLAIN_CARD_ID = 15678;
    const ISLAND_CARD_ID = 15610;
    const SWAMP_CARD_ID = 15745;
    const MOUNTAIN_CARD_ID = 15648;
    const FOREST_CARD_ID = 15568;

    const BASIC_LAND_IDS = [
        'plain' => self::PLAIN_CARD_ID,
        'island' => self::ISLAND_CARD_ID,
        'swamp' => self::SWAMP_CARD_ID,
        'mountain' => self::MOUNTAIN_CARD_ID,
        'forest' => self::FOREST_CARD_ID
    ];
}