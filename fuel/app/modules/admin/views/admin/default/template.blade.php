<!doctype html>
<html lang="en" class="has-navbar-fixed-top">
<head>
    <meta charset="UTF-8">
    <title>Admin | The Nameless Magazine</title>

    {!! Asset::css('bulma.css') !!}
    {!! Asset::css('ionicons.min.css') !!}

    @yield('stylesheets')
</head>
<body>
<nav class="navbar is-dark is-fixed-top">
    <div class="container">
        <div class="navbar-brand">
            <a href="/" class="navbar-item">TNM</a>
        </div>
        <div class="navbar-menu navbar-end">
            <div class="navbar-item has-dropdown is-hoverable">
                <a href="/admin/account" class="navbar-link">
                    <span class="icon"><i class="icon ion-person"></i></span>{{ Auth::get('username') }}
                </a>

                <div class="navbar-dropdown">
                    <a href="/admin/account" class="navbar-item">Tableau de bord perso</a>
                    <a href="/admin/account/user" class="navbar-item">Paramètres du compte</a>
                </div>
            </div>
            <a href="/logout" class="navbar-item">Déconnexion</a>
        </div>
    </div>
</nav>

<div class="container is-fluid">
    <div class="columns">
        <div class="column section is-one-quarter">
            <div class="panel">
                <p class="panel-heading">
                    Administration
                </p>

                <a href="/admin" class="panel-block {{ ($page == 'dashboard' ? 'is-active': '') }}">
                    Dashboard
                </a>
                <a href="/admin/categories" class="panel-block {{ ($page == 'categories' ? 'is-active': '') }}">
                    Catégories
                </a>
                <a href="/admin/articles" class="panel-block {{ ($page == 'articles' ? 'is-active': '') }}">
                    Articles
                </a>
                <a href="/admin/users" class="panel-block {{ ($page == 'users' ? 'is-active': '') }}">
                    Utilisateurs
                </a>
                <a href="/admin/settings" class="panel-block {{ ($page == 'settings' ? 'is-active': '') }}">
                    Paramètres
                </a>
            </div>
        </div>

        <div class="column section">
            @yield('content')
        </div>
    </div>
</div>

@yield('scripts')
</body>
</html>