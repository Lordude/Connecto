<html>
    @include('layouts.admin.includes.head')

    <body>
        <div>
            @if (session('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
            
            @yield('content')
        </div>
    </body>

</html>