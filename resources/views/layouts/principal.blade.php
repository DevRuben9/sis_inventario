<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="adminHMD professional admin dashboard template">
  <title>Dashboard | adminHMD</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @vite([
    'resources/css/app.css', 'resources/js/app.js',
    'resources/css/bootstrap.min.css', 'resources/vendors/bootstrap-icons/bootstrap-icons.css',
    'resources/css/style.css', 'resources/js/bootstrap.bundle.min.js',
    'resources/js/main.js'
  ])
</head>

<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

    @include('layouts.navbar')

    <div class="admin-main">
      
      @include('layouts.sidebar')

      <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Overview</p>
                <h1 class="h3 mb-1">Dashboard</h1>
                <p class="text-muted mb-0">Monitor performance, sales, users, and support from one clean workspace.</p>
              </div>
            </div>
          </div>

          @yield('content')
          
        </div>
      </main>

      @include('layouts.footer')
    </div>
  </div>
</body>

</html>