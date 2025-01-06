<!DOCTYPE html>
<html lang="en">

@include('layouts.user-partials.head')

<body>
    @include('layouts.user-partials.spinner')

    @include('layouts.user-partials.nav')

    @yield('content')

    @include('layouts.user-partials.footer')



    @include('layouts.user-partials.scripts')
</body>

</html>
