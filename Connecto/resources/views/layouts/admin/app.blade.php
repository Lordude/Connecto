<html>
    @include('layouts.admin.includes.head')
    

    <body>
    @include('layouts.admin.headerAdmin')
            @if (session('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
            
            @yield('content')
    </body>

</html>