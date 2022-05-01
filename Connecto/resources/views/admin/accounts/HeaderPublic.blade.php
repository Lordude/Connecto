    @include('layouts.includes.head')

    <div class="p-2 mb-2 bg-dark text-white text-end fill">
    @if(session()->has('emailUser'))
    <a href="{{ route('admin.accounts.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg>
        </a>
        Déconnexion
    @else
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-person-circle" onclick="openForm()" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg>
        Compte administrateur
    @endif
    </div>
    <div class=" p-4 mb-2 filll"></div>

    <img class="LogoHeader" src="{{ asset('image/RectangleText.png') }}">

    @if (session('messagelogout'))
               <p class="MessageSession">{{session('messagelogout')}}</p>
    @endif

    @if (session('logfail'))
               <p class="MessageSession">{{session('logfail')}}</p>
    @endif

    <!-- @if(session('TypeRole') == '2')
    <a href="" class="btn btn-warning">Bouton pour le superadmin</a>
   @endif -->

    <div class="form-popup" id="myForm">
    <form action="{{ route('admin.accounts.store') }}" method="POST" class="form-container">
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
    