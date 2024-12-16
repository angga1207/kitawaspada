<div>
    <!-- main header @s -->
    <div class="nk-header nk-header-fluid is-theme">
        <div class="container-xl wide-xl">
            <div class="nk-header-wrap">
                <div class="nk-menu-trigger me-sm-2 d-lg-none">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav">
                        <em class="icon ni ni-menu"></em>
                    </a>
                </div>
                <div class="nk-header-brand">
                    <a href="{{ route('home') }}" class="logo-link">
                        <img class="logo-light logo-img" src="{{ asset('/assets/images/kita_waspada/logo.png') }}"
                            srcset="{{ asset('/assets/images/kita_waspada/logo.png') }}" alt="logo">
                        <img class="logo-dark logo-img" src="{{ asset('/assets/images/kita_waspada/logo.png') }}"
                            srcset="{{ asset('/assets/images/kita_waspada/logo.png') }}" alt="logo-dark">
                    </a>
                </div><!-- .nk-header-brand -->
                <div class="nk-header-menu" data-content="headerNav">
                    <div class="nk-header-mobile">
                        <div class="nk-header-brand">
                            <a href="{{ route('home') }}" class="logo-link">
                                <img class="logo-light logo-img"
                                    src="{{ asset('/assets/images/kita_waspada/logo.png') }}"
                                    srcset="{{ asset('/assets/images/kita_waspada/logo.png') }}" alt="logo">
                                <img class="logo-dark logo-img"
                                    src="{{ asset('/assets/images/kita_waspada/logo.png') }}"
                                    srcset="{{ asset('/assets/images/kita_waspada/logo.png') }}" alt="logo-dark">
                            </a>
                        </div>
                        <div class="nk-menu-trigger me-n2">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav">
                                <em class="icon ni ni-arrow-left"></em>
                            </a>
                        </div>
                    </div>
                    <ul class="nk-menu nk-menu-main ui-s2">
                        <li class="nk-menu-item has-sub">
                            <a href="{{ route('home') }}" class="nk-menu-link">
                                <span class="nk-menu-text">Dashboards</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="{{ route('data-usaha') }}" class="nk-menu-link">
                                <span class="nk-menu-text">Data Usaha</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="./html/kw_usaha_dalam_peta.html" class="nk-menu-link">
                                <span class="nk-menu-text">Usaha Dalam Peta</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-text">
                                    Menu Admin
                                </span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="./html/kw_database.html" class="nk-menu-link">
                                        <span class="nk-menu-text">
                                            Database
                                        </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="./html/kw_koordinat.html" class="nk-menu-link">
                                        <span class="nk-menu-text">
                                            Validasi Koordinat
                                        </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="./html/kw_import_data.html" class="nk-menu-link">
                                        <span class="nk-menu-text">
                                            Import Data
                                        </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="./html/kw_user.html" class="nk-menu-link">
                                        <span class="nk-menu-text">
                                            Pengguna
                                        </span>
                                    </a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                    </ul><!-- .nk-menu -->
                </div><!-- .nk-header-menu -->
                <div class="nk-header-tools">
                    <ul class="nk-quick-nav">
                        <li class="dropdown notification-dropdown">
                            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                <div class="icon-status icon-status-info">
                                    <em class="icon ni ni-bell"></em>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end dropdown-menu-s1">
                                <div class="dropdown-head">
                                    <span class="sub-title nk-dropdown-title">
                                        Notifications
                                    </span>
                                </div>
                                <div class="dropdown-body">
                                    <div class="nk-notification">
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text">
                                                    You have requested to
                                                    <span>Widthdrawl</span>
                                                </div>
                                                <div class="nk-notification-time">
                                                    2 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .nk-notification -->
                                </div><!-- .nk-dropdown-body -->
                                <div class="dropdown-foot center">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </li><!-- .dropdown -->
                        <li class="dropdown user-dropdown order-sm-first">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                <div class="user-toggle">
                                    <div class="user-avatar sm">
                                        <em class="icon ni ni-user-alt"></em>
                                    </div>
                                    <div class="user-info d-none d-xl-block">
                                        <div class="user-status">
                                            {{ auth()->user()->Role->name ?? "" }}
                                        </div>
                                        <div class="user-name dropdown-indicator">
                                            {{ auth()->user()->name ?? "" }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1 is-light">
                                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <em class="icon ni ni-user-alt"></em>
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text">
                                                {{ auth()->user()->name ?? "" }}
                                            </span>
                                            <span class="sub-text">
                                                {{ '@'.auth()->user()->username ?? "" }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li>
                                            <a href="{{ route('profile', ['menu' => 1]) }}">
                                                <em class="icon ni ni-user-alt"></em>
                                                <span>
                                                    Lihat Profil
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('profile', ['menu' => 2]) }}">
                                                <em class="icon ni ni-activity-alt"></em>
                                                <span>
                                                    Riwayat Login
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li>
                                            <a href="{{ route('logout') }}">
                                                <em class="icon ni ni-signout"></em>
                                                <span>
                                                    Keluar Aplikasi
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li><!-- .dropdown -->
                    </ul><!-- .nk-quick-nav -->
                </div><!-- .nk-header-tools -->
            </div><!-- .nk-header-wrap -->
        </div><!-- .container-fliud -->
    </div>
    <!-- main header @e -->
</div>
