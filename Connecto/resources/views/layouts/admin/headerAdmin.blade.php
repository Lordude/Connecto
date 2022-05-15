  <header>
    <div class="container-fluid"> <!--CONTAINER IN -->
        <div class="row bg-dark text-white text-end fill"> <!--ROW-1 IN -->
            <div class="col-md-4 offset-md-8">
                <a class="textDeconexion" href="{{ route('login.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-person-circle" onclick="" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                    <span class="TextCompte">Déconnexion</span>
                </a>
            </div>
        </div> <!--ROW-1 OUT -->
        
        <div class="row filll"></div> <!--ROW-2 IN OUT -->

        <div class="row"> <!--ROW-3 IN -->
            <div class="col-md-4">
                <div style="width: 50%;">
                    <a href="https://status.nest.com/"><img class="img-fluid" src="{{ asset('image/RectangleText.png') }}"></a>
                </div>
            </div>
            <div class="col-md-4 offset-md-4">
                <p id="NbSignalement"><?php echo App\Models\Report::reportOpenSince24Hour() ?> signalements depuis les dernière 24 heures</p>
            </div>
        </div><!--ROW-3 OUT -->
    </div> <!--CONTAINER OUT -->    
</header>

<!-- message à l'utilisateur -->
    @if (session('logsuccess'))
    <div class="alert alert-success alert-dismissible fade show MessageSession ">
        {{ session('logsuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if (session('NotSuper'))
    <div class="alert alert-danger alert-dismissible fade show MessageSession ">
        {{ session('NotSuper') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show MessageSession ">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if (session('MessageChange'))
    <div class="alert alert-success alert-dismissible fade show MessageSession ">
        {{session('MessageChange')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

<div class="container-fluid">
    <div class="row">    
        <div class="sidenavDiv col-md-3">
            <nav>
                <a class="sidenav" href="{{route('home')}}">Accueil publique</a>
                <a class="sidenav" href="{{route('admin.services.index') }}">État des services</a>
                <a class="sidenav" href="{{route('admin.reports_services.index') }}">Signalement des clients</a>
                <a class="sidenav" href="{{route('home.historic.index')}}">Historique des incidents</a>
                <a class="sidenav" href="{{route('admin.incidents.index') }} ">Gestion des incidents</a>
                <a class="sidenav" href="{{route('MyAccount') }}">Mon compte</a>
                @if(session('TypeRole') == '2')
                <a class="sidenav" href="{{ route('superadmin.users.index') }}">Gestion des comptes</a>
                @endif
            </nav>
        </div>
        


