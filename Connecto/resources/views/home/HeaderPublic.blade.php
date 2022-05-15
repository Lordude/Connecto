<header>
    <div class="container-fluid"> <!--CONTAINER IN -->
        <div class="row bg-dark text-white text-end fill"> <!--ROW-1 IN -->
            @if(session()->has('emailUser'))
            <div class="col-md-4 offset-md-8">
                <a href="{{ route('login.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                    <span>Déconnexion</span>
                </a>
            </div>
            @else
            <div class="col-md-4 offset-md-8">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-person-circle" onclick="openForm()" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
               <span class="TextCompte">Compte administrateur</span>
            </div>
            @endif
        </div> <!--ROW-1 OUT -->

        <div class="row filll"></div> <!--ROW-2 IN OUT -->

        <div class="row"> <!--ROW-3 IN -->
            <div class="col-md-4">
                <div style="width: 50%;">
                <a href="https://status.nest.com/"><img class="img-fluid" src="{{ asset('image/RectangleText.png') }}"></a>
                </div>
            </div>
            <div class="col-md-4 offset-md-4">
                <p class="tauxDisponibilite"> Les services sont opérationnels
                    <?php echo App\Models\Incident::get_Uptime() . '% du temps';?>
                </p>
            </div>

        </div><!--ROW-3 OUT -->

    </div> <!--CONTAINER OUT -->
</header>

    @if (session ('AccessDenided'))
    <div class="alert alert-danger alert-dismissible fade show MessageSession ">
        {{ session('AccessDenided') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    
    @if (session('messagelogout'))
    <div class="alert alert-success alert-dismissible fade show MessageSession ">
        {{session('messagelogout')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if (session('logfail'))
    <div class="alert alert-danger alert-dismissible fade show MessageSession ">
        {{session('logfail')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show MessageSession ">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="form-popup" id="myForm">
    <form action="{{ route('login.store') }}" method="POST" class="form-container">
        @csrf
        <h2>Connection</h2>

        <label for="email"><b>Courriel</b></label>
        <input type="text" name="email" required>

        <label for="psw"><b>Mot de passe</b></label>
        <input type="password" name="psw" required>

        <button type="submit" class="btn">Connection</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
    </div>

<div class="container-fluid">
    <div class="row">
        <div class="sidenavDiv col-md-3">
        <nav>
            <a class="sidenav" href="{{ route('home') }}">Accueil</a>
            <a class="sidenav" href="{{ route('home.historic.index') }}">Historique</a>
            <a class="sidenav" href="">Connecto.com</a>
            <a class="sidenav" href="">Nous joindre</a>
            @if(session()->has('emailUser'))
            <a class="sidenav" href="{{ route('admin.services.index') }}">Page Administrateur</a>
            @endif
        </nav>
        <footer>@2022 Algorithmus</footer>
        </div>
