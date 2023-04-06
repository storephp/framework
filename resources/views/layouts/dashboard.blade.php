<!doctype html>
<html dir="{{ $langDirection }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard - Basketin</title>
    <!-- CSS files -->
    @if ($langDirection != 'rtl')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
    @endif
    @if ($langDirection == 'rtl')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.rtl.min.css">
    @endif
    @livewireStyles
</head>

<body>
    <div class="page">
        <!-- Sidebar -->
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                    aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href="{{ route('basketin.dashboard.home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 109 32" height="36">
                            <defs>
                                <clipPath id="clip-path">
                                    <path id="path16" d="M0-25.333H32v32H0Z" transform="translate(0 25.333)"
                                        fill="#fff"></path>
                                </clipPath>
                                <clipPath id="clip-tabler_white">
                                    <rect width="109" height="32"></rect>
                                </clipPath>
                            </defs>
                            <g id="tabler_white" data-name="tabler white" clip-path="url(#clip-tabler_white)">
                                <path id="Path_1" data-name="Path 1"
                                    d="M1.52-13.3H8.987l1.748,1.748v3.686l-.912.912,1.5,1.5v3.591L9.462,0H1.52Zm6.859,6,.95-.95v-2.869l-.95-.931H2.926V-7.3Zm.437,6.042,1.1-1.083V-5L8.816-6.08H2.926v4.826Zm4.6-.3V-3.971L14.972-5.51h5.054V-7.315l-.95-.931h-3.23l-.95.931v.779H13.49V-7.714l1.748-1.748h4.427l1.748,1.748V0H20.064V-1.672L18.316,0H14.972Zm4.617.342,2-1.919V-4.294H15.58l-.76.741v1.6l.76.741Zm5.662-.342V-2.736H25.1v.779l.76.741h3.5l.76-.741V-3.42l-.76-.76H25.27l-1.5-1.5V-7.9l1.558-1.558h4.446L31.331-7.9v1.178H29.925v-.779l-.76-.741h-3.23l-.76.741v1.387l.76.76h4.028L31.521-3.8v2.242L29.963,0H25.251ZM33.9-13.566H35.3v8.018h2.223L40.3-9.462h1.558L38.665-4.9,42.047,0H40.489L37.525-4.294H35.3V0H33.9ZM43.187-1.748V-7.714l1.748-1.748H49.7l1.767,1.748v3.4H44.593v2.128l.95.931H49.1l.95-.931v-.722h1.406v1.159L49.7,0H44.935Zm6.878-3.781V-7.277l-.95-.931H45.543l-.95.931v1.748Zm4.826,3.781V-8.227h-1.71V-9.462h1.748V-12.54H56.3v3.078h2.964v1.235H56.3v6.042l.95.95h2.014V0H56.639ZM61.636-13.3H63.08V0H61.636ZM66.12-9.462h1.368v2.014L69.5-9.462h2.907l1.748,1.748V0H72.751V-7.277l-.95-.931H69.882L67.526-5.852V0H66.12Z"
                                    transform="translate(32.5 22.5)" fill="#fff" stroke="#fff" stroke-width="1">
                                </path>
                                <g id="icon">
                                    <path id="_211876_play_icon" data-name="211876_play_icon"
                                        d="M7.764,4.347.773.082A.518.518,0,0,0,.5,0,.508.508,0,0,0,0,.515H0A15.3,15.3,0,0,1,.781,4.942,15.3,15.3,0,0,1,0,9.369H0a.508.508,0,0,0,.5.515A.564.564,0,0,0,.781,9.8l6.983-4.26a.787.787,0,0,0,0-1.189Z"
                                        transform="translate(23.815 6.847) rotate(90)" fill="#fff"></path>
                                    <g id="g10" transform="translate(0 0)">
                                        <g id="g12">
                                            <g id="g14" clip-path="url(#clip-path)">
                                                <g id="g20" transform="translate(2.526 3.716)">
                                                    <path id="path22"
                                                        d="M5.614,1.468A1.684,1.684,0,0,0,3.965-.252,1.666,1.666,0,0,0,2.347,1.165S1.88,4.321,1.033,7.637a2.966,2.966,0,0,1-2.27,2.144H-8.143a3.072,3.072,0,0,1-2.68-2.125c-.02-.056-2.085-5.933-2.949-9.228-1.256-4.8-6.255-3.948-6.255-3.948a1.649,1.649,0,0,0-1.307,1.632A1.662,1.662,0,0,0-19.684-2.2a1.635,1.635,0,0,0,.377-.061A1.9,1.9,0,0,1-16.941-.838C-16.008,2.576-14,8.587-13.9,8.846c.542,1.465,2.368,4.3,5.762,4.3h6.905A6.133,6.133,0,0,0,4.218,8.486c.827-3.229,1.4-6.919,1.4-7.018"
                                                        transform="translate(21.333 5.578)" fill="#fff"></path>
                                                </g>
                                                <g id="g24" transform="translate(12.387 24.264)">
                                                    <path id="path26"
                                                        d="M1.075.537A2.579,2.579,0,0,1-1.5,3.116,2.579,2.579,0,0,1-4.084.537,2.579,2.579,0,0,1-1.5-2.041,2.579,2.579,0,0,1,1.075.537"
                                                        transform="translate(4.084 2.041)" fill="#fff"></path>
                                                </g>
                                                <g id="g28" transform="translate(20.703 24.481)">
                                                    <path id="path30"
                                                        d="M1.075.537A2.579,2.579,0,0,1-1.5,3.116,2.579,2.579,0,0,1-4.084.537,2.579,2.579,0,0,1-1.5-2.041,2.579,2.579,0,0,1,1.075.537"
                                                        transform="translate(4.084 2.041)" fill="#fff"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                </h1>
                <div class="navbar-nav flex-row d-lg-none">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                style="background-image: url(./static/avatars/000m.jpg)"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item">Status</a>
                            <a href="#" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Feedback</a>
                            <div class="dropdown-divider"></div>
                            <a href="./settings.html" class="dropdown-item">Settings</a>
                            <a href="./sign-in.html" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        @foreach ($modules as $module)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                    data-bs-auto-close="false" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        @svg('tabler-' . $module['icon'])
                                    </span>
                                    <span class="nav-link-title">
                                        {{ str_contains($module['name'], '::') ? __($module['name']) : $module['name'] }}
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            @foreach ($module['menu'] as $link)
                                                @if (isset($link['route']))
                                                    <a class="dropdown-item" href="{{ route($link['route']) }}">
                                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                            @svg('tabler-' . $link['icon'])
                                                        </span>
                                                        {{ str_contains($link['name'], '::') ? __($link['name']) : $link['name'] }}
                                                    </a>
                                                @endif

                                                @if (isset($link['submenu']))
                                                    <a class="dropdown-item dropdown-toggle" href="#"
                                                        data-bs-toggle="dropdown" data-bs-auto-close="false"
                                                        role="button" aria-expanded="false">
                                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                            @svg('tabler-' . $link['icon'])
                                                        </span>
                                                        {{ str_contains($link['name'], '::') ? __($link['name']) : $link['name'] }}
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        @foreach ($link['submenu'] as $_link)
                                                            <a href="{{ route($_link['route']) }}"
                                                                class="dropdown-item">
                                                                <span
                                                                    class="nav-link-icon d-md-none d-lg-inline-block">
                                                                    @svg('tabler-' . $link['icon'])
                                                                </span>
                                                                {{ str_contains($_link['name'], '::') ? __($_link['name']) : $_link['name'] }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </aside>
        <!-- Navbar -->
        <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="d-none d-md-flex">
                        <a class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            aria-label="Enable dark mode" data-bs-original-title="Enable dark mode">
                            <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                style="background-image: url(./static/avatars/000m.jpg)"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ $member->name }}</div>
                                <div class="mt-1 small text-muted">{{ $member->membership->rule->rule_code }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item">Status</a>
                            <a href="#" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Feedback</a>
                            <div class="dropdown-divider"></div>
                            <a href="./settings.html" class="dropdown-item">Settings</a>
                            <a href="./sign-in.html" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div>
                        <form action="./" method="get" autocomplete="off" novalidate>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="10" cy="10" r="7" />
                                        <line x1="21" y1="21" x2="15" y2="15" />
                                    </svg>
                                </span>
                                <input type="text" value="" class="form-control" placeholder="Search…"
                                    aria-label="Search in website">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            {{ $slot }}
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    <a href="https://basketin.net/" target="_blank" class="link-secondary"
                                        rel="noopener">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon text-pink icon-filled icon-inline" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        </svg>
                                        Basketin
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2022
                                    <a href="." class="link-secondary">Tabler</a>.
                                    All rights reserved.
                                </li>
                                <li class="list-inline-item">
                                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                                        V{{ config('basketin.dashboard.version') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

<script src="//cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@livewireScripts
<x-livewire-alert::scripts />

@stack('scripts')

</html>
