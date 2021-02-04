{{-- <a href="{{route('Home')}}">Главная</a>
<a href="{{route('news.index')}}">Новости</a>
<a href="{{route('news.category.index')}}">Категории</a>
<a href="{{route('admin.index')}}">Админка</a><br> --}}


    {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
    {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> --}}
    
        <li class="nav-item {{ request()->routeIs('Home')? 'active':''}}">
            <a class="nav-link" href="{{route('Home')}}">Главная</a>
        </li>
    <li class="nav-item {{ request()->routeIs('news.index')? 'active':''}}">
            <a class="nav-link" href="{{route('news.index')}}">Новости</a>
        </li>
        <li class="nav-item {{ request()->routeIs('news.category.index')? 'active':''}}">
            <a class="nav-link" href="{{route('news.category.index')}}">Категории</a>
        </li>
        @if(Auth::user()->is_admin)
        <li class="nav-item {{ request()->routeIs('admin.index')? 'active':''}}">
            <a class="nav-link" href="{{route('admin.index')}}">Админка</a>
        </li>
        @endif
      
