@extends('layouts.main')

@section('title')
    @parent Новости   
@endsection

@section('menu')
@include ("menu")
@endsection

@section('content')
<!-- <h4>Новость 1</h4> -->
<div class="container newsOne">
    <h2>{{$news->title}}</h2>
    <div class="card-img" style="background-image: url({{$news->image?? asset('storage/default.jpg')}})"></div>
    <p>{!!$news->text!!}</p>
</div>
@endsection