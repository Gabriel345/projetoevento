<!DOCTYPE html> <html lang="pt-br"> <head> <meta charset="UTF-8"> <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com"> <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script> <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> <script
nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"> </script>
<link rel="stylesheet" href="{{ asset('css/main.css') }}"> <title>@yield('title') </title> </head> <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top"> 
            <div class="collapse navbar-collapse" id="navbar"> 
                <a href="../welcome.blade.php" class="navbar-brand">
                    <img src="img/events/MicrosoftTeams-image.png" alt="LOGO" srcset="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
            </div>
            
            
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/events/create">Criar Eventos</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Meus Eventos</a>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="/login">Entrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Cadastrar</a>
                </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
</header>
<main>
    
            @if (session('msg'))
            <p class="msg">{{ session('msg') }}</p>
            @endif
            @yield('content')
</main>
<footer>
    <p>HDC Events &copy;2023</p>
</footer>
</body>

</html>