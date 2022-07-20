<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">MENIU PRINCIPAL</div>
                <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' :'' }}" href="{{ route('admin.users.list') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i> </div>
                    Utilizatori
                </a>
                <div class="sb-sidenav-menu-heading">MODULE COMPLEX</div>

                <a class="nav-link {{ request()->routeIs('admin.rooms.*') ? 'active' :'' }}" href="{{ route('admin.rooms.list') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-home" aria-hidden="true"></i> </div>
                    Camere
                </a>
                <a class="nav-link {{ request()->routeIs('admin.facilities.*') ? 'active' :'' }}" href="{{ route('admin.facilities.list') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-file-text" aria-hidden="true"></i></div>
                    Facilitati
                </a>
                <a class="nav-link {{ request()->routeIs('admin.reservations.*') ? 'active' :'' }}"
                    href="{{ route('admin.reservations.list') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> </div>
                    Rezervari
                </a>
                <a class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' :'' }}"
                    href="{{ route('admin.messages.list') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-comments" aria-hidden="true"></i> </div>
                    Mesaje vizitatori
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Conectat ca: &nbsp; {{ auth()->user()->name }} </div>

        </div>
    </nav>
</div>
