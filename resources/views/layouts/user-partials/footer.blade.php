<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <figure class="footer-logo">
                    <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/logo.png" alt="logo" /></a>
                </figure>

                <nav class="footer-navigation">
                    <ul>
                        <li>
                            <p>Do you have a venue? Register with us now and reach more customers!<a
                                    href="{{ route('register.venue') }}">Register</a></p>
                        </li>
                    </ul>
                    <ul class="flex flex-wrap justify-content-center align-items-center">
                        <li><a href="{{ route('show.category') }}">Home</a></li>
                        <li><a href="{{ route('user.about') }}">About us</a></li>
                        <li><a href="{{ route('venues.page') }}">Venues</a></li>
                        <li><a href="{{ route('user.contact') }}">Contact</a></li>
                    </ul>
                </nav>
                <br>

                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                Happy with our site? Let us know!</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                <div class="footer-social">
                    <ul class="flex flex-wrap justify-content-center align-items-center">
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="back-to-top flex justify-content-center align-items-center">
    <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1395 1184q0 13-10 23l-50 50q-10 10-23 10t-23-10l-393-393-393 393q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l466 466q10 10 10 23z" />
        </svg></span>
</div>
