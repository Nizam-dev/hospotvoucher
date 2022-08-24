    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{request()->is('/')?'active':''}}">
        <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    <li class="nav-item {{request()->is('voucher')?'active':''}}">
        <a class="nav-link" href="{{url('voucher')}}">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Voucher</span></a>
    </li>

    <li class="nav-item {{request()->is('rekapitulasi')?'active':''}}">
        <a class="nav-link" href="{{url('rekapitulasi')}}">
            <i class="fas fa-fw fa-file"></i>
            <span>Rekapitulasi</span></a>
    </li>

    <li class="nav-item {{request()->is('users')?'active':''}}">
        <a class="nav-link" href="{{url('users')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span></a>
    </li>

    <li class="nav-item {{request()->is('setting')?'active':''}}">
        <a class="nav-link" href="{{url('setting')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaturan</span></a>
    </li>