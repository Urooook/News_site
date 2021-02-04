@extends('layouts.main')

@section('title')
    @parent Админка
@endsection

@section('menu')
@include ("admin.menu")
@endsection
@section('content')
<div class="container">
    <h4>CRUD News</h4>
    
    @forelse($news as $item)
       <a href="{{route('news.show',$item->id)}}"><h4>{{$item->title}}</h4></a>
       <a href="{{route('admin.edit',$item)}}" class="btn btn-success">Edit</a>
       <a href="{{route('admin.destroy',$item->id)}}" class="btn btn-danger">Delete</a> 
       <br><hr>
       {{-- Можно писать $item->id или просто $item, laravel сам поймет и извлечет данные id --}}
    @empty 
    Нет новостей  
    @endforelse
    {{$news->links()}}
    </div>
@endsection
