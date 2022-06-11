<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <img style="height:40px;width:40px" src="/img/logo.png" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Paytol</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if ($activePage == 'dashboard') active @endif">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if ($activePage == 'gate') active @endif">
        <a class="nav-link" href="/gate">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Gate</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if ($activePage == 'rute') active @endif">
        <a class="nav-link" href="/rute">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Rute</span></a>
    </li>
        <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if ($activePage == 'transaksi') active @endif">
        <a class="nav-link" href="/transaksi">
            <i class="fas fa-fw fa-sync-alt"></i>
            <span>Transaksi</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if ($activePage == 'kendaraan') active @endif">
        <a class="nav-link" href="/kendaraan">
            <i class="fas fa-fw fa-book"></i>
            <span>Kendaraan</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if ($activePage == 'informasi') active @endif">
        <a class="nav-link" href="/informasi">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Informasi</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    
     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    

</ul>