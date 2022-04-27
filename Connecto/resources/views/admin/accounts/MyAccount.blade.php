@include('layouts.includes.head')

<p class="MessageSession">text</p>

<h1>Mon compte</h1>

<p>Vous êtes {{ $resultUser->first_name}} {{ $resultUser->last_name}} </p>
<p>Votre courriel est {{ $resultUser->email }} </p>
<p>Vous avez été embauché le {{ $resultUser->date_hired }}</p>
<p>Votre mot de passe est : {{ $resultUser->password }}</p>
<p>Vous avez mangé des pâtes aux fruits de mer avec du parmesan</p>
<p>Vous devriez faire attention à votre cardio</p>

<form action="">

<label for="">Mot de passe:</label>
<input type="text">
<label for="">Confirmer son mot de passe:</label>
<input type="text">
<label for="">Nouveau mot de passe</label>
<input type="text">

<button type="submit">Modifier le mot de passe</button>
</form>
