@include('layouts.includes.head')

    <div class="p-2 mb-2 bg-dark text-white text-end fill">
        <a href="{{ route('login.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-person-circle" onclick="" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
        </a>
        Déconnexion
    </div>
    <div class=" p-4 mb-2 filll"></div>

    <div class="d-flex justify-content-between">
        <img class="LogoHeader" src="{{ asset('image/RectangleText.png') }}">
            
        <div class="d-flex justify-content-between">  
            <p style="background-color: #DDFDFC;">
                <?php echo App\Models\Report::reportOpenSinceOneHour() ?>
            
                signalements en 24 heures</p>
                </div>
    
      
    </div>
    <div class="row">    
        <div class="sidenavDiv col-3">
        <nav>
            <a class="sidenav" href="{{ route('admin.services.index') }}">État des services</a>
            <a class="sidenav" href="{{ route('admin.reports_services.index') }}">Signalement des clients</a>
            <a class="sidenav" href="">Historique des incidents</a>
            <a class="sidenav" href="{{ route('admin.incidents.index') }} ">Gestion des incidents</a>
            <a class="sidenav" href="{{ route('MyAccount') }}">Mon compte</a>
            @if(session('TypeRole') == '2')
            <a class="sidenav" href="{{ route('superadmin.users.index') }}">Gestion des comptes</a>
            @endif
        </nav>
        <footer>@2022 Algorithmus</footer>
        </div>
        


