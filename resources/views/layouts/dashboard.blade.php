<!doctype html>
<html dir="{{ $langDirection }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard - Store</title>
    <!-- CSS files -->
    @if ($langDirection != 'rtl')
        <link rel="stylesheet" href="{{ asset('/vendor/storephp/tabler.min.css') }}">
    @endif

    @if ($langDirection == 'rtl')
        <link rel="stylesheet" href="{{ asset('/vendor/storephp/tabler.rtl.min.css') }}">
    @endif

    @livewireStyles

    <link rel="stylesheet" href="{{ asset('/vendor/storephp/sweetalert2.min.css') }}">

    <script src="{{ asset('/vendor/storephp/alpinejs.min.js') }}" defer></script>
</head>

<body>
    <div class="page">
        <!-- Sidebar -->
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                    aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href="{{ route('store.dashboard.home') }}">
                        <svg height="32" viewBox="0 0 3788 625" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 224.404C0 100.469 100.376 0 224.196 0H2388.7V624.25H0V224.404Z"
                                fill="white" />
                            <path
                                d="M632.509 205.962H437.891C420.848 206.31 406.411 209.966 394.584 216.93C383.105 223.545 377.366 236.427 377.366 255.576C377.366 270.199 382.236 280.644 391.975 286.911C402.063 293.178 413.714 296.311 426.934 296.311L531.287 295.789C535.114 296.137 539.113 296.311 543.287 296.311C547.461 296.311 551.635 296.486 555.81 296.834C567.985 297.53 579.986 299.619 591.811 303.101C603.637 306.234 614.072 312.153 623.117 320.857C631.465 328.516 637.727 337.743 641.901 348.536C646.075 359.329 648.684 370.471 649.727 381.96C650.074 385.441 650.249 388.923 650.249 392.405C650.595 395.538 650.771 398.846 650.771 402.328C650.074 445.85 638.073 475.442 614.769 491.11C591.465 506.43 559.808 514.089 519.808 514.089H310.058V447.241H507.285C524.679 447.588 539.635 444.805 552.157 438.885C565.026 432.965 570.244 419.562 567.81 398.672C566.07 382.308 559.984 372.212 549.548 368.382C539.113 364.552 526.766 362.463 512.503 362.115L419.629 361.592C381.018 361.94 350.408 354.281 327.798 338.613C305.537 322.598 294.58 293.874 294.927 252.442C295.623 208.922 307.624 179.328 330.929 163.66C354.582 147.645 386.41 139.637 426.412 139.637L632.509 139.115V205.962ZM791.586 204.918H671.058V139.637H994.552V204.918H872.981V514.089H791.586V204.918ZM1100.54 270.199C1098.11 279.599 1096.37 289.174 1095.33 298.923C1094.28 308.323 1093.76 317.723 1093.76 327.124C1093.76 336.872 1094.28 346.621 1095.33 356.37C1096.72 365.77 1098.46 374.997 1100.54 384.049C1104.37 400.064 1110.63 413.993 1119.33 425.829C1128.37 437.665 1140.9 446.372 1156.89 451.941C1162.81 454.03 1169.07 455.597 1175.68 456.641C1182.29 457.686 1188.9 458.208 1195.5 458.208C1202.11 458.208 1208.72 457.686 1215.33 456.641C1221.94 455.597 1228.2 454.03 1234.12 451.941C1250.12 446.372 1262.64 437.665 1271.68 425.829C1280.73 413.993 1286.99 400.064 1290.47 384.049C1292.55 374.997 1294.12 365.77 1295.16 356.37C1296.55 346.621 1297.25 336.872 1297.25 327.124C1297.25 317.723 1296.55 308.323 1295.16 298.923C1294.12 289.174 1292.55 279.774 1290.47 270.721C1286.99 254.706 1280.73 240.779 1271.68 228.941C1262.64 216.755 1250.12 208.051 1234.12 202.829C1228.2 200.74 1221.94 199.173 1215.33 198.129C1208.72 197.084 1202.11 196.562 1195.5 196.562C1188.9 196.562 1182.29 197.084 1175.68 198.129C1169.07 199.173 1162.81 200.74 1156.89 202.829C1140.9 208.399 1128.54 217.104 1119.85 228.941C1111.15 240.779 1104.72 254.706 1100.54 270.721V270.199ZM1019.15 243.564C1028.19 216.059 1041.41 193.776 1058.8 176.716C1076.54 159.308 1099.68 146.948 1128.2 139.637C1138.63 137.2 1149.41 135.285 1160.55 133.892C1171.68 132.5 1182.81 131.803 1193.94 131.803C1205.76 131.455 1217.77 131.977 1229.94 133.37C1242.12 134.762 1253.77 137.026 1264.9 140.159C1292.73 147.123 1315.51 159.308 1333.25 176.716C1350.99 194.125 1364.03 216.582 1372.38 244.086C1375.86 256.62 1378.47 269.851 1380.21 283.777C1382.3 297.704 1383.34 311.631 1383.34 325.557C1383.34 340.528 1382.47 355.151 1380.73 369.426C1378.99 383.701 1376.21 397.279 1372.38 410.161C1364.03 438.363 1350.82 461.166 1332.73 478.576C1314.64 495.635 1291.33 507.475 1262.81 514.089C1251.68 516.875 1240.2 518.789 1228.38 519.833C1216.55 521.225 1204.55 521.922 1192.37 521.922C1181.59 521.922 1170.81 521.225 1160.03 519.833C1149.24 518.442 1138.63 516.525 1128.2 514.089C1100.02 507.475 1076.89 495.635 1058.8 478.576C1040.72 461.166 1027.5 438.363 1019.15 410.161C1015.67 397.975 1012.89 384.745 1010.8 370.471C1009.06 356.196 1008.19 341.747 1008.19 327.124C1008.19 312.501 1009.06 298.052 1010.8 283.777C1012.54 269.154 1015.32 255.924 1019.15 244.086V243.564ZM1436.27 139.115H1630.36C1634.19 139.463 1637.84 139.637 1641.32 139.637C1645.15 139.637 1648.97 139.811 1652.8 140.159C1667.06 140.856 1680.97 143.118 1694.54 146.948C1708.45 150.778 1720.63 157.916 1731.06 168.36C1740.46 177.413 1747.41 188.032 1751.93 200.218C1756.81 212.404 1759.76 224.937 1760.8 237.819C1760.8 240.257 1760.8 242.694 1760.8 245.131C1761.15 247.568 1761.33 250.005 1761.33 252.442C1761.67 278.555 1755.59 301.186 1743.06 320.335C1730.89 339.136 1711.76 351.67 1685.67 357.937L1779.07 514.089H1690.37L1607.93 366.815H1515.05V514.089H1436.27V139.115ZM1611.58 205.962H1515.05V300.489H1611.58C1612.28 300.837 1612.97 301.012 1613.67 301.012C1614.36 301.012 1615.06 301.012 1615.75 301.012C1632.45 301.012 1647.58 298.575 1661.15 293.7C1675.06 288.478 1681.84 275.073 1681.5 253.487C1681.5 231.204 1674.19 217.8 1659.58 213.274C1645.32 208.748 1629.32 206.485 1611.58 206.485V205.962ZM1982.03 204.396C1953.16 204.744 1931.6 212.577 1917.33 227.897C1903.07 242.868 1895.07 264.28 1893.33 292.133L2111.43 291.611V356.892H1892.81C1892.81 370.123 1894.2 382.83 1896.98 395.016C1900.12 407.202 1906.2 418.342 1915.25 428.44C1923.25 437.841 1932.64 443.761 1943.42 446.197C1954.55 448.285 1965.86 449.33 1977.34 449.33C1978.03 449.33 1978.73 449.33 1979.42 449.33C1980.47 449.33 1981.34 449.33 1982.03 449.33L2111.43 448.808V514.089H1978.38C1957.16 514.089 1936.64 512.175 1916.81 508.344C1897.33 504.513 1878.9 495.635 1861.5 481.709C1840.63 464.651 1826.02 443.932 1817.68 419.562C1809.33 394.842 1804.81 369.6 1804.11 343.836C1803.76 338.265 1803.59 332.869 1803.59 327.646C1803.94 322.424 1804.29 317.201 1804.63 311.979C1808.46 252.79 1824.46 209.27 1852.63 181.417C1881.16 153.563 1923.77 139.637 1980.47 139.637L2111.43 139.115V204.396H1982.03Z"
                                fill="#C8CAD0" />
                            <path d="M2389 0H3787.17V399.846C3787.17 523.782 3686.79 624.25 3562.97 624.25H2389V0Z"
                                fill="white" />
                            <path
                                d="M2740.38 205.954H2649.07V316.67H2745.07C2764.2 316.67 2780.73 313.015 2794.64 305.703C2808.55 298.045 2815.51 283.422 2815.51 261.834C2816.21 237.811 2808.73 222.666 2793.07 216.399C2777.77 209.785 2760.2 206.476 2740.38 206.476V205.954ZM2570.28 139.106H2741.42C2741.77 139.453 2742.12 139.628 2742.46 139.628C2743.16 139.628 2743.68 139.628 2744.03 139.628C2750.64 139.628 2757.25 139.628 2763.86 139.628C2770.46 139.628 2777.07 139.975 2783.68 140.673C2795.51 141.37 2807.16 143.109 2818.64 145.895C2830.47 148.331 2841.42 152.509 2851.51 158.429C2869.95 169.221 2882.99 184.019 2890.64 202.82C2898.65 221.621 2902.82 241.291 2903.17 261.834C2903.51 280.635 2900.21 298.739 2893.25 316.148C2886.65 333.558 2875.51 348.005 2859.86 359.495C2846.64 368.895 2832.21 375.162 2816.55 378.296C2801.25 381.082 2785.59 382.82 2769.59 383.518C2765.42 383.518 2761.25 383.518 2757.07 383.518C2752.9 383.518 2748.72 383.518 2744.55 383.518L2649.07 382.996V514.08H2570.28V139.106ZM3036.31 139.106V291.08H3180.84V139.106H3259.63V514.08H3180.84V357.406H3036.31V514.08H2957.53V139.106H3036.31ZM3506.72 205.954H3415.41V316.67H3511.41C3530.54 316.67 3547.07 313.015 3560.98 305.703C3574.89 298.045 3581.85 283.422 3581.85 261.834C3582.55 237.811 3575.07 222.666 3559.42 216.399C3544.11 209.785 3526.54 206.476 3506.72 206.476V205.954ZM3336.62 139.106H3507.76C3508.11 139.453 3508.46 139.628 3508.8 139.628C3509.5 139.628 3510.02 139.628 3510.37 139.628C3516.98 139.628 3523.59 139.628 3530.2 139.628C3536.8 139.628 3543.42 139.975 3550.02 140.673C3561.85 141.37 3573.5 143.109 3584.98 145.895C3596.81 148.331 3607.76 152.509 3617.85 158.429C3636.29 169.221 3649.33 184.019 3656.99 202.82C3664.99 221.621 3669.16 241.291 3669.51 261.834C3669.85 280.635 3666.55 298.739 3659.59 316.148C3652.99 333.558 3641.85 348.005 3626.2 359.495C3612.98 368.895 3598.55 375.162 3582.9 378.296C3567.59 381.082 3551.94 382.82 3535.94 383.518C3531.76 383.518 3527.59 383.518 3523.41 383.518C3519.24 383.518 3515.07 383.518 3510.89 383.518L3415.41 382.996V514.08H3336.62V139.106Z"
                                fill="#4F5B93" />
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('store.dashboard.home') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-dashboard" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M13.45 11.55l2.05 -2.05"></path>
                                        <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Dashboard
                                </span>
                            </a>
                        </li>

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
                    <div class="nav-item d-none d-md-flex me-3">
                        <div class="btn-list">
                            <a href="{{ route('store.dashboard.admin-area.home') }}" class="btn"
                                rel="noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-user-circle" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                </svg>
                                Admin Area
                            </a>
                        </div>
                    </div>
                    <div class="d-none d-md-flex">
                        <div class="nav-item dropdown d-none d-md-flex me-3">
                            <livewire:store-system-updates />
                        </div>
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
                                    <a href="https://storephp.com/" target="_blank" class="link-secondary"
                                        rel="noopener">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-php" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 12m-10 0a10 9 0 1 0 20 0a10 9 0 1 0 -20 0"></path>
                                            <path
                                                d="M5.5 15l.395 -1.974l.605 -3.026h1.32a1 1 0 0 1 .986 1.164l-.167 1a1 1 0 0 1 -.986 .836h-1.653">
                                            </path>
                                            <path
                                                d="M15.5 15l.395 -1.974l.605 -3.026h1.32a1 1 0 0 1 .986 1.164l-.167 1a1 1 0 0 1 -.986 .836h-1.653">
                                            </path>
                                            <path d="M12 7.5l-1 5.5"></path>
                                            <path d="M11.6 10h2.4l-.5 3"></path>
                                        </svg>
                                        StorePHP
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                                        V{{ config('store.dashboard.version') }}
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

<script src="{{ asset('/vendor/storephp/tabler.min.js') }}"></script>
<script src="{{ asset('/vendor/storephp/sweetalert2.min.js') }}"></script>

@livewireScripts
<x-livewire-alert::scripts />

@stack('scripts')

</html>
