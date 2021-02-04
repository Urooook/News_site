<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NewsController extends Controller
{
    public function index(){
        // $news = [];
        //$news = DB::table('news')->get();
         $news = News::query()->paginate(9); //Запрос чтобы выдавал все по 5, limit 5
        return view('news')->with('news',$news);
    }

    public function show(News $news){ //Ожидаем модель News с параметром news из роута
       // $news = DB::table('news')->find($id);

        // if(!empty($news)){
        //     return view('newsOne')->with('news',$news);
        // }else{
        //     return redirect()->route('news.index');
        // }
        return view('newsOne')->with('news',$news);
    }
}
