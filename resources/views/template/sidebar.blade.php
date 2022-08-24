<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa fa-wifi"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Voucer <sup>Hospot</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if(auth()->user()->role == "admin")
        @include('template.role.admin')
    @else
        @include('template.role.pengguna')
    @endif


</ul>