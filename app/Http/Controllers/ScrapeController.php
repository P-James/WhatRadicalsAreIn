<?php

namespace App\Http\Controllers;

use DOMElement;
use DOMText;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeController extends Controller
{
    public function storeRadicals()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://www.archchinese.com/arch_chinese_radicals.html');
        $page = ($res->getBody()->getContents());

        $crawler = new Crawler($page);

        $chinese = $crawler->filter('tr');

        $tableRows = $chinese->each(function (Crawler $node, $i) {
            return $node->children();
        });

        $model = [];
        $i = 0;
        foreach ($tableRows as $row) {
            $j = 0;
            foreach ($row as $td) {
                $data = new Crawler($td);
                if ($i > 2) {
                    $model[$i][$j] = $data->text();
                }
                $j++;
            }
            $i++;
        }
    }
}
