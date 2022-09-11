<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">

            <span class="ms-1 font-weight-bold text-white fs-5"> {{ env('APP_NAME') }} </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->path() == '/' ? 'active' : '' }}"
                    href="{{ route('home') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->path() == 'communtiy' ? 'active' : '' }}"
                    href="{{ route('communtiy') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <span class="nav-link-text ms-1">Communtiy</span>
                </a>
            </li>
            @if (auth()->user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->path() == 'communtiy/inActive' ? 'active' : '' }}"
                        href="{{ route('inActive') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-comments"></i>
                        </div>
                        <span class="nav-link-text ms-1">In Active Post</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->path() == 'category' ? 'active' : '' }}"
                        href="{{ route('category.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                        <span class="nav-link-text ms-1">Categories</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->path() == 'pathological_case' ? 'active' : '' }}"
                    href="{{ route('pathological_case.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-circle-info"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pathological Case</span>
                </a>
            </li>
            @if (auth()->user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->path() == 'healer' ? 'active' : '' }}"
                        href="{{ route('healer.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-file-medical"></i>
                        </div>
                        <span class="nav-link-text ms-1">Healer's</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->path() == 'patient' ? 'active' : '' }}"
                    href="{{ route('patient.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-temperature-arrow-up"></i>
                    </div>
                    <span class="nav-link-text ms-1">The Patient's</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->path() == 'session' ? 'active' : '' }}"
                    href="{{ route('session.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">The Session's</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->path() == 'session_details' ? 'active' : '' }}"
                    href="{{ route('session_details.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-circle-info"></i>
                    </div>
                    <span class="nav-link-text ms-1">The Session's Details</span>
                </a>
            </li>
        </ul>
    </div>

</aside>
