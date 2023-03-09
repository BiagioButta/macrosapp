
    <nav id="sidebarMenu" class="bg-dark navbar-dark">
        <a href="/" class="nav-link text-white" ><h2 class="p-2"><i class="fa-solid fa-square-rss"></i> Boolpress</h2></a>
        <ul class="nav flex-column">
            <li class="nav-item"> <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}" href="{{ route('dashboard') }}">
                <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
            </a></li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dishes.index' ? 'bg-secondary' : '' }}" href="{{ route('admin.dishes.index') }}">
                    <i class="fa-solid fa-newspaper fa-lg fa-fw"></i> Dishes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.ingredients.index' ? 'bg-secondary' : '' }}" href="{{ route('admin.ingredients.index') }}">
                    <i class="fa-solid fa-newspaper fa-lg fa-fw"></i> Ingredients
                </a>
            </li>
        </ul>
    </nav>

