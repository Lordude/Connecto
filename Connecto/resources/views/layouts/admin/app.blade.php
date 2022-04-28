<html>
    @include('layouts.admin.includes.head')

    <body>
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