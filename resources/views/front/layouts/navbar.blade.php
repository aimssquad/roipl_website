<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/ronaklogo.png') }}" alt="">
            {{-- <h1 class="sitename">ROIPL</h1> --}}
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('index') }}" class="{{ Route::currentRouteName() == 'index' ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">Our Story</a></li>
                <li><a href="{{ route('brands') }}" class="{{ Route::currentRouteName() == 'brands' ? 'active' : '' }}">Brands</a></li>
                <li><a href="{{ route('events') }}" class="{{ Route::currentRouteName() == 'events' ? 'active' : '' }}">Life@ROIPL</a></li>
                <li><a href="{{ route('teams') }}" class="{{ Route::currentRouteName() == 'teams' ? 'active' : '' }}">Teams</a></li>
                <li><a href="{{ route('visionnaire') }}" class="{{ Route::currentRouteName() == 'visionnaire' ? 'active' : '' }}">Visionnaire</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>
