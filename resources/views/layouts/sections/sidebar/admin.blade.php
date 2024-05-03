<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item @if ($activeMenu == 'dashboard') active @endif">
        <a href="/" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Dashboards">Dashboards</div>
        </a>
    </li>

    <!-- Data -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Data</span></li>
    <li class="menu-item @if ($activeMenu == 'pasien' || $activeMenu == 'pasien-new') active open @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-dock-top"></i>
            <div data-i18n="Account Settings">Pasien</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item @if ($activeMenu == 'pasien') active @endif">
                <a href="/pasien" class="menu-link">
                    <div data-i18n="Notifications">Data Pasien</div>
                </a>
            </li>
            <li class="menu-item @if ($activeMenu == 'pasien-new') active @endif ">
                <a href="/pasien/new" class="menu-link">
                    <div data-i18n="Connections">Pasien Baru</div>
                </a>
            </li>
        </ul>
    </li>

    <li class="menu-item @if ($activeMenu == 'dokter' || $activeMenu == 'dokter-new') active open @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
            <div data-i18n="Misc">Dokter</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item @if ($activeMenu == 'dokter') active @endif ">
                <a href="/dokter" class="menu-link">
                    <div data-i18n="Error">Data Dokter</div>
                </a>
            </li>
            <li class="menu-item @if ($activeMenu == 'dokter-new') active @endif ">
                <a href="/dokter/new" class="menu-link">
                    <div data-i18n="Error">Dokter Baru</div>
                </a>
            </li>
        </ul>
    </li>
</ul>
