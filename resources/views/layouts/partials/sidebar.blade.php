<!-- Sidebar Start -->

<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="/admin/dashboard" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><img class="pb-1" width="22px" height="32px"
                    src="{{ asset('assets/admin_assets/img/Tarfeh.png') }}" alt="">arfeeh</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('storage/' . auth()->user()->image) }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ auth()->user()->user_name }}</h6>
                <span>{{ auth()->user()->user_type }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="/admin/dashboard" class="nav-item nav-link @yield ('dashboard-active')"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ route('users.index') }}" class="nav-item nav-link  @yield ('user-active')"><i
                    class="bi bi-people-fill"></i>Users</a>
            <a href="{{ route('venues.index') }}"" class="nav-item nav-link  @yield ('venue-active')"><i
                    class="fa-solid fa-gamepad"></i>Venues</a>
            <a href="{{ route('activities.index') }}"" class="nav-item nav-link  @yield ('activity-active')"><i
                    class="bi bi-grid-1x2-fill"></i>Activities</a>
            <a href="{{ route('bookings.index') }}"" class="nav-item nav-link  @yield ('booking-active')"><i
                    class="bi bi-calendar-event-fill"></i>Bookings</a>
            <a href="{{ route('categories.index') }}"" class="nav-item nav-link  @yield ('category-active')"><i
                    class="bi bi-grid-fill"></i>Categories</a>
            <a href="{{ route('tags.index') }}"" class="nav-item nav-link  @yield ('tag-active')"><i
                    class="bi bi-tags-fill"></i>Tags</a>
            <a href="{{ route('contacts.index') }}"" class="nav-item nav-link  @yield ('contact-active')"><i
                    class="bi bi-chat-dots-fill"></i>Contacts</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
