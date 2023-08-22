<aside class="main-sidebar sidebar-dark-primary elevation-4">
  {{-- LOGO --}}
  <a 
    href="{{route('dashboard')}}" 
    class="brand-link" 
    style="text-align: center; font-size: 2em; padding: 0px;">
    <b>Laravel<br />AdminLTE 3</b>
  </a>

  <div class="sidebar">
    {{-- MENU --}}
    <nav class="mt-2">
      <ul 
        class="nav nav-pills nav-sidebar flex-column" 
        data-widget="treeview" data-accordion="false"
        role="menu">

        <li class="nav-item">
          <a 
            href="{{route('dashboard')}}" 
            class="nav-link @if(Route::currentRouteName() == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        
      </ul>
    </nav>
  </div>
</aside>