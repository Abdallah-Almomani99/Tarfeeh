<!DOCTYPE html>
<html lang="en">

@include('layouts.user-partials.head')

<body>

    @include('layouts.user-partials.spinner')


    @include('layouts.venue-partials.nav')

    @yield('content')


    @include('layouts.user-partials.scripts')
</body>

</html>
