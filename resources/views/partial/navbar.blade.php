<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>


            <ul class="navbar-nav me-4 mt-2 justify-content-end">

                <li class="nav-item dropdown noty mx-2 pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body fs-5 p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                    </a>
                    <span class="notify-num">{{ auth()->user()->unreadNotifications->count() }}</span>

                    <ul id="noty" class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                        @foreach (auth()->user()->notifications()->paginate(8) as $notification)
                            <li class="mb-2" id="add-notify">
                                <a class="dropdown-item border-radius-md"
                                    href="
                                    @if ($notification->data['message'] == 'New Healer') {{ route('healer.show', $notification->data['id']) }}
                                    @else
                                        {{ route('communtiy') }} @endif
                                    ">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold"></span>
                                                {{ $notification->data['name'] }}
                                            </h6>
                                            @if (isset($notification->data['message']))
                                                {{ $notification->data['message'] }}
                                            @endif
                                            <p class="text-xs text-secondary mt-1 mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                {{ $notification->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                        <li class="mt-2 notifictation-paginate float-end">
                            {{ auth()->user()->notifications()->paginate(8)->links() }}
                        </li>
                    </ul>
                </li>

                <li id="setting" class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body fs-5 p-0" id="dropdownMenuButton2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                    <ul id="setting_ch" class="dropdown-menu dropdown-menu-end px-2 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                        <li>
                            <a class="btn-sm w-100" href="{{ route('healer.edit', auth()->user()->id) }}">Edit
                                Profile</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post" id="logout-form">
                                @csrf
                                <button class="btn btn-primary btn-sm w-100 mt-2" type="submit">logout</button>
                            </form>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

@push('js')
    <script>
        $("#setting").click(function() {
            $("#dropdownMenuButton2").toggleClass('show');
            $("#setting_ch").toggleClass('show');
        });

        $(".noty").click(function() {
            {{ auth()->user()->unreadNotifications()->update(['read_at' => now()]) }}
            $(".notify-num").text('0')
            $("#dropdownMenuButton").toggleClass('show');
            $("#noty").toggleClass('show');
        });

        Echo.private('App.Models.User.' + {{ auth()->user()->id }})
            .notification((notification) => {
                var notify_num = $(".notify-num").text();
                $(".notify-num").text(parseInt(notify_num) + 1)
                $("#noty").prepend(
                    `<li class="mb-2" id="add-notify">
                        <a class="dropdown-item border-radius-md" href="#d">
                            <div class="d-flex py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold"></span>
                                        ` + notification.name + ` 
                                    </h6>
                                    ` + notification.message + ` 
                                    <p class="text-xs text-secondary mt-1 mb-0">
                                        <i class="fa fa-clock me-1"></i>
                                        Now
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>`
                );
            });
    </script>
@endpush
