@include('layouts.admin.headerAdmin')

@if(session()->has('emailUser'))

<div style="background-color: #E3E9F1; min-height:600px; border-radius: 10px 0px 0px 0px;">

<h2>Mon compte</h2>

<div style="background-color: white; width:60%; border-radius: 15px;">

<p class="MessageSession">{{ session('MessageChange') }} </p>

<p> <strong>{{ $resultUser->first_name}} {{ $resultUser->last_name}}</strong> </p>
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

    </div>
</div>

