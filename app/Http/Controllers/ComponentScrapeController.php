<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComponentScrapeController extends Controller
{
    public function start()
    {
        $response = new Client();
            
        
        $response = $response->post('http://xh.5156edu.com/index.php', [
                'headers' => [
            'Host'=> 'xh.5156edu.com',
            'User-Agent'=> 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv=>77.0) Gecko/20100101 Firefox/77.0',
            'Accept'=> 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
            'Accept-Language'=> 'en-GB,en;q=0.5',
            'Accept-Encoding'=> 'gzip, deflate',
            'Content-Type'=> 'application/x-www-form-urlencoded',
            // 'Content-Length'=> 56,
            'Origin'=> 'http://xh.5156edu.com',
            'Connection'=> 'keep-alive',
            'Referer'=> 'http://xh.5156edu.com/html3/2757.html',
            'Upgrade-Insecure-Requests' => '1' 
                ],
            'f_key' => '%D3%C9',
            'f_type' => 'zi',
            'SearchString.x' => '0',
            'SearchString.y' => '0'
        ]);

        dd($response->getHeaders());

        dd(response($response)->withHeaders([
            'Content-Language' => 'zh-cn',
            'Content-Type' => 'text/html; charset=gb2312'
        ]));

    }
}
