<?php

namespace App\Http\Controllers;

use App\Character;
use App\Radical;
use DOMElement;
use DOMText;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeController extends Controller
{
    public static function startScrape()
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

        static->storeRadicals($models);
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
        $this->scrapeCharacters();
    }

    public function scrapeCharacters()
    {
        $radicals = Radical::all();

        foreach ($radicals as $radical) {
            if ($radical->unicode() !== 'no_uri') {
                $res = Http::asForm()->post(
                    'https://www.archchinese.com/getSimpRadicalByUnicode',
                    [
                        'unicode' => $radical->unicode()
                    ]
                );
                $characters = explode('@', $res->body());
                // 0 = char, 1 = pinyin, 2 = english, 3 = stroke count
                if (isset($characters)) {
                    $char = '';
                    $pinyin = '';
                    $english = '';
                    $strokeCount = 0;
                    for ($i = 0; $i < count($characters); $i++) {
                        if ($i % 4 === 0) {
                            $char = explode('$', $characters[$i]);
                            $char = end($char);
                        } elseif ($i % 4 === 1) {
                            $pinyin = $characters[$i];
                        } elseif ($i % 4 === 2) {
                            $english = $characters[$i];
                        } elseif ($i % 4 === 3) {
                            $strokeCount = $characters[$i];
                            $character = Character::create([
                                'character' => $char,
                                'pinyin' => $pinyin,
                                'meaning' => $english,
                                'stroke_count' => $strokeCount
                            ]);
                            $character->radicals()->attach($radical->id);
                        }
                    }
                }
            }
        }

        $this->fix();
    }

    public function fix()
    {
        $c = Character::find(6074);
        $c->update(['character' => '杴']);
        $c->save();
    }
}
