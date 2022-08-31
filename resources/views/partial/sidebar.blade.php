<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white"> Task - App </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->path() == 'home' ? 'active':'' }}" href="{{ route('home') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->is_admin)
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->path() == 'healer' ? 'active':'' }}" href="{{ route('healer.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-file-medical"></i>
                    </div>
                    <span class="nav-link-text ms-1">Healer's</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->path() == 'patient' ? 'active':'' }}" href="{{ route('patient.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-temperature-arrow-up"></i>
                    </div>
                    <span class="nav-link-text ms-1">The Patient's</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->path() == 'session' ? 'active':'' }}" href="{{ route('session.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">The Session's</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->path() == 'session_details' ? 'active':'' }}" href="{{ route('session_details.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-circle-info"></i>
                    </div>
                    <span class="nav-link-text ms-1">The Session's Details</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary mt-4 w-100"
                href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree"
                type="button">Upgrade to pro</a>
        </div>
    </div>
</aside>
