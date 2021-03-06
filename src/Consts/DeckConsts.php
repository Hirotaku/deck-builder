<?php
namespace App\Consts;
/**
 * DeckCardConsts
 *
 * @author hirosawa
 */
class DeckConsts
{
    //format id
    const FORMAT_STANDARD = 1;
    const FORMAT_MODERN = 2;
    const FORMAT_LEGACY = 3;
    const FORMAT_VINTAGE = 4;
    const FORMAT_COMMANDER = 5;
    const FORMAT_PIONEER = 6;

    const FORMAT_LISTS = [
        self::FORMAT_STANDARD => 'スタンダード',
        self::FORMAT_PIONEER => 'パイオニア',
        self::FORMAT_MODERN => 'モダン',
        self::FORMAT_LEGACY => 'レガシー',
        self::FORMAT_VINTAGE => 'ヴィンテージ',
        self::FORMAT_COMMANDER => '統率者',
    ];

    const FORMAT_COLUMN_LISTS = [
        self::FORMAT_STANDARD => 'standard',
        self::FORMAT_MODERN => 'modern',
        self::FORMAT_LEGACY => 'legacy',
        self::FORMAT_VINTAGE => 'vintage',
        self::FORMAT_COMMANDER => 'commander',
        self::FORMAT_PIONEER => 'pioneer',
    ];

    const FORMAT_VIEW_LISTS = [
        self::FORMAT_STANDARD => 'Standard',
        self::FORMAT_MODERN => 'Modern',
        self::FORMAT_LEGACY => 'Legacy',
        self::FORMAT_VINTAGE => 'Vintage',
        self::FORMAT_COMMANDER => 'Commander',
        self::FORMAT_PIONEER => 'Pioneer',
    ];
}