<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Category;
use App\News;

class NewsController extends Controller
{
    public function index(){
        $news = News::query()->paginate(9);

        return view('admin.admin')->with('news',$news);
    }

    public function create(Request $request){

        if($request->isMethod('post')){
            //  dd($request->all()); Все что мы отправили из формы + токен
            // $request->except('_token'); Все из формы без токена
            // $request->only('title'); Только title из формы
            // $request -> input('title','text') Вернет инпуты
            $request->flash(); //Создаст одноразовую сессию при переходе
            
           // $data = [];
           
           // $name = null;
           // if($request->file('image')){
              //  $path = \Storage::putFile('public/images', $request->file('image'));
                //  $name = 'http://lproject1/public'.\Storage::url($path);
              //  $name = \Storage::url($path);
                 //$name =env('APP_URL').'/public'.\Storage::url($path);
           // }
            //$news->image = $name;
            //    dd($name , $path);

            // $data[] = [
            //     "title" => $request->title,
            //     "text"=> $request->text,
            //     "category"=>$request->category,
            //     "image"=> $name
            //      ];
                
                $news = new News; //Создали экземпляр класс News
               $name = $this->saveImage($request);
               
                
                $news->image = $name;
                //dd($news->image);
                // dd($news);
                $data = $request->except('_token'); //Получили все данные из request , кроме токена, они приходит в виде 2 массива ,аля ключ значение
                $data['image']= $name;
               // dd($data['image']);
                $this->validate($request,News::rules(),[],News::attrName());
               
                $result = $news->fill($data)->save(); //Заполняем News данными data и сохраняем при помощи save
               // dd($result);
                // $id = array_key_last($data);
               //  $data[$id]['id']=$id;
            // dd($data);
           // File::put(storage_path()."/news.json",json_encode($data,
   // JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

                 //DB::table('news')->insert($data);
                //  dd($data);
                if($result){
                    return redirect()->route('news.show', $news->id)->with('success','Новость добавлена успешно!');
                }else{
                    return redirect()->route('admin.create')->with('error','Ошибка добавления!');
                }
             //СОздание сессии success
        };
        $news = new News; //Создаем чтобы во вьюхе передать не пустое значение
        //dump($request->old()) old() из контроллера

        return view('admin.create',[
            'news'=>$news,
            'categories'=>Category::all()->toArray(),
        ]);
    }
    public function edit(News $news){
        return view('admin.create',[
            'news'=>$news,
            'categories'=>Category::all()->toArray(),
        ]);
    }

    protected function saveImage(Request $request){
        $name = null;
        if($request->file('image')){
            $path = \Storage::putFile('public/images', $request->file('image'));
            $name = \Storage::url($path);
           
        }
        return $name;
    } 

    public function update(Request $request,News $news){ //Мы всегда получаем сюда данные методом пост ,поэтому request
        $this->validate($request,News::rules(),[],News::attrName());
       
        //$data=$request->all();
       // $data['image']=$this->saveImage($request);

       
        $name = $this->saveImage($request);

        $news->image = $name;
           
            $data = $request->except('_token'); //Получили все данные из request , кроме токена, они приходит в виде 2 массива ,аля ключ значение
           // $news->fill($data)->save(); //Заполняем News данными data и сохраняем при помощи save
           $data['image']= $name;
           //dd($news);  
            $result = $news->fill($data)->save();
            
            if($result){
                return redirect()->route('news.show', $news->id)->with('success','Новость изменена успешно!');
            }else{
                return redirect()->route('admin.create')->with('error','Ошибка изменения!');
            }
    }
    public function destroy(News $news){
       $news->delete();
       return redirect()->route('admin.index')->with('success','Новость удалена!');

    }
}
