<?php
namespace App\Shell;

use Cake\Console\Shell;

use Cake\ORM\TableRegistry;
use App\Controller\ApiController;

class ImportCardsShell extends Shell
{

    public function initialize()
    {
        parent::initialize();
        $this->Api = new ApiController();
    }

    public function main()
    {
        $sets = [
            '2ED',
            '3ED',
            '4ED',
            '4ED',
            '5DN',
            '5ED',
            '6ED',
            '7ED',
            '8ED',
            '9ED',
            'AER',
            'AKH',
            'ALL',
            'APC',
            'ARB',
            'ARN',
            'ATQ',
            'AVR',
            'BBD',
            'BFZ',
            'BNG',
            'BOK',
            'C13',
            'C14',
            'C15',
            'C16',
            'C17',
            'C18',
            'C19',
            'C20',
            'CHK',
            'CM1',
            'CM2',
            'CMA',
            'CMD',
            'CN2',
            'CNS',
            'CON',
            'CSP',
            'DGM',
            'DIS',
            'DKA',
            'DOM',
            'DRK',
            'DST',
            'DTK',
            'ELD',
            'EMN',
            'EVE',
            'EXO',
            '3ED',
            'FEM',
            'FRF',
            'FUT',
            'GPT',
            'GRN',
            'GTC',
            'HML',
            'HOU',
            'ICE',
            'IKO',
            'INV',
            'ISD',
            'JOU',
            'JUD',
            'KLD',
            'KTK',
            'LEA',
            'LEB',
            'LEG',
            'LGN',
            'LRW',
            'M10',
            'M11',
            'M12',
            'M13',
            'M14',
            'M15',
            'M19',
            'M20',
            'M21',
            'MBS',
            'MH1',
            'MIR',
            'MMQ',
            'MOR',
            'MRD',
            'NEM',
            'NPH',
            'ODY',
            'OGW',
            'ONS',
            'ORI',
            'PCY',
            'PLC',
            'PLS',
            'RAV',
            'RIX',
            'RNA',
            'ROE',
            'RTR',
            'SCG',
            'SHM',
            'SOI',
            'SOK',
            'SOM',
            'STH',
            'PSUM',
            'THB',
            'THS',
            'TMP',
            'TOR',
            'TSP',
            'UDS',
            'ULG',
            'USG',
            'VIS',
            'WAR',
            'WTH',
            'WWK',
            'XLN',
            'ZEN'
        ];

        foreach ($sets as $set) {
            //URLたたく
            $this->Api->getDataFromMtgJson($set);

        }

        $this->out('成功！！');
    }

}