<?php

namespace App\Http\Controllers;

use App\Radical;
use DOMElement;
use DOMText;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeController extends Controller
{
    public function getRadicals()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://www.archchinese.com/arch_chinese_radicals.html');
        $page = ($res->getBody()->getContents());

        $crawler = new Crawler($page);

        $chinese = $crawler->filter('tr');

        $tableRows = $chinese->each(function (Crawler $node, $i) {
            return $node->children();
        });

        $models = [];
        $uri = null;
        $i = 0;
        foreach ($tableRows as $row) {
            $j = 0;
            foreach ($row as $td) {
                $data = new Crawler($td);
                if ($i > 1) {
                    $models[$i][$j] = $data->text();
                    if ($j === 1) {
                        if ($data->getNode(0)->firstChild instanceof DOMText) {
                            $uri = null;
                        } else {
                            $uri = $data->getNode(0)->firstChild->getAttribute('href');
                        }
                    }
                }
                $j++;
                if ($j === 6 && $i !== 1) {
                    $models[$i][$j] = $uri;
                }
            }
            $i++;
        }

        $this->storeRadicals($models);
    }

    private function storeRadicals($models)
    {
        foreach ($models as $model) {
            Radical::create([
                'radical_number' => $model[0],
                'radical' => $model[1],
                'english' => $model[2],
                'pinyin' => $model[3],
                'stroke_count' => $model[4],
                'variants' => $model[5],
                'uri' => $model[6]
            ]);
        }
        return 'success';
    }
}
