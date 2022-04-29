@include('layouts.admin.headerAdmin')

@if(session()->has('emailUser'))

<h1>Mon compte</h1>

<p class="MessageSession">{{ session('MessageChange') }} </p>

<p>Vous êtes {{ $resultUser->first_name}} {{ $resultUser->last_name}} </p>
<p>Votre courriel est {{ $resultUser->email }} </p>
<p>Vous avez été embauché le {{ $resultUser->date_hired }}</p>
<p>Votre mot de passe est : {{ $resultUser->password }}</p>
<p>Votre rôle est : {{ $resultUser->role_id }} </p>


<form action="{{ route('UpdatePassWord') }}" method="post">
@csrf
<label for="newPassword">Nouveau mot de passe</label>
<input name="newPassword" type="password" id="newPassword">

<button type="submit">Modifier le mot de passe</button>
</form>

@else
<p class="MessageSession">Vous n'avez pas l'autorisation pour accéder à cette page</p>
@endif
