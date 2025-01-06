<!DOCTYPE html>
<html lang="en">

@include('layouts.user-partials.head')

<body>
    @include('layouts.user-partials.spinner')

    <div class="newYear">
        <div class="feliz">Happy new year</div>
        <div class="ano_novo">
            <span>202</span>
            <span class="seis">4</span>
            <span class="sete">5</span>
            <div class="balao"></div>
        </div>
        <div class="fogos">
            <div class="f1">
                <span><i></i></span>
                <span><i></i></span>
                <span><i></i></span>
            </div>
            <div class="f2">
                <span><i></i></span>
                <span><i></i></span>
                <span><i></i></span>
            </div>
            <div class="f3">
                <span><i></i></span>
                <span><i></i></span>
                <span><i></i></span>
            </div>
            <div class="f4">
                <span><i></i></span>
                <span><i></i></span>
                <span><i></i></span>
            </div>
        </div>
    </div>
    <!-- JavaScript to show the animation only once -->
    <script>
        window.onload = function() {
            // Check if the user has seen the animation before
            if (!localStorage.getItem("seenAnimation")) {
                // Show animation for the first time
                setTimeout(function() {
                    document.querySelector(".newYear").style.display = "none";
                }, 10000); // Wait 7 seconds before hiding the animation

                // Store that the user has seen the animation
                localStorage.setItem("seenAnimation", "true");
            } else {
                // If the user has already seen the animation, hide it immediately
                document.querySelector(".newYear").style.display = "none";
            }
        };
    </script>


    @include('layouts.user-partials.nav')

    @yield('content')

    @include('layouts.user-partials.footer')



    @include('layouts.user-partials.scripts')
</body>

</html>
