<html>
    @include('layouts.admin.includes.head')
    

    <body>
    @include('layouts.admin.headerAdmin')
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