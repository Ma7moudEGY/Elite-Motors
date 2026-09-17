<style>
    :root {
        --elite-gold: #d4a437;
        --elite-dark: #14161a;
        --elite-text: #e8e8e8;
    }

    .navbar-elite {
        background-color: var(--elite-dark) !important;
        border-bottom: 1px solid #292c31;
        padding: 0.9rem 0;
    }

    .navbar-elite .navbar-brand {
        color: #ffffff;
        font-size: 1.2rem;
        font-weight: 700;
        letter-spacing: 0.08em;
    }

    .navbar-elite .navbar-brand i,
    .navbar-elite .nav-link i {
        color: var(--elite-gold);
    }

    .navbar-elite .nav-link {
        color: var(--elite-text) !important;
        font-weight: 500;
        margin: 0 0.35rem;
        padding: 0.55rem 0.75rem !important;
        border-radius: 0.3rem;
    }

    .navbar-elite .nav-link:hover,
    .navbar-elite .nav-link:focus,
    .navbar-elite .nav-link.active,
    .navbar-elite .dropdown-toggle.show {
        background-color: rgba(212, 164, 55, 0.1);
        color: var(--elite-gold) !important;
    }

    .navbar-elite .nav-link i {
        margin-right: 0.4rem;
        font-size: 0.85rem;
    }

    .navbar-elite .dropdown-menu {
        background-color: #1b1e23;
        border: 1px solid var(--elite-gold);
        border-radius: 0.35rem;
        margin-top: 0.45rem;
        min-width: 12rem;
    }

    .navbar-elite .dropdown-item {
        color: var(--elite-text);
        padding: 0.6rem 0.9rem;
    }

    .navbar-elite .dropdown-item:hover,
    .navbar-elite .dropdown-item:focus {
        background-color: var(--elite-gold);
        color: var(--elite-dark);
    }

    .navbar-elite .navbar-toggler {
        border-color: var(--elite-gold);
    }

    .navbar-elite .navbar-toggler:focus {
        box-shadow: 0 0 0 0.2rem rgba(212, 164, 55, 0.25);
    }

    .navbar-elite .user-name {
        color: var(--elite-text);
        font-weight: 600;
        text-decoration: underline;
        text-decoration-color: rgba(212, 164, 55, 0.65);
        text-underline-offset: 0.25rem;
        transition: color 0.2s ease, text-decoration-color 0.2s ease, transform 0.2s ease;
        cursor: pointer;
    }

    .navbar-elite .user-name:hover,
    .navbar-elite .user-name:focus {
        color: var(--elite-gold);
        text-decoration-color: var(--elite-gold);
        transform: translateY(-1px);
    }

    .btn-elite-outline,
    .btn-elite-solid {
        border-radius: 0.3rem;
        font-weight: 600;
        padding: 0.45rem 1rem;
        text-decoration: none;
    }

    .btn-elite-outline {
        border: 1px solid var(--elite-gold);
        color: var(--elite-gold);
    }

    .btn-elite-outline:hover {
        background-color: var(--elite-gold);
        color: var(--elite-dark);
    }

    .btn-elite-solid {
        background-color: var(--elite-gold);
        border: 1px solid var(--elite-gold);
        color: var(--elite-dark);
    }

    .btn-elite-solid:hover {
        background-color: #c1932c;
        border-color: #c1932c;
        color: var(--elite-dark);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark navbar-elite">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <i class="fas fa-car me-2"></i>ELITE MOTORS
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#eliteNav"
            aria-controls="eliteNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="eliteNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">
                        <i class="fas fa-house"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        <i class="fas fa-circle-info"></i>About
                    </a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('cars.*') || request()->routeIs('users.show') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-car-side"></i>Cars
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start">
                            <li><a class="dropdown-item" href="{{ route('cars.index') }}">View All Cars</a></li>
                            <li><a class="dropdown-item" href="{{ route('cars.create') }}">Add a Car</a></li>
                            <li><a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}">My Added Cars</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('rentings.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-key"></i>Rentals
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start">
                            <li><a class="dropdown-item" href="{{ route('rentings.index') }}">My Rented Cars</a></li>
                            <li><a class="dropdown-item" href="{{ route('rentings.create') }}">Rent a Car</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>

            <div class="d-flex flex-wrap align-items-center justify-content-center gap-2">
                @auth
                    <a href="{{ route('users.index') }}" class="user-name me-1 text-decoration-none">
                        <i class="fas fa-user text-warning me-1"></i>{{ Auth::user()->name }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-elite-outline">
                            <i class="fas fa-right-from-bracket me-1"></i>Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-elite-outline">
                        <i class="fas fa-right-to-bracket me-1"></i>Sign In
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-elite-solid">
                        <i class="fas fa-user-plus me-1"></i>Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
