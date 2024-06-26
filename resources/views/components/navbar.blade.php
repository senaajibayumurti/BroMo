<nav class="navbar d-flex justify-content-end p-0">
    <div class="navbar-collapse d-flex flex-row justify-content-between px-5 pt-3">
            <!-- TEXT -->
        <div class="d-flex flex-column justify-content-between">
            <div class="bm-font-clr1 bm-font-bold3 bm-font-36">
                @stack('navbar-title')
            </div>
        </div>
        <ul id="profile-container" class="navbar-nav d-flex flex-row justify-content-between align-items-center">
            <li class="nav-item"><a href="{{url('/notifikasi')}}"><i class="bm-font-24 bi bi-bell-fill me-3"></i></a></li>
            <li class="nav-item"><a href="{{url('/profile')}}"><i class="bm-font-36 bi bi-circle-fill"></i></a></li>
            <!-- Profile Picture -->
        </ul>
    </div>
</nav>