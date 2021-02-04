<?php

namespace App;
// use App\Category;
// use Validator;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['category','title','text','image' ]; // Выбираем те поля которые можем изменять

    public static function rules(){
        $tableNameCategory = (new Category())->getTable();
        return [
            'title'=>'required|min:3|max:120',
            'text'=>'required|min:3|max:10000',
            'image'=>'mimes:jpeg,bmp,png|max:3000',
            'category'=>"required|exists:{$tableNameCategory},id"
        ];
    }
    public static function attrName(){
        return [
            'title'=>'Заголовок',
            'text'=>'Текст',
            'image'=>'Изображение',
            'category'=>'Категория'
        ];
    }
}
