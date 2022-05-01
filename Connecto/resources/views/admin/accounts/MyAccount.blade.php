@include('layouts.admin.headerAdmin')

@if(session()->has('emailUser'))

<div class="row">

<div class="sidenavDiv col-3">
  <a class="sidenav" href="">État des services</a>
  <a class="sidenav" href="">Signalement des clients</a>
  <a class="sidenav" href="">Historique des incidents</a>
  <a class="sidenav" href="">Gestion des incident</a>
  <a class="sidenav" href="">Mon compte</a>

  <footer>@2022 Algorithmus</footer>
</div>

<div class="col-9" style="background-color: #E3E9F1; min-height:600px; border-radius: 30px 0px 0px 0px;">

<h2>Mon compte</h2>


<div class="main" style="background-color: white; min-height:300px; width:60%; border-radius: 15px;">

    <p class="MessageSession">{{ session('MessageChange') }} </p>

    <p>{{ $resultUser->first_name}} {{ $resultUser->last_name}}</p>
    <p>Votre courriel est {{ $resultUser->email }} </p>
    <p>Vous avez été embauché le {{ $resultUser->date_hired }}</p>
    <!-- <p>Votre mot de passe est : {{ $resultUser->password }}</p> -->
    <!-- <p>Votre rôle est : {{ $resultUser->role_id }} </p> -->


    <form action="{{ route('UpdatePassWord') }}" method="post">
    @csrf
        <label for="newPassword">Nouveau mot de passe</label>
        <input name="newPassword" type="password" id="newPassword">

        <br>
        <button id="btnModPSW" type="submit">Modifier le mot de passe</button>
    </form>

@else
<p class="MessageSession">Vous n'avez pas l'autorisation pour accéder à cette page</p>
@endif

        </div>
    </div>
</div>