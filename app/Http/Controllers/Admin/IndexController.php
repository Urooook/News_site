<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\News;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\FilesystemManager;
//  use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    

    

    public function test1(){
        return view('admin.test1');
    }

    public function test2(){
        return view('admin.test2');
    }
}
