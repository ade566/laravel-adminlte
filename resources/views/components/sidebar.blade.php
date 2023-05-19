<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{url('dashboard')}}" class="brand-link text-center">
    <span class="brand-text font-weight">Training Laravel</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <x-menu title="Dashboard" url="dashboard" icon="fas fa-tachometer-alt" />

				<x-menu title="Slider" url="sliders" />

				<x-menu title="Kategori" url="category" />

				<x-menu title="Keunggulan Kami" url="choose-us" />

        <x-menu title="Portofolio" url="portofolio" />

        <x-menu title="Blog" url="blog" />

        <x-menu title="Service" url="service" />

        <x-menu title="Partner" url="partner" />

        <x-menu title="Configuration" url="configuration" />

				<x-menu title="User Admin" url="users" icon="fas fa-user-secret" />

        <li class="nav-item d-none">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../../index.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
              </a>
            </li>
          </ul>
        </li>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>