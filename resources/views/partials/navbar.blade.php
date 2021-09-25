<nav class="navbar navbar-expand-lg fixed-top active">
    <!-- Brand -->
<div class="container">
    <a class="navbar-brand" href="{{ '/' }}">PasarJasa.id</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="#about">Profil</a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="#feature">Layanan</a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="#about">About</a>
            </li>
        
            <li class="nav-item dropdown">
        
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Penyedia Jasa
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($category as $all)
                <a class="dropdown-item" style="color:red;" href="/technician/{{ $all->slug }}">{{ $all->name }}<br></a>
                @endforeach
                </div> 
            </li> 
        </ul>
            
    </div>
</div>
</nav>