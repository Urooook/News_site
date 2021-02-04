<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use App\Services\XMLParserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;
use App\Jobs\NewsParsing;

class ParserController extends Controller
{
    public function index(XMLParserService $parserService) {
       // $start = date('c');



        $rssLinks = [
            'https://lenta.ru/rss/news',
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
           // 'https://news.yandex.ru/fire.rss',
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/nhl.rss',

        ];

        foreach ($rssLinks as $rssLink) {
            NewsParsing::dispatch($rssLink);
        }

       // return $start . ' --- ' . date('c');
        //return view('admin.index');
        return redirect()->route('news.category.index');
    }
}