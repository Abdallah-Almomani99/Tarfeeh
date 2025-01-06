<!DOCTYPE html>
<html lang="en">

@include('layouts.partials.head')

<body>

    <div class="container-xxl position-relative bg-white d-flex p-0">

        @include('layouts.partials.spinner')
        @include('layouts.partials.sidebar')

        <div class="content">

            @include('layouts.partials.nav')

            @include('layouts.content')

        </div>
        @include('layouts.partials.scripts')
</body>

</html>
