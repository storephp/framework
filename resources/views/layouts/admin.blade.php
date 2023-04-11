<!doctype html>
<html lang="en">

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

<body class="layout-boxed">
    <script src="./dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">
                        <svg width="109" height="32" viewBox="0 0 109 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_2_2)">
                                <mask id="mask0_2_2" style="mask-type:luminance" maskUnits="userSpaceOnUse"
                                    x="0" y="0" width="109" height="32">
                                    <path d="M109 0H0V32H109V0Z" fill="white" />
                                </mask>
                                <g mask="url(#mask0_2_2)">
                                    <path
                                        d="M34.02 9.2H41.487L43.235 10.948V14.634L42.323 15.546L43.823 17.046V20.637L41.962 22.5H34.02V9.2ZM40.879 15.2L41.829 14.25V11.381L40.879 10.45H35.426V15.2H40.879ZM41.316 21.242L42.416 20.159V17.5L41.316 16.42H35.426V21.246L41.316 21.242ZM45.916 20.942V18.529L47.472 16.99H52.526V15.185L51.576 14.254H48.346L47.396 15.185V15.964H45.99V14.786L47.738 13.038H52.165L53.913 14.786V22.5H52.564V20.828L50.816 22.5H47.472L45.916 20.942ZM50.533 21.284L52.533 19.365V18.206H48.08L47.32 18.947V20.547L48.08 21.288L50.533 21.284ZM56.195 20.942V19.764H57.6V20.543L58.36 21.284H61.86L62.62 20.543V19.08L61.86 18.32H57.77L56.27 16.82V14.6L57.828 13.042H62.274L63.831 14.6V15.778H62.425V14.999L61.665 14.258H58.435L57.675 14.999V16.386L58.435 17.146H62.463L64.021 18.7V20.942L62.463 22.5H57.751L56.195 20.942ZM66.4 8.934H67.8V16.952H70.023L72.8 13.038H74.358L71.165 17.6L74.547 22.5H72.989L70.025 18.206H67.8V22.5H66.4V8.934ZM75.687 20.752V14.786L77.435 13.038H82.2L83.967 14.786V18.186H77.093V20.314L78.043 21.245H81.6L82.55 20.314V19.592H83.956V20.751L82.2 22.5H77.435L75.687 20.752ZM82.565 16.971V15.223L81.615 14.292H78.043L77.093 15.223V16.971H82.565ZM87.391 20.752V14.273H85.681V13.038H87.429V9.96H88.8V13.038H91.764V14.273H88.8V20.315L89.75 21.265H91.764V22.5H89.139L87.391 20.752ZM94.136 9.2H95.58V22.5H94.136V9.2ZM98.62 13.038H99.988V15.052L102 13.038H104.907L106.655 14.786V22.5H105.251V15.223L104.301 14.292H102.382L100.026 16.648V22.5H98.62V13.038Z"
                                        fill="#555555" stroke="#555555" />
                                    <path
                                        d="M19.468 14.611L23.733 7.62005C23.7853 7.53851 23.8137 7.44393 23.815 7.34705C23.8129 7.21249 23.7575 7.08426 23.6609 6.99052C23.5644 6.89678 23.4346 6.84518 23.3 6.84705C21.8708 7.32393 20.3791 7.5871 18.873 7.62805C17.3669 7.5871 15.8752 7.32393 14.446 6.84705C14.3114 6.84518 14.1816 6.89678 14.0851 6.99052C13.9885 7.08426 13.9331 7.21249 13.931 7.34705C13.9337 7.44648 13.9627 7.54343 14.015 7.62805L18.275 14.611C18.3489 14.6962 18.4402 14.7645 18.5428 14.8113C18.6453 14.8581 18.7568 14.8824 18.8695 14.8824C18.9822 14.8824 19.0937 14.8581 19.1962 14.8113C19.2988 14.7645 19.3901 14.6962 19.464 14.611H19.468Z"
                                        fill="#EB4433" />
                                    <mask id="mask1_2_2" style="mask-type:luminance" maskUnits="userSpaceOnUse"
                                        x="0" y="0" width="32" height="32">
                                        <path d="M0 0H32V32H0V0Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask1_2_2)">
                                        <path
                                            d="M29.473 10.762C29.4778 10.5408 29.4389 10.3207 29.3586 10.1145C29.2783 9.90833 29.1581 9.71997 29.005 9.56023C28.8519 9.40049 28.6687 9.2725 28.4661 9.18358C28.2634 9.09466 28.0453 9.04655 27.824 9.042C27.4304 9.04893 27.0519 9.19504 26.7557 9.45443C26.4595 9.71381 26.2648 10.0697 26.206 10.459C26.206 10.459 25.739 13.615 24.892 16.931C24.7504 17.4641 24.463 17.9472 24.062 18.3259C23.661 18.7046 23.1623 18.9641 22.622 19.075H15.716C15.109 19.0263 14.5301 18.7983 14.0529 18.42C13.5758 18.0416 13.2218 17.53 13.036 16.95C13.016 16.894 10.951 11.017 10.087 7.722C8.83101 2.922 3.83201 3.774 3.83201 3.774C3.4591 3.85304 3.12508 4.05883 2.88679 4.35637C2.6485 4.65392 2.52066 5.02483 2.52501 5.406C2.52158 5.62543 2.56163 5.84337 2.64286 6.04723C2.72409 6.2511 2.84489 6.43686 2.9983 6.5938C3.1517 6.75073 3.33466 6.87574 3.53663 6.96159C3.73859 7.04744 3.95556 7.09244 4.17501 7.094C4.30263 7.08846 4.42916 7.06799 4.55202 7.033C4.80097 6.96361 5.06145 6.94573 5.31755 6.98047C5.57364 7.01521 5.81996 7.10183 6.04143 7.23503C6.2629 7.36823 6.45487 7.54521 6.60559 7.75515C6.75631 7.96509 6.86262 8.20357 6.91801 8.456C7.85101 11.87 9.85901 17.881 9.95901 18.14C10.501 19.605 12.327 22.44 15.721 22.44H22.626C23.9087 22.3335 25.1253 21.8261 26.1036 20.9898C27.0819 20.1534 27.7723 19.0305 28.077 17.78C28.904 14.551 29.477 10.861 29.477 10.762"
                                            fill="#EB4433" />
                                        <path
                                            d="M17.546 26.842C17.546 27.5253 17.2749 28.1807 16.7921 28.6642C16.3093 29.1478 15.6543 29.4199 14.971 29.421C14.6319 29.4217 14.296 29.3554 13.9825 29.2261C13.6691 29.0968 13.3842 28.9069 13.1442 28.6674C12.9042 28.4278 12.7137 28.1433 12.5838 27.8301C12.4539 27.5169 12.387 27.1811 12.387 26.842C12.3872 26.503 12.4541 26.1673 12.5841 25.8542C12.7141 25.5411 12.9045 25.2567 13.1445 25.0172C13.3845 24.7778 13.6694 24.588 13.9828 24.4588C14.2962 24.3295 14.632 24.2633 14.971 24.264C15.6542 24.2651 16.309 24.5371 16.7917 25.0204C17.2745 25.5038 17.5458 26.1589 17.546 26.842Z"
                                            fill="#EB4433" />
                                        <path
                                            d="M25.862 27.059C25.862 27.7423 25.5908 28.3977 25.108 28.8812C24.6253 29.3648 23.9703 29.6369 23.287 29.638C22.9479 29.6387 22.612 29.5724 22.2985 29.4431C21.9851 29.3138 21.7002 29.1239 21.4601 28.8844C21.2201 28.6449 21.0297 28.3603 20.8998 28.0471C20.7699 27.7339 20.703 27.3981 20.703 27.059C20.7031 26.72 20.7701 26.3843 20.9001 26.0712C21.0301 25.7581 21.2205 25.4737 21.4605 25.2342C21.7005 24.9948 21.9853 24.805 22.2988 24.6758C22.6122 24.5465 22.948 24.4803 23.287 24.481C23.9701 24.4821 24.6249 24.7541 25.1077 25.2374C25.5905 25.7208 25.8617 26.3759 25.862 27.059Z"
                                            fill="#EB4433" />
                                    </g>
                                </g>
                            </g>
                            <defs>
                                <clipPath id="clip0_2_2">
                                    <rect width="109" height="32" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item d-none d-md-flex me-3">
                        <div class="btn-list">
                            <a href="{{ route('basketin.dashboard.home') }}" class="btn" rel="noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dashboard"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M13.45 11.55l2.05 -2.05"></path>
                                    <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                                </svg>
                                Dashboard
                            </a>
                        </div>
                    </div>
                    <div class="d-none d-md-flex">
                        <div class="nav-item dropdown d-none d-md-flex me-3">
                            <livewire:basketin-system-updates />
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
            </div>
        </header>
        <header class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar navbar-light">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="./">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Home
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-user-shield" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h2"></path>
                                            <path
                                                d="M22 16c0 4 -2.5 6 -3.5 6s-3.5 -2 -3.5 -6c1 0 2.5 -.5 3.5 -1.5c1 1 2.5 1.5 3.5 1.5z">
                                            </path>
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Permissions
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('basketin.dashboard.admin-area.permissions.admins') }}">
                                        Admins
                                    </a>
                                    <a class="dropdown-item" href="./changelog.html">
                                        Changelog
                                    </a>
                                </div>
                            </li>
                        </ul>
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
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Your report name">
                    </div>
                    <label class="form-label">Report type</label>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1"
                                    class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Simple</span>
                                        <span class="d-block text-muted">Provide only basic data needed for the
                                            report</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1"
                                    class="form-selectgroup-input">
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Advanced</span>
                                        <span class="d-block text-muted">Insert charts and additional advanced
                                            analyses to be inserted in the report</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Report url</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        https://tabler.io/reports/
                                    </span>
                                    <input type="text" class="form-control ps-0" value="report-01"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Visibility</label>
                                <select class="form-select">
                                    <option value="1" selected>Private</option>
                                    <option value="2">Public</option>
                                    <option value="3">Hidden</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Client name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Reporting period</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Additional information</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Create new report
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="//cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@livewireScripts
<x-livewire-alert::scripts />

@stack('scripts')

</html>
