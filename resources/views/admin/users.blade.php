@extends('layouts.main')

@section('title')
    @parent Админка
@endsection

@section('menu')
@include ("admin.menu")
@endsection
@section('content')
{{-- @dump($users) --}}
<div class="container">
    <h2>Пользователи</h2>
    @forelse ($users as $user)
        <div class="card-body">
            {{$user->name}} 
            @if($user->is_admin)
        <a href="{{route('admin.toggleAdmin',$user)}}" class="btn btn-danger">Снять админа</a>
            @else
            <a href="{{route('admin.toggleAdmin',$user)}}" class="btn btn-success">Назначить админом</a>
            @endif
        </div>
    @empty
        <p>Нет пользователей...</p>
    @endforelse
</div>
@endsection