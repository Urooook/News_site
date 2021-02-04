{{-- <a href="{{route('Home')}}">Главная</a>
<a href="{{route('admin.index')}}">Админка</a>
<a href="{{route('admin.test1')}}">test1</a>
<a href="{{route('admin.test2')}}">test2</a> --}}


    {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
    
  
      
        <li class="nav-item {{ request()->routeIs('Home')? 'active':''}}">
            <a class="nav-link" href="{{route('Home')}}">Главная</a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.index')? 'active':''}}">
            <a class="nav-link" href="{{route('admin.index')}}">Админка</a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.create')? 'active':''}}">
            <a class="nav-link" href="{{route('admin.create')}}">Создать новость</a>
        </li>
    <li class="nav-item {{ request()->routeIs('admin.test1')? 'active':''}}">
        <a class="nav-link" href="{{route('admin.parser')}}">Парсить</a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.test2')? 'active':''}}">
            <a class="nav-link" href="{{route('admin.test2')}}">test2</a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.updateUser')? 'active':''}}">
            <a class="nav-link" href="{{route('admin.updateUser')}}">Пользователи</a>
        </li>
      
        
       
      