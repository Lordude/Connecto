<html>
    @include('layouts.includes.head')

    <body>
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
    </body>

</html>