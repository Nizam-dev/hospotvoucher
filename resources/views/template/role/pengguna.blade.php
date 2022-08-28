<!-- Nav Item - Dashboard -->
<li class="nav-item {{request()->is('/')?'active':''}}">
    <a class="nav-link" href="{{url('/')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<li class="nav-item {{request()->is('pengguna/history')?'active':''}}">
    <a class="nav-link" href="{{url('pengguna/history')}}">
        <i class="fas fa-file fa-file-alt"></i>
        <span>History Voucher</span></a>
</li>

<li class="nav-item ">
    <a class="nav-link" href="{{url('/')}}">
        <i class="fas fa-user fa-user-alt"></i>
        <span>Profile</span></a>
</li>