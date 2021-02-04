@extends('layouts.main')

@section('title','Создать новость')
{{-- @dump($errors) --}}
@section('menu')
@include ("admin.menu")
@endsection
{{-- @dump($categories) --}}
{{-- @dump(old()) --}}
{{--   //Через old() мы достаем все данные из одноразовой сессии, в нашем случае все данные из отправленной формы --}}
@section('content')
<div class="container">
<h2>Создание новости</h2> <br>

<form enctype="multipart/form-data" action="@if(!$news->id){{route('admin.create')}}@else{{route('admin.update',$news)}}@endif" method="post">

    @csrf   {{--  //Создание токена полбзователя --}}

    <div class="form-group">
        <label for="newsTitle">Заголовок новости:</label>
        @if($errors->has('title'))
        {{--  Если в массиве ошибок есть поле title, то есть не выполнилась валидация для этого поля --}}
        <div class="alert alert-danger" role="alert">
          @foreach($errors->get('title') as $error)
          {{-- Получили все ошибки,даже текст каждой ошибки, все можно просмотреть включив выше @dump(errors) --}}
          {{$error}}
          @endforeach
        </div>

        @endif
    <input type="text" name='title' id="newsTitle" class="form-control" value="{{old('title') ?? $news->title}}"> 
    {{-- Мы news передаем только в режиме правки,поэтому при создании новости все будет окей --}}
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Категория новости</label>
        <select name="category" class="form-control" id="exampleFormControlSelect1">
            @forelse($categories as $item)

            @if(old('category'))
        <option @if ($item['id']== old('category')) selected @endif value="{{$item['id']}}">{{$item['name']}}</option>
            @else
            <option @if ($item['id']== $news->category) selected @endif value="{{$item['id']}}">{{$item['name']}}</option>   
            @endif
            
            @empty
            <option value="0" selected>Нет новостей</option>
            @endforelse
        </select>
      </div>

      <div class="form-group">
        <label for="textEdit">Текст новости</label>
        @if($errors->has('text'))
        <div class="alert alert-danger" role="alert">
          @foreach($errors->get('text') as $error)
          {{$error}}
          @endforeach
        </div>

        @endif
        <textarea name ="text" class="form-control" id="textEdit" rows="3">{!! old('text') ?? $news->text !!}</textarea>
      </div>

      <div class="form-group">
        {{-- <label for="exampleFormControlTextarea1">Текст новости</label> --}}
        @if($errors->has('image'))
        {{--  Если в массиве ошибок есть поле title, то есть не выполнилась валидация для этого поля --}}
        <div class="alert alert-danger" role="alert">
          @foreach($errors->get('image') as $error)
          {{-- Получили все ошибки,даже текст каждой ошибки, все можно просмотреть включив выше @dump(errors) --}}
          {{$error}}
          @endforeach
        </div>

        @endif
        <input type="file" name="image">
      </div>

<div class="form-group">
    <input type="submit" value="@if($news->id)Изменить@elseДобавить@endif" class="btn btn-outline-primary">
</div>  

</form>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>
<script>
  CKEDITOR.replace('textEdit', options);
  </script>

</div>
@endsection