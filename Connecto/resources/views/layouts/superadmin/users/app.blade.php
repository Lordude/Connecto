<!DOCTYPE html>
<html lang="fr-ca">
@include('layouts.admin.incidents.includes.head')

<body>

    

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @yield('content')


</body>

</html>
