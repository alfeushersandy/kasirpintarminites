<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark elevation-4">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="/" class="navbar-brand navbar-brand-autodark">
            <h3 class="font-weight-bold">Reimburse App</h3>
        </a>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url()"></span>
                    <div class="d-none d-xl-block pl-2">
                        <div></div>
                        <div class="mt-1 small text-muted"></div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <path d="M7 6a7.75 7.75 0 1 0 10 0"></path>
                            <line x1="12" y1="4" x2="12" y2="12"></line>
                        </svg>
                        Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
                <div class="hr-text hr-text-left ml-2 mb-2 mt-2">Dashboard</div>
                <li class="nav-item">
                    <a class="nav-link"
                        href="">
                        <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-tabler"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 9l3 3l-3 3"></path>
                                <line x1="13" y1="15" x2="16" y2="15"></line>
                                <rect x="4" y="4" width="16" height="16" rx="4"></rect>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Dashboard
                        </span>
                    </a>
                </li>
                <div class="hr-text hr-text-left ml-2 mb-2 mt-2">Karyawan</div>
                <li class="nav-item">
                    <a class="nav-link"
                        href="">
                        <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-tabler"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 9l3 3l-3 3"></path>
                                <line x1="13" y1="15" x2="16" y2="15"></line>
                                <rect x="4" y="4" width="16" height="16" rx="4"></rect>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Master Karyawan
                        </span>
                    </a>
                </li>
                <div class="hr-text hr-text-left ml-2 mb-2 mt-2">Transaksi</div>
                <li class="nav-item">
                    <a class="nav-link"
                        href="">
                        <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-tabler"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 9l3 3l-3 3"></path>
                                <line x1="13" y1="15" x2="16" y2="15"></line>
                                <rect x="4" y="4" width="16" height="16" rx="4"></rect>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Reimburse
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>