<header>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="py-3">
                <a href="{{ route('home') }}">
                    <img src="{{Vite::asset('resources/img/dc-logo.png')}}" alt="DC logo">
                </a>
            </div>
            <div class="my-div">
                <ul class="d-flex justify-content-between">
                    <li class="{{ Route::currentRouteName() == 'home' ? 'selected-page' : '' }}">
                        <a href="{{ route('home') }}">HOME</a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'comics' ? 'selected-page' : '' }}">
                        <a href="{{ route('comics') }}">COMICS</a>
                    </li>
                    <li>MOVIES</li>
                    <li>TV</li>
                    <li>GAMES</li>
                    <li>COLLECTIBLES</li>
                    <li>VIDEO</li>
                    <li>FANS</li>
                    <li class="{{ Route::currentRouteName() == 'about' ? 'selected-page' : '' }}">
                        <a href="{{ route('about') }}">ABOUT</a>
                    </li>
                    <li>SHOP</li>
                </ul>
            </div>
        </div>
    </div>
</header>
