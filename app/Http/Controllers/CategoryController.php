<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $catigories = Category::all()->toArray();
        return view('categories')->with('categories',$catigories);
    }

    public function show($name) {

        $categories = Category::query()->where('slug',$name)->get();
        $news = News::query()->where('category',$categories[0]->id)->get();
        

        return view('category')->with('news', $news);
    }

}