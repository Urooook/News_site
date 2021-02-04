@extends('layouts.main')

@section('title')
    @parent Категории
@endsection

@section ('menu')
    @include('menu')
@endsection

@section('content')

    @forelse($categories as $category)
        <a href="{{ route('news.category.show', $category['slug']) }}">
            <h2>{{ $category['name'] }}</h2>
        </a>
    @empty
        Нет категорий
    @endforelse
@endsection