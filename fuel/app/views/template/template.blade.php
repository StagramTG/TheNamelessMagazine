<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Nameless Magazine</title>

    {!! Asset::css('bulma.css') !!}
    @yield('stylesheets')
</head>
<body>
<section class="hero is-dark">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                        <span class="navbar-burger burger" data-target="navbarMenuHeroA" onclick="toggleMenu(this)">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                </div>
                <div id="navbarMenuHeroA" class="navbar-menu">
                    <div class="navbar-end">
                        <a class="navbar-item is-active">
                            Accueil
                        </a>
                        <a class="navbar-item">
                            Articles
                        </a>
                        <a class="navbar-item">
                            Blog
                        </a>
                        <a class="navbar-item">
                            Contacts
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">
                The Nameless Magazine
            </h1>
            <h2 class="subtitle">
                Philosophie ~ cinéma ~ Littérature
            </h2>
        </div>
    </div>
</section>

<div class="section container">
    @yield('content')
</div>
<br>

<footer class="footer is-dark">
    <div class="container">
        <div class="columns">
            <div class="column">
                <p>
                    Site développé avec <a href="https://fuelphp.com">Fuelphp</a> et
                    <a href="bulma.io">Bulma</a>
                </p>
            </div>
            <div class="column">

            </div>
            <div class="column">
                <a href="/admin">Administration</a>
            </div>
        </div>
    </div>
</footer>

<script>
    function toggleMenu(elem)
    {
        var menu = document.getElementById('navbarMenuHeroA');
        menu.classList.toggle('is-active');
        elem.classList.toggle('is-active');
    }
</script>

@yield('scripts')
</body>
</html>