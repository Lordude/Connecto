<html>
    @include('layouts.includes.head')

<body>
    <div class="p-2 mb-2 bg-dark text-white text-end">Compte administrateur
        <svg xmlns="http://www.w3.org/2000/svg" id="moe" width="16" height="16" fill="red" class="bi bi-person-circle" onclick="openForm()" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg>
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Connecto</a>
        </div>
    </nav>

    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-sucess">
                {{session('success')}}
            </div>
        @endif
            
        @yield('content')
    </div>

        
    <div class="form-popup" id="myForm">
    <form action="/action_page.php" class="form-container">
        <h2>Connection</h2>

        <label for="email"><b>Courriel</b></label>
        <input type="text" name="email" required>

        <label for="psw"><b>Mot de passe</b></label>
        <input type="password" name="psw" required>

        <button type="submit" class="btn">Connection</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
    </div>
    </body>

</html>