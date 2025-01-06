<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="{{ route('dashboard.index') }}" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><img style="width: 30px; height: 40px;"
                src="{{ asset('assets/admin_assets/img/Tarfeh.png') }}" alt=""></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="{{ asset('storage/' . auth()->user()->image) }}" alt=""
                    style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">{{ auth()->user()->first_name }}
                    {{ auth()->user()->last_name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

                <a href="{{ route('profile.edit') }}" class="dropdown-item">Profile Settings</a>


                <!-- Log Out -->
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="dropdown-item">Log Out</button>
                </form>
            </div>

        </div>
    </div>
</nav>
<!-- Navbar End -->
