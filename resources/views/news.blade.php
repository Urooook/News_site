@extends('layouts.main')

@section('title')
    @parent Новости   
@endsection

@section('menu')
@include ("menu")
@endsection

@section('content')
<div class="container ">
<h4>Новости</h4> 
<div class="news-container">
@forelse($news as $item)
    <div class="news-card">
   <a href="{{route('news.show',$item->id)}}">{{$item->title}}</a> <br>
   <div class="card-img" style="background-image:url({{$item->image ?? asset('storage/default.jpg')}});"></div>
</div>
@empty 
Нет новостей  
@endforelse
</div>
{{$news->links()}}
</div>
@endsection
