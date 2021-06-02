<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    {{--  <li class="{{ request()->is('/dashboard') ? 'active' : '' }}">
        <a href="/dashboard">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>  --}}
    <li class="{{ request()->is('/log') ? 'active' : '' }}">
        <a href="/log">
          <i class="fa fa-dashboard"></i> <span>Log Book</span>
        </a>
    </li>
    <li class="{{ request()->is('absenmasuk') ? 'active' : '' }}">
        <a href="/absenmasuk">
          <i class="fa fa-book"></i> <span>Absen Masuk Data Center</span>
        </a>
    </li>
    <li class="{{ request()->is('absenkeluar') ? 'active' : '' }}">
        <a href="/absenkeluar">
          <i class="fa fa-book"></i> <span>Absen Keluar Data Center</span>
        </a>
    </li>
    {{--  <li class="{{ request()->is('logbook') ? 'active' : '' }}">
        <a href="/logbook">
          <i class="fa fa-book"></i> <span>LogBook</span>
        </a>
    </li>
    <li class="{{ request()->is('anggota') ? 'active' : '' }}">
        <a href="/anggota">
          <i class="fa fa-user"></i> <span>Anggota</span>
        </a>
    </li>  --}}
</ul>
