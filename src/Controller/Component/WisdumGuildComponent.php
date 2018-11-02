<?php
declare(strict_types = 1);
namespace App\Controller\Component;
use Cake\Controller\Component;
use Goutte\Client;

/**
 * Wisdum Guildスクレイピング用
 *
 */
class WisdumGuildComponent extends component
{
    public function getPrices($enName)
    {
        $client = new Client();
        //空白文字を+に置換
        $keyWord = str_replace(' ', '+', $enName);
        $url = 'http://wonder.wisdom-guild.net/price/' . $keyWord;

        //取得とDOM構築
        $crawler = $client->request('GET',$url);

        //要素の取得
        $prices = $crawler->filter('b')->each(function($element){
            return $element->text();
        });

        $prices['url'] = $url;

        return $prices;
    }
}