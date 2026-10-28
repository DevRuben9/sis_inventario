<aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
  <div class="sidebar-header">
    <a class="brand-mark" href="index.html" aria-label="adminHMD dashboard">
      <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
      <span class="brand-copy">
        <span class="brand-title">adminHMD</span>
        <span class="brand-subtitle">Admin Template</span>
      </span>
    </a>
  </div>

  <nav class="sidebar-nav">
    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}" aria-current="page">
      <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
      <span class="nav-text">Dashboard</span>
    </a>
    <a class="nav-link {{ request()->routeIs('usuario.index') ? 'active' : '' }}" href="{{ route('usuario.index') }}">
      <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
      <span class="nav-text">Usuarios</span>
    </a>
    <a class="nav-link {{ request()->routeIs('producto.index') ? 'active' : '' }}" href="{{ route('producto.index') }}">
      <span class="nav-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
      <span class="nav-text">Productos</span>
    </a>
    <a class="nav-link" href="profile.html">
      <span class="nav-icon"><i class="bi bi-person-badge" aria-hidden="true"></i></span>
      <span class="nav-text">Profile</span>
    </a>
    <a class="nav-link" href="charts.html">
      <span class="nav-icon"><i class="bi bi-bar-chart-line" aria-hidden="true"></i></span>
      <span class="nav-text">Charts</span>
    </a>

    <a class="nav-link" href="blank.html">
      <span class="nav-icon"><i class="bi bi-file-earmark" aria-hidden="true"></i></span>
      <span class="nav-text">Blank Page</span>
    </a>
  </nav>

  <div class="sidebar-footer">
    <span class="status-dot"></span>
    <span class="sidebar-footer-text">System running smoothly</span>
  </div>
</aside>